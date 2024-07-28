<?php

namespace App\Livewire\Academic\StudyingSchedule;
use App\Models\Level;
use Livewire\Component;
use App\Models\Department;
class StudentsScheduleStudying extends Component
{
    public $level;
    public $academic;
    public $groups;
    public $schedule;
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
        return view('livewire.academic.studying-schedule.students-schedule-studying',[
            'groups' => $this->groups
        ]);
    }
}
