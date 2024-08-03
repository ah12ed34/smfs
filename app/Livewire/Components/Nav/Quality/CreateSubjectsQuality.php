<?php

namespace App\Livewire\Components\Nav\Quality;

use Livewire\Component;

class CreateSubjectsQuality extends Component
{
    public $level;
    public function render()
    {
        return view('livewire.components.nav.quality.create-subjects-quality');
    }
}
