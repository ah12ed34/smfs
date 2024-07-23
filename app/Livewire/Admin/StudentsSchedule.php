<?php

namespace App\Livewire\Admin;
use App\Models\Department;
use App\Models\Group;
use App\Models\Level;
use App\Traits\SchedulesTrait;
use App\Traits\Searchable;
use Livewire\Component;
use Livewire\WithFileUploads;
// use App\Traits\Studentsable;

class StudentsSchedule extends Component
{
    // use Searchable, Studentsable;
    // use WithFileUploads;
    // public $level;
    // public $departments;


    // public function mount(Level $level)
    // {
    //     $this->level = $level;
    //     $this->departments = Department::all();
    //     // $this->sortField = 'name';
    // }

    // public function setDepartment($id)
    // {
    //     if($this->departments->contains($id)){
    //         $this->department_id = $id;
    //     }
    // }
    use Searchable,SchedulesTrait;
    public $parameters;
    public Department $department;
    public Level $level;
    public $schedule;
    public function mount()
    {
        $this->parameters = request()->route()->parameters();
    }

    public function selectedSchedule($user_id, $delete = false)
    {
        if ($this?->academicData?->user_id != $user_id&&$this->getErrorBag()->has('schedule'))
        {
            // reset Errors
            $this->resetErrorBag();
        }

        $this->academicData = $this->groups->where('id',$user_id)->first();
        $this->openType = 'selected';
        if ($delete) {
            // check if the schedule is not null
            if ($this->academicData->{$this->nameSchedule} == null) {
                $this->addError('schedule', 'The schedule is already empty');
                $this->openType = 'delete';
            }
        }
    }

    // public function getGroupsProperty()
    // {
    //     return $this->level->groups()->whereNull('group_id')

    //     ->where('name', 'like', '%' . $this->search . '%')
    //     ->orderBy('name')
    //     ->paginate($this->perPage)
    //     ;
    // }
    public function render()
    {
                return view('livewire.admin.students-schedule' );

        // return view('livewire.admin.students-schedule',[
        //     'groups' => $this->groups,
        // ]);
    }
}
