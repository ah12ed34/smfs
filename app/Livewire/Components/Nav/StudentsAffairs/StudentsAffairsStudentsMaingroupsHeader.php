<?php

namespace App\Livewire\Components\Nav\StudentsAffairs;

use Livewire\Component;

class StudentsAffairsStudentsMaingroupsHeader extends Component
{
    public $level;
    public $search;
    public $typeGroup;
    public $routeName;
    public function mount()
    {

        $this->routeName = request()->route()->getName();
    }

    public function srch()
    {
        $this->dispatch('search', $this->search);
    }
    public function render()
    {
        return view('livewire.components.nav.students-affairs.students-affairs-students-maingroups-header');
    }
}
