<?php

namespace App\Livewire\ManagementOFSechedules;

use App\Models\Department;
use Livewire\Component;

class LevelsSechedules extends Component
{
    public Department $department;
    public $parameters;
    public function mount()
    {
        $this->parameters = request()->route()->parameters();
    }
    public function getLevelsProperty()
    {
        return $this->department->levels;
    }
    public function render()
    {
        return view('livewire.managementOFsechedules.levels-sechedules',[
            'levels' => $this->levels
        ]);
    }
}
