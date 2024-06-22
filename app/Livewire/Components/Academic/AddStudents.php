<?php

namespace App\Livewire\Components\Academic;

use Livewire\Component;
use App\Models\GroupProject;
use App\Models\Project;
use App\Tools\ToolsApp;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;

class AddStudents extends Component
{
    use WithPagination
    // ,WithoutUrlPagination
    ;
    // checkbox اضافة طلاب لقروب المشروع  عنطريق
    public $students_id = [];
    public $project_group ;
    public $page=1;
    public $search;
    public $perPage = 10;
    public $pageName = 'students_page';

    public function mount()
    {
        if ($this->project_group) {
            $this->students_id = $this->project_group->students->map(function($student) {
                return $student->student->student->user_id;
            })->toArray();
            session()->put('project_group_id', $this->project_group->id);
        }else{
            if(session()->has('project_group_id')){
                $this->project_group = GroupProject::find(session()->get('project_group_id'));
                $this->students_id = $this->project_group->students->map(function($student) {
                    return $student->student->student->user_id;
                })->toArray();
            }
        }
        if(request()->has($this->pageName)){
            dd('request',$this->page);
            $page = request()->input($this->pageName);
            if(is_numeric($page)&&$page>0){
                $this->page = $page;
            }else{
                $this->page = 1;
            }
        }
        // if(request()->getpa
        // dd(request()->input('components.0.calls.0.params'));
        $this->dispatch('openModal');
    }

    public function getStudentsProperty()
    {
        if (!$this->project_group&&session()->has('project_group_id')) {
            $this->project_group = GroupProject::find(session()->get('project_group_id'));
            dd('getSession',$this->project_group);
        }
        if (!$this->project_group || !$this->project_group->project || !$this->project_group->project->GroupSubject) {
            dd('error1',$this->project_group);
            return new LengthAwarePaginator([], 0, 10);
        }

        $group = $this->project_group->project->GroupSubject->group;

        if (!$group) {
            return new LengthAwarePaginator([], 0, 10);
        }

        $students = $group->students->map(function($student) {
            return [
                'id' => $student->user_id,
                'name' => $student->user->name,
                'checked' => in_array($student->user_id, $this->students_id, true)
            ];
        });

        $paginationStudents = ToolsApp::convertToPaginationAll($students, $this->perPage, $this->pageName, $this->page);
        // dd($paginationStudents);
        return $paginationStudents;
    }
    public function updatingPaginators($page,$name){
        $this->page = $page;
        // dd($page,$name,$this->students);
    }
    public function addStudentsToProject(){
        // $this->validate([
        //     'students_id' => 'required',
        // ]);
        // $students = $this->project_group->students->map(function($student) {
        //     return $student->student->student->user_id;
        // })->toArray();
        // $students = array_diff($this->students_id, $students);
        // $this->project_group->students()->createMany(array_map(function($student) {
        //     return [
        //         'student_id' => $student,
        //         'grade' => 0,
        //         'comment' => '',
        //     ];
        // }, $students));
        $this->dispatch('closeModal');

    }

    public function render()
    {
        return view('livewire.components.academic.add-students'
        ,[
            'students' => $this->students
        ]);
    }
}
