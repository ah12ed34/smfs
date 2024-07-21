<?php

namespace App\Livewire\Quality;

use App\Traits\SearchingComponent;
use Livewire\Component;

class CreateSubjectsQuality extends SearchingComponent
{
    public function render()
    {
        return view('livewire.quality.create-subjects-quality');
    }
}
