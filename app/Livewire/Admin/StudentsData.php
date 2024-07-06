<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Level;
use App\Tools\MyApp;
use App\Models\Department;




class StudentsData extends Component
{
    // public $perPage = MyApp::perPageLists;

    // public $department;

    // public function mount($DId){
    //     $this->department = Department::findOrFail($DId);
    // }
    public $level;
    public function mount($LId)
    {
        $this->level = Level::findOrfail($LId);
    }
    public function render()
    {
        return view('livewire.admin.students-data');
    }
}
