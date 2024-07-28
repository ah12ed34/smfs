<?php

namespace App\Livewire\Academic\Subject;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\GroupSubject;
use App\Traits\Searchable;
use Livewire\WithFileUploads;
class Studyingbooks extends Component
{
    use Searchable;
    use WithFileUploads;
    public $group_subject;
    public $nameFile;
    public $file;
    public $thisFile;
    public $file2;
    public $active = 'studyingbooks';


    public function mount(GroupSubject $group_subject )
    {
        $this->group_subject = $group_subject;
        if($this->group_subject->teacher_id != auth()->id()){
            abort(403);
        }
        if($this->group_subject->is_practical||request()->has('practical')){
            $this->active = 'studyingbooks_practical';
        // }elseif(request()->has('practical')){
            // $this->active = 'studyingbooks_practical';
        }

        // dd($this->group_subject);
    }

    // #[On('search')]
    // public function search($v){
    //     $this->search = $v;
    // }

    public function getStudyingbooksProperty()
    {
        if($this->active == 'studyingbooks'||$this->group_subject->IsPractical()){
            $studying = $this->group_subject->
            files()->where('type', 'chapter')->
            where('name', 'like', '%'.$this->search.'%')
            ->
            whereHas('group_files', function($q){
                $q->where('user_id', auth()->id());
            })
            ->paginate($this->perPage);
            return $studying;
        }elseif($this->group_subject->HasPractical()){
            $studying = GroupSubject::where('subject_id', $this->group_subject->subject_id)
            ->where('is_practical', true)->
            where('ay_id', $this->group_subject->ay_id)
            ->get()
            ->map(function($group){
                return $group->files()->where('type', 'chapter')
                ->where('name', 'like', '%'.$this->search.'%')
                ->get();
            })->flatten()->paginate($this->perPage);
            return $studying;
        }
        // return $studying;
    }

    public function selected($id){
        // if($this->group_subject->IsPractical()){
        //     $this->thisFile = $this->group_subject->files()->find($id);
        if($this->group_subject->HasPractical()&&$this->active == 'studyingbooks_practical'){
            $this->thisFile = GroupSubject::where('subject_id', $this->group_subject->subject_id)
            ->where('is_practical', true)->
            where('ay_id', $this->group_subject->ay_id)
            ->get()
            ->map(function($group) use($id){
                return $group->files()->find($id);
            })->flatten()->first();
        }else{
        $this->thisFile = $this->group_subject->files()->find($id);
        }
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
