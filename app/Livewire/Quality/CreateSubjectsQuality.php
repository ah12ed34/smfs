<?php

namespace App\Livewire\Quality;

use App\Models\Level;
use App\Traits\SearchingComponent;
use Livewire\Component;

class CreateSubjectsQuality extends SearchingComponent
{
    public Level $level;
    public function render()
    {
        return view('livewire.quality.create-subjects-quality');
    }
}
