<?php

namespace App\Livewire\Components\Nav\Quality;

use App\Traits\SearchingComponent;
use Livewire\Component;

class SubjectsDataForTeacherHeader extends SearchingComponent
{
    public $level;
    public function mount()
    {
        $this->initializeSearching();
    }
    public function render()
    {
        return view('livewire.components.nav.quality.subjects-data-for-teacher-header');
    }
}
