<?php

namespace App\Livewire\Academic\Student;

use App\Models\GroupSubject;
use App\Traits\Academic\studentAT;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class ProjectsGradesStu extends Component
{
    use studentAT;
    public $group_subject;
    // public $search;
    // public $perPage = 10;

    public function __construct(){
        $this->initializeStudentAT();
    }
    public function mount(GroupSubject $group_subject)
    {
        $this->group_subject = $group_subject;
    }

    // #[On('search')]
    // public function search($v){
    //     $this->search = $v;
    // }

    public function getStudentsProperty()
    {
        $students = $this->getStudents($this->group_subject);
        $students = $students->get()->map(function($student){
            $student->projects_name = $this->group_subject->projects->pluck('name')->implode(' , ');
            $student->projects = $this->getStudentProjects($student, $this->group_subject);
            return $student;
        });


        return $students->paginate($this->perPage);
    }
    public function render()
    {
        return view('livewire.academic.student.projects-grades-stu', [
            'students' => $this->students
        ]);
    }
}
