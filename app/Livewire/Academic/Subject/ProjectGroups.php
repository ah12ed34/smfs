<?php

namespace App\Livewire\Academic\Subject;

use App\Models\GroupProject;
use Livewire\Component;
use App\Models\GroupSubject;
use App\Models\Project ;
use App\Models\Student;
use App\Models\User;
use App\Tools\ToolsApp;
use Livewire\WithPagination;
class ProjectGroups extends Component
{
    use WithPagination;
    public $group_subject;
    public $search;
    public $perPage = 10;
    public $projectDetails;
    public $project_id;
    public $project_groups = [
        'count_students'=>0,
        'count_groups'=>0,
        'all_students'=>0,
        'max_groups'=>0,
        'min_groups'=>0,
    ];

    public $users = [];
    public $name;
    public $file;
    public $grade;
    public $comment;

    public function mount($subject_id,$group_id,$project_id)
    {
        $this->group_subject = GroupSubject::where('subject_id',$subject_id)->where('group_id',$group_id)->first();
        $this->project_id = $project_id;
    }

    public function selected($id)
    {
        $this->projectDetails = $this->GroupProjects->where('id',$id)->first();
        // dd($this->projectDetails);
        $this->name = $this->projectDetails->name ?? '';
        $this->grade = $this->projectDetails->grade;
        $this->comment = $this->projectDetails->comment;
        $this->file = $this->projectDetails->file;
        $this->users = $this->projectDetails->students->map(function($student){
            return ['id'=>$student->student->student->user_id,'name'=>$student->student->student->user->name];
        });
    }

    public function getGroupProjectsProperty()
    {
        $this->project_groups = [
            'count_students'=>0,
            'count_groups'=>0,
            'all_students'=>0,
            'max_groups'=>0,
            'min_groups'=>0,
        ];
        $count_students = $this->group_subject->students->count();
        $this->project_groups['all_students'] = $count_students;
        $project = Project::where('id',$this->project_id)->first();
        $this->project_groups['max_groups'] = ceil($count_students / $project->min_students);
        $this->project_groups['min_groups'] = ceil($count_students / $project->max_students);

        $GroupProjects = $project->GroupProjects()
        ->where('name','like','%'.$this->search.'%')
        ->get()
        ->map(function($group){
            $group->count_students = $group->students->count();
            $this->project_groups['count_students'] += $group->count_students;
            $this->project_groups['count_groups'] += 1;

            return $group;
        })
        ;

        if($this->project_groups['count_students'] < $count_students){
            while(($this->project_groups['max_groups'] > $this->project_groups['count_groups'])){
                if(($this->project_groups['min_groups'] <= $this->project_groups['count_groups']&&$GroupProjects[$GroupProjects->count()-1]->just_created??false)){
                    break;
                }
                $group = new GroupProject(['project_id'=>$this->project_id]);
                $group->id = (int) 0..($this->project_groups['count_groups']+1);
                $group->name = 'Group '.
                ($this->project_groups['count_groups']+1);
                $group->student = new Student(['user'=>new User(['name'=>'Sin asignar'])]);
                $group->count_students = 0;
                $group->just_created = true;
                $this->project_groups['count_groups'] += 1;
                $GroupProjects->push($group);
            }
        }
        return ToolsApp::convertToPagination($GroupProjects, $this->perPage);

    }
    public function render()
    {
        return view('livewire.academic.subject.project-groups'
        ,['GroupProjects'=>$this->GroupProjects]);
    }
}
