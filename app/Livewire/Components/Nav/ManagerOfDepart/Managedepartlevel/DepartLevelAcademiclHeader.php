<?php

namespace App\Livewire\Components\Nav\ManagerOFdepart\Managedepartlevel;

use App\Traits\Searching;
use Livewire\Component;

class DepartLevelAcademiclHeader extends Component
{
    use Searching;

    public $level;
    public $parameter ;
    public function mount()
    {

        $this->parameter = request()->route()->parameters();
    }
    public function render()
    {
        return view('livewire.components.nav.managerOFdepart.managedepartlevel.depart-level-academicl-header');
    }
}
