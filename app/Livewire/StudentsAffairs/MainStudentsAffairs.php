<?php

namespace App\Livewire\StudentsAffairs;

use Livewire\Component;
use App\Models\Level;

class MainStudentsAffairs extends Component
{
    public $level;
    public function mount($LId)
    {
        $this->level = Level::findOrfail($LId);
    }
    public function render()
    {
        return view('livewire.students-affairs.main-students-affairs');
    }
}
