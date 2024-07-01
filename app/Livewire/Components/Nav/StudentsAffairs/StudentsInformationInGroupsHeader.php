<?php

namespace App\Livewire\Components\Nav\StudentsAffairs;

use Livewire\Component;

class StudentsInformationInGroupsHeader extends Component
{
    public $level;
    public $search;

    public function srch()
    {
        $this->dispatch('search', $this->search);
    }
    public function render()
    {
        return view('livewire.components.nav.students-affairs.students-information-in-groups-header');
    }
}
