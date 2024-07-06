<?php

namespace App\Livewire\Components\Nav\Admin;

use Livewire\Component;

class StudentsMainGroupsHeader extends Component
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
        return view('livewire.components.nav.admin.students-main-groups-header');
    }
}
