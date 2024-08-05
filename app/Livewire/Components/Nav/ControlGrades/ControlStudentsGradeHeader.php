<?php

namespace App\Livewire\Components\Nav\ControlGrades;

use App\Traits\SearchingComponent;
use Livewire\Component;

class ControlStudentsGradeHeader extends SearchingComponent
{
    public $level;
    public function render()
    {
        return view('livewire.components.nav.control-grades.control-students-grade-header');
    }
}
