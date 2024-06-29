<?php

namespace App\Livewire\Components\Nav\StudentsAffairs;

use Livewire\Component;

class StudentsAffairsMainStudentsInformationHeader extends Component
{
    public $level;
    public $search;

    public function srch()
    {
        $this->dispatch('search', $this->search);
    }
    public function render()
    {
        return view('livewire.components.nav.students-affairs.students-affairs-main-students-information-header');
    }
}
