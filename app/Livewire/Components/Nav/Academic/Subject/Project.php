<?php

namespace App\Livewire\Components\Nav\Academic\Subject;

use App\Traits\SearchingComponent;
class Project extends SearchingComponent
{
    public $group_subject;
    public $deny = [];
    public $backName = 'subject.index';
    public $active = ['tab'=>null] ;
    public function mount()
    {
        $this->initializeSearching();
    }
    public function render()
    {
        return view('livewire.components.nav.academic.subject.project');
    }
}
