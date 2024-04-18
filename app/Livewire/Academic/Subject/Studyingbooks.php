<?php

namespace App\Livewire\Academic\Subject;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\GroupSubject;

class Studyingbooks extends Component
{
    use WithPagination;
    public $group_subject;
    public $search;
    public $perPage = 10;


    public function mount($subject_id, $group_id)
    {
        $this->group_subject = GroupSubject::where('subject_id', $subject_id)
        ->where('group_id', $group_id)
        ->first();
    }

    #[On('search')]
    public function search($v){
        $this->search = $v;
    }

    public function getStudyingbooksProperty()
    {
        return $this->group_subject->getFilesInGroupBySubject('chapter', $this->search)
        ->paginate($this->perPage);
    }
    public function render()
    {
        return view('livewire.academic.subject.studyingbooks'

        , [
            'studyingbooks' => $this->studyingbooks
        ]);
    }
}
