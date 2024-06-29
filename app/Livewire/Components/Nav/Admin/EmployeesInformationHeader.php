<?php

namespace App\Livewire\Components\Nav\Admin;

use Livewire\Component;

class EmployeesInformationHeader extends Component
{
    public $search;
    public $leftName = 'Employees';

    public function srch()
    {
        $this->dispatch('search', $this->search);
    }

    public function addUser(){
        $this->dispatch('addUser');
    }
    public function render()
    {
        return view('livewire.components.nav.admin.employees-information-header');
    }
}
