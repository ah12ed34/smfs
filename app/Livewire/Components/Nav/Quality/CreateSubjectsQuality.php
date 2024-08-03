<?php

namespace App\Livewire\Components\Nav\Quality;

use App\Traits\SearchingComponent;
use Livewire\Component;

class CreateSubjectsQuality extends SearchingComponent
{
    public $level;
    public function render()
    {
        return view('livewire.components.nav.quality.create-subjects-quality');
    }
}
