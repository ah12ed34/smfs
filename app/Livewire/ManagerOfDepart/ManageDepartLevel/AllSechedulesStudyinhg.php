<?php

namespace App\Livewire\ManagerOFdepart\Managedepartlevel;

use App\Models\Level;
use App\Traits\ToolsNav;
use Livewire\Component;

class AllSechedulesStudyinhg extends Component
{
    use ToolsNav;
    public $level;
    public function mount(Level $level)
    {   //teacher
        $this->initializeToolsNav($level,['teacher','group']);
        // $this->level = request()->route()->parameters['level'];
    }
    public function render()
    {
        return view('livewire.managerOFdepart.managedepartlevel.all-sechedules-studyinhg');
    }
}
