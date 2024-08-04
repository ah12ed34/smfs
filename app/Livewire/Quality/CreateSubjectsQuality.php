<?php

namespace App\Livewire\Quality;

use App\Models\Level;
use App\Traits\SearchingComponent;
use App\Traits\ToolsNav;
use Livewire\Component;

class CreateSubjectsQuality extends Component
{
    use ToolsNav;
    public Level $level;
    public function mount()
    {
        $this->initializeToolsNav($this->level, ['term']);
    }
    public function render()
    {
        return view('livewire.quality.create-subjects-quality');
    }
}
