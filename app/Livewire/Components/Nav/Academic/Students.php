<?php

namespace App\Livewire\Components\Nav\Academic;

use Livewire\Component;
use App\Models\Group;

class Students extends Component
{
    public $active ;
    public $group_subject;
    public $search;
    public $otherGroups;
    public function mount($group_subject)
    {
        $this->group_subject = $group_subject;
        $this->otherGroups = Group::join('group_subjects', 'groups.id', '=', 'group_subjects.group_id')
            ->where('group_subjects.subject_id', $group_subject->subject_id)
            ->where('group_subjects.teacher_id', auth()->user()->academic->user_id)
            ->where('groups.id', '!=', $group_subject->group_id)
            ->select('groups.*')
            ->get();
    }

    public function srch()
    {
        $this->dispatch('search', $this->search);
    }

    public function render()
    {
        return view('livewire.components.nav.academic.students');
    }
}
