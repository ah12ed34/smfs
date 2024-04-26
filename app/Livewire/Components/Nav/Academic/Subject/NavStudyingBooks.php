<?php

namespace App\Livewire\Components\Nav\Academic\Subject;

use Livewire\Component;
use Livewire\WithFileUploads;
class NavStudyingBooks extends Component
{
    use WithFileUploads;
    public $group_subject;
    public $search;
    public $file;
    public $nameFile;

    public function srch(){
        $this->dispatch('search', $this->search);
    }

    public function addFile(){
        $this->validate([
            'file' => 'required|mimes:pdf,docx,doc,pptx,ppt',
            'nameFile' => 'required|string'
        ]);
        $file = $this->file->store('subject/books');
        unlink($this->file->getRealPath());
        $this->group_subject->files()->create([
            'name' => $this->nameFile,
            'file' => $file,
            'type' => 'chapter',
            'user_id' => auth()->id(),
        ]);
        $this->file = null;
        $this->nameFile = null;

        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.components.nav.academic.subject.nav-studying-books');
    }
}
