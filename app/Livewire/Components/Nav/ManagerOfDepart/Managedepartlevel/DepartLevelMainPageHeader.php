<?php

namespace App\Livewire\Components\Nav\ManagerOFdepart\Managedepartlevel;

use Livewire\Component;
use App\Models\Level;
use App\Traits\Searching;

class DepartLevelMainPageHeader extends Component
{
    use Searching;
    public $level;
    public $typeGroup = 'main';
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
