<?php

namespace App\Livewire\Components\Nav\Admin;

use Livewire\Component;
use App\Traits\SearchingComponent;
use App\Models\Level; // Add this line to import the Level class
use App\Models\Department;


class StudentsScheduleHeader extends SearchingComponent
{
    // public $level;
    public $department;
    public $level;
    public function mount()
    {
        $this->initializeSearching();
    }
    public function render()
    {
        // $level = $this->level;
        // $department = Department::find($level->department_id);
        // $levels = $department->levels()->get();
        // $levels = Level::where('department_id', $level->department_id)->get();
        return view('livewire.components.nav.admin.students-schedule-header');
    }
}
