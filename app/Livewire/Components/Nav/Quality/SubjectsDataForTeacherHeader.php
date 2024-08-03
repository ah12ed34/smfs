<?php

namespace App\Livewire\Components\Nav\Quality;

use Livewire\Component;

class SubjectsDataForTeacherHeader extends Component
{
    public $level;
    public function render()
    {
        return view('livewire.components.nav.quality.subjects-data-for-teacher-header');
    }
}
