<?php

namespace App\Livewire\ManagerOFdepart\Managedepartlevel;

use App\Models\Level;
use Livewire\Component;

class ManageDepartStudentsFinalTearmStatistics extends Component
{
    public $level;
    public function mount(Level $level)
    {
        $this->level = $level;
    }
    public function render()
    {
        return view('livewire.managerOFdepart.managedepartlevel.manage-depart-students-final-tearm-statistics');
    }
}
