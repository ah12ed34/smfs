<?php

namespace App\Livewire\Components\Nav\Academic\Subject;

use Livewire\Component;


class NavStudyingBooks extends Component
{
    public $group_subject;
    public $search;

    public function srch(){
        $this->dispatch('search', $this->search);
    }

    public function render()
    {
        return view('livewire.components.nav.academic.subject.nav-studying-books');
    }
}
