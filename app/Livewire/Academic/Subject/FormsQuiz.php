<?php

namespace App\Livewire\Academic\Subject;

use App\Models\File;
use Livewire\Component;
use App\Models\GroupSubject;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;


class FormsQuiz extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $group_subject;
    public $search;
    public $perPage = 10;
    public $selected_id = null;
    public $nameFile;
    public $file;

    public function mount($group_id, $subject_id)
    {
        $this->group_subject = GroupSubject::where('group_id', $group_id)
            ->where('subject_id', $subject_id)
            ->first();
    }

    public function selected($id)
    {
        $this->selected_id = $id;
        $this->nameFile = $this->group_subject->files()->find($id)->name;
    }

    public function deleteQuiz()
    {
        $quiz = File::find($this->selected_id);
        if ($quiz->group_files->count() > 1){
            $quiz->group_files->delete();
        }else{
            $quiz->group_file->delete();
            $quiz->delete();
        }
        $this->selected_id = null;
        $this->dispatch('closeModal');
    }

    public function editQuiz(){
        $this->validate([
            'nameFile' => 'required',
            'file' => 'nullable|file|mimes:pdf,doc,docx,zip,png,jpg,jpeg,txt,pptx,ppt',
        ]);
        $file = null;
        try{
            if($this->file != null){
                $file = $this->file->store('subject/summaries');
                unlink($this->file->getRealPath());
            }
            $this->group_subject->files()->find($this->selected_id)->update([
                'name' => $this->nameFile,
                'file' => $file ?? $this->group_subject->files()->find($this->selected_id)->file,
            ]);
            $this->file = null;
            $this->nameFile = null;
            $this->selected_id = null;
            $this->dispatch('closeModal');
        }catch(\Exception $e){
            $this->dispatch('swal:modal', [
                'title' => 'Error',
                'text' => 'Error al subir el archivo',
                'icon' => 'error'
            ]);
            if($this->file&&Storage::exists($this->file->getRealPath())){
                unlink($this->file->getRealPath());
            }
            if($file&&Storage::exists($file)){
                Storage::delete($file);
            }
        }
    }
    public function getQuizzesProperty()
    {
        return $this->group_subject
            ->getFilesInGroupBySubject('summary', $this->search)
            ->paginate($this->perPage);
    }
    public function render()
    {
        return view('livewire.academic.subject.forms-quiz'
            , [
                'quizzes' => $this->quizzes
            ]);
    }
}
