<?php

namespace App\Livewire\Components\Nav\Academic\Subject;

use Livewire\Component;

class ReciveAssignments extends Component
{
    public $group_subject;
    public $tabActive= null ;
    public function render()
    {
        return view('livewire.components.nav.academic.subject.recive-assignments');
    }
}
