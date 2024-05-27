<?php

namespace App\Livewire\Academic\Subject;

use Livewire\Component;
use App\Models\GroupSubject;
use App\Tools\ToolsApp;
use Livewire\WithPagination;

class ReciveAssignments extends Component
{
    use WithPagination;
    public $group_subject;
    public $id;
    public $perPage = 10;
    public $tabActive= null ;
    public function mount($subject_id, $group_id,$id)
    {
        $this->group_subject = GroupSubject::where('group_id', $group_id)
            ->where('subject_id', $subject_id)
            ->first();
        $this->id = $id;
        if(request()->has('tab'))
            $this->tabActive = request('tab');

    }

    public function download($id){
        $recive = $this->reciveAssignments->where('id',$id)->first();
        return ToolsApp::downloadFile($id,$recive->nameAssignment .'-'.$recive->student,'delivery','file');
    }

    public function getReciveAssignmentsProperty()
    {
        $assignmentsR = $this->group_subject->GroupFiles()->where('id', $this->id)
            ->first()->deliverys->map(function ($delivery) {
                $delivery->nameAssignment = $delivery->groupFile->file->name;
                $delivery->student = $delivery->groupStudent->student->name;
                // status of delivery مبكر او تأخير
                if($delivery->groupFile->due_date < $delivery->delivery_date){
                    // if($delivery->groupFile->due_date->diffInDays($delivery->delivery_date) > 1)
                    //     $delivery->status = 'مبكر';
                    // else
                    if($this->tabActive == 'early')
                        return null;
                    $delivery->status = 'تأخير';
                }
                else{
                    if($this->tabActive == 'late')
                        return null;
                    $delivery->status = 'في الموعد';
                }

                // $delivery->status = $delivery->groupFile->due_date < $delivery->delivery_date ? 'تأخير' : 'في الموعد';
                return $delivery;
            })->filter();
            if($this->tabActive=='not_delivered')
            {
                $assignmentsR = $this->group_subject->students->map(function ($student) use ($assignmentsR) {
                    // dd();
                    if($assignmentsR->where('student_group_id',$student->pivot->id)->count() == 0)
                    {
                        $student->nameAssignment = 'لم يسلم';
                        $student->student = $student->user->name;
                        $student->status = 'لم يسلم';
                        $student->grade = 0;
                        return $student;
                    }
                    return null;
                })->filter();
            }
        return ToolsApp::convertToPagination($assignmentsR, $this->perPage);
    }
    public function render()
    {
        return view('livewire.academic.subject.recive-assignments',['deliverys'=>$this->reciveAssignments]);
    }
}
