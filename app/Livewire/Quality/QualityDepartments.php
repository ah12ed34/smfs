<?php

namespace App\Livewire\Quality;

use Livewire\Component;
use App\Models\Department;

class QualityDepartments extends Component
{
    public $departments ;

    public function mount()
    {
        $this->departments = Department::all();
    }
    public function render()
    {
        return view('livewire.quality.quality-departments');
    }
}
