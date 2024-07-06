<?php

namespace App\Livewire\ManagerOfDepart;

use App\Models\Department;
use Livewire\Component;
use App\Models\Level;

class ManagDepartMain extends Component
{
    public $user;
    public function mount()
    {
        $this->user = auth()->user();
    }
    public function getLevelsProperty()
    {
        return Department::FindOrFail($this->user?->academic?->department_id)->levels;
    }
    public function render()
    {
        return view('livewire.managerOFdepart.manag-depart-main',[
            'levels' => $this->levels
        ]);
    }
}
