<?php

namespace App\Livewire\ManagementOFSechedules;

use Livewire\Component;
use App\Models\Department;

class DepartmentsSechedules extends Component
{
    public function getDepartmentsProperty()
    {
        return Department::all();
    }
    public function render()
    {
        return view('livewire.managementOFsechedules.departments-sechedules',[
            'departments' => $this->departments
        ]);
    }
}
