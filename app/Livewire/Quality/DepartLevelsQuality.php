<?php

namespace App\Livewire\Quality;

use App\Models\Department;
use Livewire\Component;

class DepartLevelsQuality extends Component
{
    public Department $department;
    public $levels;
    public function mount()
    {
        // $this->department = Department::find($this->department->id);
        $this->levels = $this->department->levels;
    }
    public function render()
    {
        return view('livewire.quality.depart-levels-quality');
    }
}
