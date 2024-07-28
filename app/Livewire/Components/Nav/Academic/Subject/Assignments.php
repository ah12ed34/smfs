<?php

namespace App\Livewire\Components\Nav\Academic\Subject;

use App\Traits\SearchingComponent;
// use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithFileUploads;

class Assignments extends SearchingComponent
{
    use WithFileUploads;
    // use WithFileUploads;
    public $group_subject;
    public $otherGroups;
    public $assName;
    public $grade;
    public $date;
    public $file;
    public $description;

    public function mount()
    {
        $this->initializeSearching();
        // $this->otherGroups = $this->group_subject->getOtherGroups();
    }


    public function updatedFile(){
        if (empty($this->file)) {
            $this->file = null;
        }
    }

    public function addAssignment(){
        $this->validate([
            'assName' => 'required',
            'grade' => 'required',
            'date' => 'required',
            'file' => ($this->description == null) ? 'required' : 'nullable' .'|file|mimes:pdf,doc,docx,zip,png,jpg,jpeg,txt',
            'description' => ($this->file == null) ? 'required' : 'nullable',

        ]);
        // dd($this->group_subject->id,$this->description,$this->file);
        $file = null;
        if($this->file != null){
            $file = $this->file->store('subjects/assignments');
            unlink($this->file->getRealPath());
        }
        $this->group_subject->groupFiles()->create([
            'file_id' => $this->group_subject->files()->create([
                'name' => $this->assName,
                'file' => $file,
                'user_id' => auth()->id(),
                'type' => 'assignment',
                'description' => $this->description,
            ])->id,
            'user_id' => auth()->id(),
            'grade' => $this->grade,
            'due_date' => $this->date,
        ]);

        $this->reset(['assName','grade','date','file','description']);
        $this->dispatch('closeModal');


    }

    public function render()
    {
        return view('livewire.components.nav.academic.subject.assignments');
    }
}
