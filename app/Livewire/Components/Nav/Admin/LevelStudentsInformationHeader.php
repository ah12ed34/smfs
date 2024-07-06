<?php

namespace App\Livewire\Components\Nav\Admin;

use Livewire\Component;

class LevelStudentsInformationHeader extends Component
{
    public $level;
    public $search;

    public function srch(){
        $this->dispatch('search',$this->search);
    }
    public function render()
    {
        return view('livewire.components.nav.admin.level-students-information-header');
    }
}
