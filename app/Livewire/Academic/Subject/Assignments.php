<?php

namespace App\Livewire\Academic\Subject;

use Livewire\Component;
use App\Models\GroupSubject;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class Assignments extends Component
{
    use WithPagination;
    public $group_subject;
    public $search;
    public $perPage = 10;
    public $selected_id = null;
    public $message_confirmation = null;
    public $assName;
    public $description;
    public $due_date;
    public $file;
    public $grade;

    #[On('search')]
    public function search($v){
        $this->search = $v;
    }

    public function mount($subject_id,$group_id)
    {
        $this->group_subject = GroupSubject::where('subject_id',$subject_id)->where('group_id',$group_id)->first();
    }

    public function getAssignmentsProperty()
    {
        return $this->group_subject->getFilesInGroupBySubject('assignment',$this->search)
        ->paginate($this->perPage);
    }

    public function selected($id)
    {
        $this->selected_id = $id;
        if($this->assignments->where('id',$id)->first()->group_file->is_active == 1){
            $this->message_confirmation = __('general.assignment_deactivation_confirmation');
        }else{
            $this->message_confirmation = __('general.assignment_activation_confirmation');
        }
    }

    public function stopAssignment(){
        $assignment = $this->assignments->where('id',$this->selected_id)->first();
        $assignment->group_file->is_active = !$assignment->group_file->is_active;
        $assignment->group_file->save();
        $this->selected_id = null;
        $this->message_confirmation = null;
        $this->dispatch('closeModal');
    }

    public function editAssignment($id){
        $this->selected_id = $id;
        $assignment = $this->assignments->where('id',$this->selected_id)->first();
        $this->assName = $assignment->name;
        $this->description = $assignment->description;
        $this->due_date = $assignment->group_file->due_date;
        $this->file = $assignment->file;
        $this->grade = $assignment->group_file->grade;
        // $this->dispatch('openModal');
    }

    public function editAssignmentSave(){
        $this->validate([
            'assName' => 'required',
            'grade' => 'required',
            'due_date' => 'required',
            'file' => ($this->description == null) ? 'required' : 'nullable' .'|file|mimes:pdf,doc,docx,zip,png,jpg,jpeg,txt',
            'description' => ($this->file == null) ? 'required' : 'nullable',
        ]);
        $assignment = $this->assignments->where('id',$this->selected_id)->first();
        $file = $assignment->file;
        if($this->file != null){
            $file = $this->file->store('subjects/assignments');
            unlink($this->file);
        }
        $assignment->name = $this->assName;
        $assignment->group_file->grade = $this->grade;
        $assignment->group_file->due_date = $this->due_date;
        $assignment->description = $this->description;
        $assignment->file = $file;
        $assignment->group_file->save();
        $assignment->save();
        $this->reset(['assName','grade','due_date','file','description']);
        $this->dispatch('closeModal');
    }

    public function download($id){
        $assignment = $this->assignments->where('id',$id)->first();
        return Storage::download($assignment->file,$assignment->name);
    }


    public function render()
    {
        return view('livewire.academic.subject.assignments', [
            'assignments' => $this->assignments
        ]);
    }
}
