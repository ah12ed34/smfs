<?php

namespace App\Livewire\Components\Nav\Academic\Subject;

use App\Traits\Searching;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
class NavStudyingBooks extends Component
{
    use WithFileUploads ,Searching;
    public $group_subject;
    public $search;
    public $file;
    public $nameFile;
    public $active = 'studyingbooks';

    public function mount($group_subject)
    {
        $this->group_subject = $group_subject;
        // dd($this->group_subject);
    }

    public function addFile(){
        $this->validate([
            'file' => 'required|mimes:pdf,docx,doc,pptx,ppt',
            'nameFile' => 'required|string'
        ]);
        $file = null ;
        try{
            $filePath = (in_array($this->active,[
                'studyingbooks',
                'studyingbooks_practical'
            ])) ?'subject/books': 'subject/form_exem';
        $file = $this->file->store($filePath);
        unlink($this->file->getRealPath());
        $this->group_subject->GroupFiles()->create([
            'file_id' => $this->group_subject->files()->create([
                'name' => $this->nameFile,
                'file' => $file,
                'user_id' => auth()->id(),
                'type' => (in_array($this->active,[
                    'studyingbooks',
                    'studyingbooks_practical'
                ])) ? 'chapter' : 'form_exem',
            ])->id,
            'user_id' => auth()->id(),
        ]);

        // $this->group_subject->files()->
        // create([
        //     'name' => $this->nameFile,
        //     'file' => $file,
        //     'user_id' => auth()->id(),
        //     'type' => 'chapter',
        // ]);


        $this->file = null;
        $this->nameFile = null;

        $this->dispatch('closeModal');
        }catch(\Exception $e){
            $this->dispatch('swal:modal', [
                'title' => 'Error',
                'text' => 'Error al subir el archivo',
                'icon' => 'error'
            ]);
            if($file&&Storage::exists($file)){
                Storage::delete($file);
            }
            if($this->file&&Storage::exists($this->file->getRealPath())){
                unlink($this->file->getRealPath());
            }

        }
    }

    public function render()
    {
        return view('livewire.components.nav.academic.subject.nav-studying-books');
    }
}
