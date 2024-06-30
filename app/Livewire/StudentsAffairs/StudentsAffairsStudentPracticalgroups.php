<?php

namespace App\Livewire\StudentsAffairs;

use App\Models\Level;
use Livewire\Component;

class StudentsAffairsStudentPracticalgroups extends Component
{
    public $level;
    public $practicalgroup;

    public function mount(Level $LId, $practicalgroup)
    {
        $this->level = $LId;
        $this->practicalgroup = $practicalgroup;
    }
    public function render()
    {
        return view('livewire.students-affairs.students-affairs-student-practicalgroups');
    }
}
