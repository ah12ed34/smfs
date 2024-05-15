<?php

namespace App\Livewire\Academic\Subject;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Project extends Component
{
    use WithPagination;
    public $group_subject;
    public $search;
    public $perPage = 10;
    public $students = [];

    #[On('search')]
    public function search($v){
        $this->search = $v;
    }
    public function getProjectsProperty()
    {
        // dd($this->group_subject);
        return $this->group_subject->getProjectsInGroupBySubject($this->search)
        ->paginate($this->perPage);
    }
    public function selected($id)
    {
        $this->students = $this->Projects->where('id',$id)->first()->students
        // ->map(function($student){
        //     return $student->pivot->id;
        // })
        ;
    }
    public function render()
    {
        return view('livewire.academic.subject.project', [
            'projects' => $this->projects
        ]);
    }
}
