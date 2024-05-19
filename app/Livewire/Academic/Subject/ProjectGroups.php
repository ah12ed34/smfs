<?php

namespace App\Livewire\Academic\Subject;

use Livewire\Component;
use App\Models\GroupSubject;


class ProjectGroups extends Component
{
    public $group_subject;
    public function mount($subject_id,$group_id,$project_id)
    {
        $this->group_subject = GroupSubject::where('subject_id',$subject_id)->where('group_id',$group_id)->first();
    }
    public function render()
    {
        return view('livewire.academic.subject.project-groups');
    }
}
