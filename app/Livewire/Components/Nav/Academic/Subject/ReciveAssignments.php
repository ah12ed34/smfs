<?php

namespace App\Livewire\Components\Nav\Academic\Subject;

use Livewire\Component;

class ReciveAssignments extends Component
{
    public $group_subject;
    public $tabActive= null ;
    public $search ;
    public $parameters ;

    public function mount(){
        $this->parameters = request()->route()->parameters;
    }

    public function srch()
    {
        // echo $this->search;
        // dd('search');
        $this->dispatch('search', $this->search);
    }
    public function render()
    {
        return view('livewire.components.nav.academic.subject.recive-assignments'
       );
    }
}
