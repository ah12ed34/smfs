<?php

namespace App\Livewire\ManagerOFdepart\Managedepartlevel;

use Livewire\Component;
use App\Models\Level;
use App\Traits\Searchable;
use App\Traits\SubjectsTrait;

class BooksOfdepartLevel extends Component
{
    use SubjectsTrait , Searchable;
    public $level;

    public function mount(Level $level)
    {
        $this->level = $level;
        $this->initializeSubjects();
    }

    public function getSubjectsProperty()
    {
        if(!isset($this->SubjectsR))
        {
            $this->initializeSubjects();

        }

        $s = $this->SubjectsR->getSubjectsByLevelAndTerm($this->level->id)
        ->orderBy($this->sortField,$this->sortAsc ? 'asc' : 'desc')
        ->get()->filter(function($subject){
            return $this->search == '' || str_contains($subject->name_ar,$this->search)
            || str_contains($subject->name_en,$this->search)
            || str_contains($subject->id,$this->search);
        })
        ->paginate($this->perPage);
        return $s;
    }
    public function render()
    {
        return view('livewire.managerOFdepart.managedepartlevel.booksofdepart-level'
        ,['subjects' => $this->subjects]);
    }
}
