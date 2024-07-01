<?php

namespace App\Livewire\StudentsAffairs;

use App\Tools\MyApp;
use Livewire\Component;
use App\Models\Department;

class DepartLevelsStudentsAffairs extends Component
{
    public $perPage = MyApp::perPageLists;

    public $department;

    public function mount($DId){
        $this->department = Department::findOrFail($DId);
    }
    public function render()
    {
        return view('livewire.students-affairs.depart-levels-students-affairs'
        ,['levels'=>$this->department->levels()->paginate($this->perPage)]);
    }
}
