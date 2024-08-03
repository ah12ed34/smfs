<?php

namespace App\Livewire\Quality;

use App\Models\Level;
use Livewire\Component;

class QualityBoardMain extends Component
{
    public Level $level;
    public function render()
    {
        return view('livewire.quality.quality-board-main');
    }
}
