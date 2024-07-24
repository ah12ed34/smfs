<?php

namespace App\Livewire;

use App\Repositories\NotificationsRepository;
use Livewire\Component;
use App\Models\Department;
use App\Models\Level;
use App\Models\Notification;
use App\Traits\Tools;


class Test extends Component
{
    protected $noti;

    public $notiActive = 'student_a';

    public function mount()
    {
        // $this->initializeToolsNav(selectActive: ['department', 'level', 'role', 'subject', 'group']);
        // $level_id = 1;
        // $department_id = 2;
        // $type = 'all';
        // $group_id = null;


        // $groups = $levels = Level::when($department_id, function ($query) use ($department_id) {
        //     return $query->where('department_id', $department_id);
        // })->get();

        // dd($groups);
        $this->noti = new NotificationsRepository();
        dd(Notification::find(20)->subject->subjects);
        // dd($this->noti->getUsersIsStudentByDepartmentAndLevelAndGroup(1, null, 1));
    }

    // public function setA($a)
    // {
    //     $this->dispatch('na', $a);
    // }

    public function render()
    {
        return view('livewire.test');
    }
}
