<?php

namespace App\Livewire\Components\Nav\Student\StudStudyingBooks;

use App\Traits\Searching;
use Livewire\Component;

class StudFormQuiz extends Component
{
    use Searching;
    public $group_subject;
    public $active = 'forms';
    public $subject_name = '';
    public function mount()
    {
        $this->subject_name = $this->group_subject->subject()->first()->name_ar;
    }
    public function render()
    {
        return view('livewire.components.nav.student.stud-studying-books.stud-form-quiz');
    }
}
