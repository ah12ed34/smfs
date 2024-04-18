<?php

namespace App\Livewire\Components\Nav\Academic\Subject;

use Livewire\Component;
use App\Models\File;
// use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithFileUploads;

class Assignments extends Component
{
    use WithFileUploads;
    // use WithFileUploads;
    public $group_subject;
    public $search;
    public $otherGroups;
    public $assName;
    public $grade;
    public $date;
    public $file;
    public $description;

    public function mount()
    {

        $this->otherGroups = $this->group_subject->getOtherGroups();
    }

    public function srch(){
        $this->dispatch('search', $this->search);
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
            unlink($this->file);
        }
        File::create([
            'name' => $this->assName,
            'grade' => value($this->grade), // 'grade' => '12',
            'due_date' => $this->date,
            'start_date' => now(), // 'start_date' => '2021-09-01 00:00:00',
            'description' => $this->description,
            'file' => $file,
            'type' => 'assignment',
            'subject_id' => $this->group_subject->id,
            'user_id' => auth()->user()->id,
        ]);

        $this->reset(['assName','grade','date','file','description']);
        $this->dispatch('closeModal');


    }

    public function render()
    {
        return view('livewire.components.nav.academic.subject.assignments');
    }
}
