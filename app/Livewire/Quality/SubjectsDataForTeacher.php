<?php

namespace App\Livewire\Quality;

use App\Traits\SearchingComponent;
use Livewire\Component;

class SubjectsDataForTeacher extends SearchingComponent
{
    public function render()
    {
        return view('livewire.quality.subjects-data-for-teacher');
    }
}
