<?php

namespace App\Livewire\Components\Nav\ManagerOFdepart\Managedepartlevel;

use App\Models\Level;
use Livewire\Component;
use App\Traits\Searching;
class StudentsGroupsInformationHeader extends Component
{
    use Searching;
    public Level $level;
    public function render()
    {
        return view('livewire.components.nav.managerOFdepart.managedepartlevel.students-groups-information-header');
    }
}
