<?php

namespace App\Livewire\Student\Project;

use App\Models\Project;
use App\Models\User;
use App\Tools\ToolsApp;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class StudentProjects extends Component
{
    use WithPagination;
    public $details = [
        'id' => '',
        'name' => '',
        'subject_name_ar' => '',
        'subject_name_en' => '',
        'teacher_name' => '',
        'grade' => '',
        'leader_name' => '',
        'gp_name' => '',
        'gp_grade' => '',
        'gp_file' => '',
        'file' => '',
        'status' => '',
        'end_date' => '',
        'description' => '',
        'note' => '',
        'students' => [],
    ];
    // tab variable {all, unfinished , finished , not-graded}
    public $Tab = null;
    public $search;
    public function mount()
    {
        if(request()->has('tab')){
            switch (strtolower(request()->tab)) {
                case 'unfinished':
                    $this->Tab = 'unfinished';
                    break;
                case 'finished':
                    $this->Tab = 'finished';
                    break;
                case 'not-graded':
                    $this->Tab = 'not-graded';
                    break;
                default:
                    if(request()->Tab == 'all'){
                        $this->Tab = null;
                    }else{
                        // dd('error');
                        return redirect()->route('student-projects');
                    }
                    break;
            }
        }

    }


    #[On('search')]
    public function search($v){
        $this->search = $v;
        $this->resetPage();
    }

    public function selected($id)
    {
        $details =  $this->projects->firstWhere('id', $id);
        $this->details = [
            'id' => $details->id,
            'name' => $details->name,
            'subject_name_ar' => $details->subject_name_ar,
            'subject_name_en' => $details->subject_name_en,
            'teacher_name' => $details->teacher_name,
            'leader_name' => $details->leader_name,
            'end_date' => $details->end_date,
            'gp_name' => $details->gp_name,
            'gp_grade' => $details->gp_grade,
            'gp_file' => $details->gp_file,
            'file' => $details->file,
            'status' => $details->status,
            'description' => $details->description,
            'grade' => $details->grade,
            'note' => $details->gp_description,
            'students' => User::join('students', 'users.id', '=', 'students.user_id')
            ->join('group_students', 'students.user_id', '=', 'group_students.student_id')
            ->join('work_groups', 'group_students.id', '=', 'work_groups.student_id')
            ->where('work_groups.group_id', $details->gp_id)
            ->select('users.id',DB::raw("CONCAT(users.name, ' ', users.last_name) as name"))
            ->get()
        ];
    }

    public function getProjectsProperty()
    {
        $studentId = auth()->user()->student->user_id;

        $projects = Project::join('group_subjects', 'projects.subject_id', '=', 'group_subjects.id')
        ->join('groups', 'group_subjects.group_id', '=', 'groups.id')
        ->join('group_students', 'groups.id', '=', 'group_students.group_id')
        ->join('group_projects', 'projects.id', '=', 'group_projects.project_id')
        ->join('academics', 'group_subjects.teacher_id', '=', 'academics.user_id')
        ->join('users', 'academics.user_id', '=', 'users.id')
        ->join('work_groups', function($join) {
            $join->on('group_projects.id', '=', 'work_groups.group_id')
                 ->on('work_groups.student_id', '=', 'group_students.id');
        })
        ->join('subjects_levels', 'group_subjects.subject_id', '=', 'subjects_levels.id')
        ->join('subjects', 'subjects_levels.subject_id', '=', 'subjects.id')

        ->join('group_students as gs', 'gs.id', '=', 'group_projects.student_id')
        ->join('students as s', 's.user_id', '=', 'gs.student_id')
        ->join('users as u', 'u.id', '=', 's.user_id')

        ->where('group_students.student_id', $studentId)
        // search

        ->where(function($query){
            if($this->search){
                $query->where('projects.name', 'like', '%'.$this->search.'%')
                ->orWhere('subjects.name_ar', 'like', '%'.$this->search.'%')
                ->orWhere('subjects.name_en', 'like', '%'.$this->search.'%')
                ->orWhere('users.name', 'like', '%'.$this->search.'%')
                ->orWhere('users.last_name', 'like', '%'.$this->search.'%')
                ->orWhere('u.name', 'like', '%'.$this->search.'%')
                ->orWhere('u.last_name', 'like', '%'.$this->search.'%')
                ->orWhere('group_projects.name', 'like', '%'.$this->search.'%')
                ->orWhere('group_projects.grade', 'like', '%'.$this->search.'%')
                ->orWhere('group_projects.file', 'like', '%'.$this->search.'%')
                ->orWhere('projects.description', 'like', '%'.$this->search.'%')
                // ->orWhere('group_projects.note', 'like', '%'.$this->search.'%')
                ;
            }
        })
        ->select('projects.*', 'group_projects.grade as gp_grade', 'group_projects.name as gp_name', 'group_projects.file as gp_file', 'group_projects.id as gp_id'
                    ,'academics.user_id as teacher_id', DB::raw("CONCAT(users.name, ' ', users.last_name) as teacher_name")
                    ,'subjects.name_ar as subject_name_ar', 'subjects.name_en as subject_name_en'
                    ,DB::raw("CONCAT(u.name, ' ', u.last_name) as leader_name")
                    )

        ->get();
            ;

            $projects = $projects->map(function($project){
                // fillter by tab
                if($this->Tab == 'unfinished' && $project->gp_file){
                    return null;
                }
                if($this->Tab == 'finished' && !$project->gp_file){
                    return null;
                }
                if($this->Tab == 'not-graded' && $project->grade){
                    return null;
                }
                $project->grade = $project->grade ?? 0;
                $project->gp_name = $project->gp_name ?? '';
                $project->status = $project->gp_file ? 'تم التسليم' : 'لم يتم التسليم';
                // $project->students = User::join('students', 'users.id', '=', 'students.user_id')
                //     ->join('group_students', 'students.user_id', '=', 'group_students.student_id')
                //     ->join('work_groups', 'group_students.id', '=', 'work_groups.student_id')
                //     ->where('work_groups.group_id', $project->gp_id)
                //     ->select('users.id',DB::raw("CONCAT(users.name, ' ', users.last_name) as name"))
                //     ->get()
                //     ;
                    // dd($project->students->toSql());
                return $project;
            })->filter()->values();
            // dd($projects
            //     // ->toSql()
            // );
        return ToolsApp::convertToPagination($projects, 10);
    }

    public function render()
    {
        // dump($this->tab);
        return view('livewire.student.project.student-projects',[
            'projects'=>$this->projects
        ]);
    }
}
