<?php

namespace App\Livewire\ManagementOFSechedules;

use App\Models\Department;
use App\Models\Group;
use App\Models\Level;
use App\Traits\SchedulesTrait;
use App\Traits\Searchable;
use Livewire\Component;

class StudentsSechedules extends Component
{
    use Searchable, SchedulesTrait;
    public $parameters;
    public Department $department;
    public Level $level;
    // public $schedule;
    public function mount()
    {
        $this->parameters = request()->route()->parameters();
    }

    public function selectedSchedule($user_id, $delete = false)
    {
        if ($this?->academicData?->user_id != $user_id && $this->getErrorBag()->has('schedule')) {
            // reset Errors
            $this->resetErrorBag();
        }

        $this->academicData = $this->groups->where('id', $user_id)->first();
        $this->openType = 'selected';
        if ($delete) {
            // check if the schedule is not null
            if ($this->academicData->{$this->nameSchedule} == null) {
                $this->addError('schedule', 'The schedule is already empty');
                $this->openType = 'delete';
            }
        }
    }

    public function getGroupsProperty()
    {
        return $this->level->groups()->whereNull('group_id')

            ->where('name', 'like', '%' . $this->search . '%')
            ->orderBy('name')
            ->paginate($this->perPage);
    }
    public function render()
    {
        return view('livewire.managementOFsechedules.students-sechedules',
            [
                'groups' => $this->groups,
            ]
        );
    }
}
