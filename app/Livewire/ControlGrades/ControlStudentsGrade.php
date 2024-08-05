<?php

namespace App\Livewire\ControlGrades;

use App\Models\Level;
use Livewire\Component;

class ControlStudentsGrade extends Component
{
    public Level $level;

    public function mount()
    {
    }
    public function getSubjectsProperty()
    {
        return $this->level->subjects;
    }
    public function getStudentsProperty()
    {
        $students = $this->level->students;

        return $students;
    }
    public function render()
    {
        return view('livewire.control-grades.control-students-grade',
            [
                'subjects' => $this->subjects,
                'students' => $this->students,
            ]
        );
    }
}
