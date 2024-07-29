<?php

namespace App\Livewire\Components\Nav\ManagerOfDepart;

use App\Traits\Searching;
use Livewire\Component;

class ManageAcademicDepart extends Component
{
    use Searching;
    public $active = [
        'tab' => 'departmentAcademic',
    ];
    public function render()
    {
        return view('livewire.components.nav.managerOFdepart.manage-academic-depart');
    }
}
