<?php

namespace App\Livewire\Student\StudStudyingBooks;

use Livewire\Component;
use App\Models\GroupSubject;
use App\Traits\Searchable;
use Livewire\WithFileUploads;
use App\Tools\MyApp;

class FormQuiz extends Component
{
    use Searchable,WithFileUploads;
    public $group_subject;
    public $active = 'forms';
    public $subject_name = '';
    public $nameFile;
    public $file;


    public function mount($id)
    {
        $this->group_subject = GroupSubject::where('id', $id)
            ->firstOrFail();
        $this->group_subject->students()->where('user_id', auth()->id())
            ->firstOrFail();
        if(request()->has('summaries')){
            $this->active = 'summaries';
        }
        $this->subject_name = $this->group_subject->subject()->first()->name_ar;
        $this->perPage =myapp::perPageLists;
        $this->search = '';
    }

    public function addFOS(){
        $this->validate([
            'nameFile' => 'required|string|max:191',
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);
        $this->group_subject->GroupFiles()->create([
            'file_id' => $this->group_subject->files()->create([
                'name' => $this->nameFile,
                'file' => $this->file->store($this->active == 'summaries' ? 'subject/summaries':'subject/form_exem'),
                'user_id' => auth()->id(),
                'type' => $this->active == 'summaries' ? 'summary':'form_exem',
            ])->id,
            'user_id' => auth()->id(),
        ]);

        $this->resetForm();
        $this->dispatch('closeModal');
    }

    public function resetForm()
    {
        if($this->file){
            unlink($this->file->getRealPath());
        }
        $this->reset('nameFile', 'file');
    }
    public function getFormsProperty()
    {
        $forms = $this->group_subject->files()->where('type', $this->active == 'summaries' ? 'summary':'form_exem')
            ->where('name', 'like', '%'.$this->search.'%')
            ->paginate($this->perPage);
        return $forms;
    }

    // public function srch()
    // {
    //     dd($this->search);
    //     $this->resetPage();
    // }
    public function render()
    {
        return view('livewire.student.stud-studying-books.form-quiz', [
            'forms' => $this->forms,
        ]);
    }
}
