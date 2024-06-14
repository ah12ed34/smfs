<?php

namespace App\Livewire\Components\Nav\Student\Project;

use Livewire\Component;

class StudentProjects extends Component
{
    public $Tab ;
    public $search;

    public function srch(){
        $this->dispatch('search', $this->search);
    }

    public function render()
    {
        return view('livewire.components.nav.student.project.student-projects');
    }
}
