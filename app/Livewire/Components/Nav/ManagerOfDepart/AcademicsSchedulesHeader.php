<?php

namespace App\Livewire\Components\Nav\ManagerOFdepart;

use Livewire\Component;
use App\Traits\Searching;
use App\Traits\SearchingComponent;



class AcademicsSchedulesHeader extends SearchingComponent
{
    public $department;
    public function mount()
    {
        $this->initializeSearching();
    }
    public function render()
    {
        return view('livewire.components.nav.managerOFdepart.academics-schedules-header');
    }
}
