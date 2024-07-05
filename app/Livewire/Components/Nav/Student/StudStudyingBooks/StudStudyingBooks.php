<?php

namespace App\Livewire\Components\Nav\Student\StudStudyingBooks;

use Livewire\Component;
use App\Models\GroupStudents;

class StudStudyingBooks extends Component
{
    public $department_name;
    public $terms;
    public $term;
    public $groupStudents;
    public function mount($term,$groupStudents)
    {
        if($groupStudents&&$term){
            $this->term = $term;
            $this->groupStudents = $groupStudents;
        }else{
            $selected = $this->terms[count($this->terms)-1];
            $this->term = $selected['term'];
            $this->groupStudents = new GroupStudents(['id'=>$selected['id']]);
        }
    }
    public function render()
    {
        return view('livewire.components.nav.student.stud-studying-books.stud-studying-books');
    }
}
