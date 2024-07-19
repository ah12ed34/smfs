<?php

namespace App\Livewire\Components\Nav\ManagementOFSechedules;

use App\Traits\SearchingComponent;
use Livewire\Component;

class StudentsSechedulesHeader extends SearchingComponent
{
    public function mount()
    {
        $this->initializeSearching();
    }
    public function render()
    {
        return view('livewire.components.nav.managementOFsechedules.students-sechedules-header');
    }
}
