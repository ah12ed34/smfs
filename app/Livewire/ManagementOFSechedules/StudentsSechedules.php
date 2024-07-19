<?php

namespace App\Livewire\ManagementOFSechedules;

use Livewire\Component;

class StudentsSechedules extends Component
{
    public $parameters;
    public function mount()
    {
        $this->parameters = request()->route()->parameters();
    }
    public function render()
    {
        return view('livewire.managementOFsechedules.students-sechedules');
    }
}
