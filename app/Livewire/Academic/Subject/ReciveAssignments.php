<?php

namespace App\Livewire\Academic\Subject;

use Livewire\Component;
use App\Models\GroupSubject;

class ReciveAssignments extends Component
{
    public $group_subject;

    public function mount($subject_id, $group_id)
    {
        $this->group_subject = GroupSubject::where('group_id', $group_id)
            ->where('subject_id', $subject_id)
            ->first();
    }
    public function render()
    {
        return view('livewire.academic.subject.recive-assignments');
    }
}
