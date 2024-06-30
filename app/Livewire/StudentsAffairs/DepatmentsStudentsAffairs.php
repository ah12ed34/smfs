<?php

namespace App\Livewire\StudentsAffairs;

use Livewire\Component;
use App\Models\Department;
use App\Tools\MyApp;

class DepatmentsStudentsAffairs extends Component
{
    public $perPage = MyApp::perPageLists;

    public function render()
    {
        return view('livewire.students-affairs.depatments-students-affairs'
        ,['departments'=>Department::paginate($this->perPage)]
    );
    }
}
