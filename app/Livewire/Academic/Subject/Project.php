<?php

namespace App\Livewire\Academic\Subject;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Tools\ToolsApp;
use App\Models\Project as ProjectModel;
use App\Tools\MyApp;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\GroupSubject;


class Project extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $group_subject;
    public $search;
    public $perPage = 10;
    public $students = [];
    public $projectDetails;
    public $name;
    public $file;
    public $grade;
    public $max_students;
    public $min_students;
    public $end_date;
    public $selected_id = null;
    public $message_confirmation = null;

    public function mount($group_subject)
    {
        $this->group_subject = $group_subject;
        $this->projectDetails = new ProjectModel();
    }
    #[On('search')]
    public function search($v)
    {
        $this->search = $v;
    }
    public function getProjectsProperty()
    {
        // dd($this->group_subject);
        $count_students = $this->group_subject?->students?->count();
        $projects = $this->group_subject->projects()
            ->where('name', 'like', '%' . $this->search . '%')->get()
            ->map(function ($project) use ($count_students) {
                $project->count_groups
                    = ceil($count_students / $project->max_students) . ' - ' . ceil($count_students / $project->min_students);
                return $project;
            });
        return ToolsApp::convertToPagination($projects, $this->perPage);
    }
    public function selected($id)
    {
        // $this->students = $this->Projects->where('id',$id)->first()->students
        // ->map(function($student){
        //     return $student->pivot->id;
        // })

        $this->selected_id = $id;
        if ($this->projects->where('id', $id)->first()->is_active == 1) {
            $this->message_confirmation = __('general.assignment_deactivation_confirmation');
        } else {
            $this->message_confirmation = __('general.assignment_activation_confirmation');
        }


        $projectDetails = $this->projectDetails = $this->projects->where('id', $id)->first();
        $this->name = $projectDetails->name;
        $this->grade = $projectDetails->grade;
        $this->max_students = $projectDetails->max_students;
        $this->min_students = $projectDetails->min_students;
        $this->end_date = $projectDetails->end_date;
    }

    public function stopProject()
    {
        $project = ProjectModel::where('id', $this->selected_id)->first();
        $project->is_active = !$project->is_active;
        $project->save();
        $this->selected_id = null;
        $this->message_confirmation = null;
        $this->dispatch('closeModal');
    }

    public function resetData()
    {
        $this->reset([
            'name',
            'file',
            'grade',
            'max_students',
            'min_students',
            'end_date',
        ]);
        $this->projectDetails = new ProjectModel();
    }

    public function downloadFile($id)
    {
        $project = $this->projects->where('id', $id)->first();
        if ($project == null) {
            return $this->dispatch('alert', ['message' => __('general.file_not_found'), 'type' => 'error']);
        } elseif (Storage::missing($project->file)) {
            return $this->dispatch('alert', ['message' => __('general.file_not_found'), 'type' => 'error']);
        } else {
            return storage::download($project->file, $project->name . '.' . pathinfo($project->file, PATHINFO_EXTENSION));
        }
    }

    public function addProject()
    {
        $this->validate([
            'name' => 'required|string',
            'file' => 'required|file|mimes:' . MyApp::getFileMime('project'),
            'grade' => 'required',
            'max_students' => 'required|integer',
            'min_students' => 'required|integer',
            'end_date' => 'required|date|after:today',
        ]);

        $file = $this->file->store('projects');

        if ($this->file) {
            unset($this->file);
        }

        $project = new ProjectModel();
        $project->name = $this->name;
        $project->grade = $this->grade;
        $project->file = $file;
        $project->max_students = $this->max_students;
        $project->min_students = $this->min_students;
        $project->start_date = now();
        $project->end_date = $this->end_date;
        $project->subject_id = $this->group_subject->id;
        $project->save();
        $this->resetData();
        $this->dispatch('closeModal');
    }

    public function update_proj()
    {

        $this->validate([
            'name' => 'required',
            'grade' => 'required',
            'file' => 'nullable|file|mimes:' . MyApp::getFileMime('project'), // 'nullable'
            'max_students' => 'required',
            'min_students' => 'required',
            'end_date' => 'required|date|after:today',
        ]);

        $file = null;
        if ($this->file) {
            $file = $this->file->store('projects');
            $this->projectDetails->file = $file;
            unset($this->file);
        }


        $project = $this->projectDetails;
        $project->name = $this->name;
        $project->grade = $this->grade;
        $project->max_students = $this->max_students;
        $project->min_students = $this->min_students;
        $project->end_date = $this->end_date;
        $result = $project->save();
        $this->dispatch('closeModal');
    }
    public function render()
    {
        return view('livewire.academic.subject.project', [
            'projects' => $this->projects
        ]);
    }
}
