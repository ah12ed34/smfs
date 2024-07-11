<?php

namespace App\Livewire\Components\Nav\Admin;

use Livewire\Component;
use App\Models\Level; // Add this line to import the Level class
use App\Models\Department;


class LevelStudentsInformationHeader extends Component
{
    public $level;
    public $search;

    public function srch(){
        $this->dispatch('search',$this->search);
    }
    public function render()
    {
        $level = $this->level;
        $department = Department::find($level->department_id);
        $levels = $department->levels()->get();
        $levels = Level::where('department_id', $level->department_id)->get();
        return view('livewire.components.nav.admin.level-students-information-header',['level'=>$level, 'department_name'=>$department->name]);
    }
}
