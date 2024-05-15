<?php

namespace App\Livewire\Academic\Student;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class ProjectsGradesStu extends Component
{
    use WithPagination;
    public $group_subject;
    public $search;
    public $perPage = 10;

    public function mount($group_subject)
    {
        $this->group_subject = $group_subject;
    }

    #[On('search')]
    public function search($v){
        $this->search = $v;
    }

    public function getStudentsProperty()
    {
        return $this->group_subject->getStudentsInGroupBySubject($this->search)
        ->paginate($this->perPage);
    }
    public function render()
    {
        return view('livewire.academic.student.projects-grades-stu', [
            'students' => $this->students
        ]);
    }
}
