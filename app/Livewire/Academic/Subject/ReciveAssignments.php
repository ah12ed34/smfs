<?php

namespace App\Livewire\Academic\Subject;

use App\Models\Delivery;
use Livewire\Component;
use App\Models\GroupSubject;
use App\Tools\ToolsApp;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Ramsey\Uuid\Type\Decimal;

class ReciveAssignments extends Component
{
    use WithPagination;
    public $group_subject;
    public $id;
    public $perPage = 10;
    public $tabActive= null ;
    public $search = '';
    public $assignment_grade = 0;
    public $storedBy = null;
    public $storedByColumn = null;
    public $group_id;
    public $subject_id;
    public $grade = [] ;
    public $detail = null ;
    public $commentD = null ;
    public $gradeD = null ;
    // protected $queryString = ['search'];
    public function mount($subject_id, $group_id,$id)
    {
        $this->group_subject = GroupSubject::where('group_id', $group_id)
            ->where('subject_id', $subject_id)
            ->first();
        $this->group_id = $group_id;
        $this->subject_id = $subject_id;
        $this->id = $id;
        if(request()->has('tab'))
            $this->tabActive = request('tab');

    }

    public function updatedGrade(){
        if($this->grade != null)
        {
            foreach($this->grade as $key => $value)
            {
                if($value != null || $value != ''){
                    // ->decimal('grade', 3, 2)->nullable();
                    $validGrade = min($value, $this->assignment_grade);
                    $validGrade = max($validGrade, 0); // Ensure the grade is not negative
                    Delivery::where('id', $key)->update(['grade' => $validGrade]);

                }
            }
            $this->grade = [];
        }
    }

    public function selected($id)
    {
        $detail = $this->reciveAssignments->where('id',$id)->first();
        $this->gradeD = $detail->grade;
        $this->commentD = $detail->comment;
        $this->detail['id'] = $id;
        $this->detail['name'] = $detail->nameAssignment;
        $this->detail['student'] = $detail->student;
        $this->detail['status'] = $detail->status;
        $this->detail['status_code'] = $detail->status_code;
        $this->detail['grade'] = $detail->assignment_grade;
        $this->detail['delivery_date'] = $detail->delivery_date;
        $this->detail['user_id'] = $detail->user_id;
        $this->detail['file'] = $detail->file;
        $this->detail['file2'] = $detail->file2;

        // if any error in validation will be reset
        $this->resetErrorBag();

    }
    public function updatedTabActive()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    #[On('search')]
    public function srch($v)
    {
        $this->search = $v;
        $this->resetPage();
        // dd($v);
        // $this->resetPage();
    }

    public function download($id, $file=null){
        $recive = $this->reciveAssignments->where('id',$id)->first();
        return ToolsApp::downloadFile($id,$recive->nameAssignment .'-'.$recive->student,'delivery',$file??'file');
    }

    public function sortBy($column)
    {
        if($this->storedByColumn == $column)
        {
            $this->storedBy = $this->storedBy == 'asc' ? 'desc' : 'asc';
        }
        else
        {
            $this->storedBy = 'asc';
        }
        $this->storedByColumn = $column;
    }

    public function correction(){
        $this->validate([
            'gradeD' => 'required|numeric|min:0|max:'.$this->assignment_grade,
            'commentD' => 'nullable|string|max:255',
        ],[],[
            'gradeD' => 'الدرجة',
            'commentD' => 'التعليق',
        ]);
        Delivery::where('id', $this->detail['id'])->update(['grade' => $this->gradeD, 'comment' => $this->commentD]);
        $this->detail = null;

        $this->dispatch('closeModal');
    }
    public function getReciveAssignmentsProperty()
    {
        $assignmentsR = $this->group_subject->GroupFiles()->where('id', $this->id)
            ->first();
            $this->assignment_grade = $assignmentsR->grade;
        $assignmentsR =  $assignmentsR->deliverys
        ->map(function ($delivery) {
                $delivery->nameAssignment = $delivery->groupFile->file->name;
                $delivery->student = $delivery->groupStudent->student->name;
                $delivery->assignment_grade = $delivery->groupFile->grade;
                $delivery->user_id = $delivery->groupStudent->student->user_id;
                // status of delivery مبكر او تأخير
                if($delivery->groupFile->due_date < $delivery->delivery_date){

                    if($this->tabActive == 'early')
                        return null;
                    $delivery->status = 'تأخير';
                    $delivery->status_code = 2;
                }
                else{
                    if($this->tabActive == 'late')
                        return null;
                    $delivery->status = 'في الموعد';
                    $delivery->status_code = 1;
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
                        $student->student = $student->user->student->name;
                        $student->user_id = $student->user->id;
                        $student->status = 'لم يسلم';
                        $student->grade = 0;
                        return $student;
                    }
                    return null;
                })->filter();
            }

            if ($this->search) {
                $assignmentsR = $assignmentsR->filter(function ($item) {
                    return false !== stripos($item->student, $this->search) ||
                           false !== stripos($item->user_id, $this->search);
                });
            }

            if($this->storedByColumn != null){
                $assignmentsR = $assignmentsR->sortBy($this->storedByColumn, SORT_REGULAR, $this->storedBy == 'asc' ? false : true);
            }



        return ToolsApp::convertToPagination($assignmentsR, $this->perPage);
    }
    public function render()
    {
        return view('livewire.academic.subject.recive-assignments',['deliverys'=>$this->reciveAssignments]);
    }
}
