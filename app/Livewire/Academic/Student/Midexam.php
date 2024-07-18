<?php

namespace App\Livewire\Academic\Student;

use App\Models\GroupSubject;
use App\Traits\Searchable;
use Livewire\Component;
use App\Repositories\EmployeesRepository;
use App\Traits\Academic\studentAT;

class Midexam extends Component
{
    use studentAT;
    public $group_subject;
    public $midexam = [];
    protected $AcademicR;

    public function __construct()
    {
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

    // studens
    public function getStudentsProperty()
    {
        // dd($this->getStudents($this->group_subject));
    return $this->getStudents($this->group_subject)->
    paginate($this->perPage);
    }
    public function render()
    {
        return view('livewire.academic.student.midexam', [
            'students' => $this->students
        ]);
    }
}
