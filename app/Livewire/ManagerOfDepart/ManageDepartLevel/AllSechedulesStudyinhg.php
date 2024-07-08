<?php

namespace App\Livewire\ManagerOFdepart\Managedepartlevel;

use Livewire\Component;

class AllSechedulesStudyinhg extends Component
{
    public $level;
    public function mount()
    {
        // $this->level = request()->route()->parameters['level'];
    }
    public function render()
    {
        return view('livewire.managerOFdepart.managedepartlevel.all-sechedules-studyinhg');
    }
}
