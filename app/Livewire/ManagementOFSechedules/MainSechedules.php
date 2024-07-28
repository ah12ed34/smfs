<?php

namespace App\Livewire\ManagementOFSechedules;

use App\Models\Level;
use App\Models\Department;
use Livewire\Component;

class MainSechedules extends Component
{
    public Department $department;
    public Level  $level;
    public function render()
    {
        return view('livewire.managementOFsechedules.main-sechedules');
    }
}
