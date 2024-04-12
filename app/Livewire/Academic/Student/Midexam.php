<?php

namespace App\Livewire\Academic\Student;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
class Midexam extends Component
{
    use WithPagination;
    public $group_subject;
    public $midexam = [];
    public $search;
    public $perPage = 10;
    public function mount($group_subject)
    {
        $this->group_subject = $group_subject;
        // foreach ($group_subject->students as $key => $student) {
        //     for ($i = 1; $i < 16; $i++) {
        //         if ($group_subject->studying->where('student_id', $student->pivot->id)->first() == null)
        //             continue;
        //         $this->midexam[$student->user_id][$i] = $group_subject->studying->where('student_id', $student->pivot->id)->first()->{'midexam' . $i};
        //     }
        // }
    }

    #[On('search')]
    public function search($v){
        $this->search = $v;
    }

    // studens
    public function getStudentsProperty()
    {
        return $this->group_subject->getStudentsInGroupBySubject($this->search)
        ->paginate($this->perPage);
    }
    public function render()
    {
        return view('livewire.academic.student.midexam', [
            'students' => $this->students
        ]);
    }
}
