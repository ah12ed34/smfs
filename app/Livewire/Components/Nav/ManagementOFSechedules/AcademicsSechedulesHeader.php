<?php

namespace App\Livewire\Components\Nav\ManagementOFSechedules;

use Livewire\Component;
use App\Traits\Searching;
use App\Traits\SearchingComponent;

class AcademicsSechedulesHeader extends SearchingComponent
{
    public $department;
    public function mount()
    {
        $this->initializeSearching();
    }
    public function render()
    {
        return view('livewire.components.nav.managementOFsechedules.academics-sechedules-header');
    }
}
