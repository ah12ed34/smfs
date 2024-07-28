<?php

namespace App\Livewire\ManagerOFdepart\Managedepartlevel;

use App\Models\Level;
use App\Traits\ToolsNav;
use Livewire\Component;
use App\Traits\SchedulesTrait;
use App\Traits\Searchable;
use App\Models\Department;
use App\Traits\SearchingComponent;

class AllSechedulesStudyinhg extends SearchingComponent
{
    // use ToolsNav;
    // public $level;
    // public function mount(Level $level)
    // {   //teacher
    //     $this->initializeToolsNav($level,['teacher','group']);
    // }
    // use Searchable,SchedulesTrait;
    // public $parameters;
    // public Department $department;
    // public Level $level;
    // public $schedule;
    // // public $parameter ;
    // public $groups;
    // public $teachers;
    // public $active = [
    //     'tab' => 'schedules',
    // ];
    // public function mount()
    // {
    //     $this->parameters = request()->route()->parameters();
    // }

    // public function selectedSchedule($user_id, $delete = false)
    // {
    //     if ($this?->academicData?->user_id != $user_id&&$this->getErrorBag()->has('schedule'))
    //     {
    //         // reset Errors
    //         $this->resetErrorBag();
    //     }

    //     $this->academicData = $this->groups->where('id',$user_id)->first();
    //     $this->openType = 'selected';
    //     if ($delete) {
    //         // check if the schedule is not null
    //         if ($this->academicData->{$this->nameSchedule} == null) {
    //             $this->addError('schedule', 'The schedule is already empty');
    //             $this->openType = 'delete';
    //         }
    //     }
    // }

    // public function getGroupsProperty()
    // {
    //     return $this->level->groups()->whereNull('group_id')

    //     ->where('name', 'like', '%' . $this->search . '%')
    //     ->orderBy('name')
    //     ->paginate($this->perPage)
    //     ;
    // }
    public $level;
    public $academic;
    public $groups;
    public $schedule;
    public $active;
    public $parameter ;
    // public $groups;
    public $teachers;
    public function mount()
    {
        $this->academic = auth()->user()->academic;
        $this->groups = $this->academic->courses->map(function ($course) {
            if($course->group->group_id == null){
                return $course->group;
            }elseif($course->group->group_id != null){
                return $course->group->group ;
            }
        })->flatten()->unique('id');

    }

    public function showSchedule($id)
    {
        $this->schedule = $this->groups->where('id',$id)->first()->schedule;

    }

    public function render()
    {
        return view('livewire.managerOFdepart.managedepartlevel.all-sechedules-studyinhg',[
            'groups' => $this->groups
        ]);
    }
}
