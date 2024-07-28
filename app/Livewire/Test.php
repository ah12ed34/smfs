<?php

namespace App\Livewire;

use App\Models\Level;
use App\Traits\Tools;
use Livewire\Component;
use App\Models\Department;
use App\Models\GroupSubject;
use App\Models\Notification;
use App\Repositories\FileRepsitory;
use App\Repositories\FileRepository;
use App\Repositories\NotificationsRepository;


class Test extends Component
{
    protected $test;

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
        $this->test = new FileRepository();
        $keys = $this->test->getArrayHeaderKey(["id",    "midterm_exam"]);

        $s = $this->test->getStudentAndGradeToAcademic(['20163132'], $keys);
        $ss = GroupSubject::find(7)->groupStudents->where('student_id', $s['id'])->first();
        dd($ss, $s['id']);
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
