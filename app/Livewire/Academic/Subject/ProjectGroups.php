<?php

namespace App\Livewire\Academic\Subject;

use Livewire\Component;
use App\Models\GroupSubject;
use App\Models\Project ;
use App\Tools\ToolsApp;

class ProjectGroups extends Component
{
    public $group_subject;
    public $search;
    public $perPage = 10;
    public $projectDetails;
    public $project_id;

    public function mount($subject_id,$group_id,$project_id)
    {
        $this->group_subject = GroupSubject::where('subject_id',$subject_id)->where('group_id',$group_id)->first();
        $this->project_id = $project_id;
    }

    public function getGroupProjectsProperty()
    {
        $GroupProjects = Project::where('id',$this->project_id)->first()->GroupProjects()
        ->where('name','like','%'.$this->search.'%')
        ->get()
        ->map(function($group){
            $group->count_students = $group->students->count();
            return $group;
        })
        ;
        // dd($GroupProjects);
        return ToolsApp::convertToPagination($GroupProjects, $this->perPage);

    }
    public function render()
    {
        return view('livewire.academic.subject.project-groups'
        ,['GroupProjects'=>$this->GroupProjects]);
    }
}
