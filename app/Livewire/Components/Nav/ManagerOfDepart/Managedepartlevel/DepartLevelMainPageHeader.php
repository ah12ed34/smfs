<?php

namespace App\Livewire\Components\Nav\ManagerOFdepart\Managedepartlevel;

use Livewire\Component;
use App\Models\Level;

class DepartLevelMainPageHeader extends Component
{
    public $level;
    public $search;
    public $parameter;
    public function mount(Level $level){
        $this->level = $level;
        $this->parameter = request()->route()->parameters();
        // dd($this->level);
    }
    public function render()
    {
        return view('livewire.components.nav.managerOFdepart.managedepartlevel.depart-level-main-page-header');
    }
}
