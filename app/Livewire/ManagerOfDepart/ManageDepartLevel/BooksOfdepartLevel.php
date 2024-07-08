<?php

namespace App\Livewire\ManagerOFdepart\Managedepartlevel;

use Livewire\Component;
use App\Models\Level;
use App\Traits\Searchable;
use App\Traits\SubjectsTrait;

class BooksOfdepartLevel extends Component
{
    use Searchable,SubjectsTrait;
    public $level;

    public function mount(Level $level)
    {
        $this->level = $level;
        $this->initializeSubjects();
    }

    public function getSubjectsProperty()
    {
        $s = $this->SubjectsR->getSubjectsByLevelAndTerm($this->level->id)
        ->where('name','like','%'.$this->search.'%')
        ->orderBy($this->sortField,$this->sortAsc ? 'asc' : 'desc')
        ->paginate($this->perPage);
        return $s;
    }
    public function render()
    {
        return view('livewire.managerOFdepart.managedepartlevel.booksofdepart-level'
        ,['subjects' => $this->subjects]);
    }
}
