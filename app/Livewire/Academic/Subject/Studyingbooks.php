<?php

namespace App\Livewire\Academic\Subject;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\GroupSubject;
use Livewire\WithFileUploads;
class Studyingbooks extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $group_subject;
    public $search;
    public $perPage = 10;
    public $nameFile;
    public $file;
    public $thisFile;
    public $file2;


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

    public function selected($id){
        $this->thisFile = $this->group_subject->files()->find($id);
        $this->nameFile = $this->thisFile->name;
    }
    public function editBook(){
        $this->validate([
            'nameFile' => 'required',
            'file' => 'nullable|file|mimes:pdf,doc,docx,zip,png,jpg,jpeg,txt',
        ]);
        $file = null;
        if($this->file != null){
            $file = $this->file->store('subjects/assignments');
            unlink($this->file->getRealPath());
        }
        $this->thisFile->update([
            'name' => $this->nameFile,
            'file' => $file,
        ]);
        $this->file = null;
        $this->nameFile = null;
        $this->thisFile = null;

        $this->dispatch('refresh');
    }

    public function updatedFile2(){
        $this->validate([
            'file2' => 'required|file|mimes:pdf,doc,docx,zip,png,jpg,jpeg,txt,pptx,ppt',
        ]);
        $file = null;
        if($this->file2 != null){
            $file = $this->file2->store('subject/assignments');
            unlink($this->file2->getRealPath());
        }
        $this->thisFile->update([
            'file2' => $file,
        ]);

        $this->file2 = null;
        $this->thisFile = null;
        $this->dispatch('refresh');

    }

    public function deleteBook(){
        if($this->thisFile->group_files->count() > 1){
            $this->thisFile->group_files->delete();
        }else{
            $this->thisFile->group_file->delete();
            $this->thisFile->delete();
        }
        $this->thisFile = null;
        $this->dispatch('refresh');
    }
    public function render()
    {
        return view('livewire.academic.subject.studyingbooks'

        , [
            'studyingbooks' => $this->studyingbooks
        ]);
    }
}
