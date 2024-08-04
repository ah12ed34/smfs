<?php

namespace App\Livewire\Quality;

use App\Models\Level;
use App\Traits\SearchingComponent;
use App\Traits\ToolsNav;
use Livewire\Component;

class SubjectsDataForTeacher extends Component
{
    public Level $level;
    use ToolsNav;

    public function mount()
    {
        $this->initializeToolsNav($this->level, ['term']);
    }
    public function render()
    {
        return view('livewire.quality.subjects-data-for-teacher');
    }
}
