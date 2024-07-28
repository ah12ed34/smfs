<?php

namespace App\Livewire\Academic\Student;

use App\Models\Delivery;
use App\Models\Group;
use App\Models\GroupSubject;
use App\Traits\Academic\studentAT;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
class AssignmentsgrdesStu extends Component
{
    use WithPagination,studentAT;
    public $group_subject;
    public $search;
    public $perPage = 10;
    public $columnsName=[];
    public function mount(GroupSubject $group_subject)
    {
        $group_subject->getFilesInGroupBySubject('assignment',null)->where('is_active',1)->get()
        ->each(function($item){
            $this->columnsName[] = [
                'name' => 'تكليف ('. sizeof($this->columnsName)+1 .')',
            ];
        });
        // dd($this->columnsName);
    }

    #[On('search')]
    public function search($v){
        $this->search = $v;
    }

    public function getStudentsProperty()
    {
        $students = $this->getStudents($this->group_subject);

        $students = $students->get()->transform(function($item){
            $item->grade = 0;
            $item->count_deliveries = 0;
            $item->count_not_deliveries = 0;
            $item->assignments = $this->group_subject->getFilesInGroupBySubject('assignment',null)->where('is_active',1)->get()
            ->map(function($assignment) use ($item){
                $assignment->delivery = Delivery::where('student_group_id',$item->pivot->id)
                    ->where('file_id',$assignment->group_file->id)->first();
                if($assignment->delivery){
                    $item->grade += $assignment->delivery->grade;
                    $item->count_deliveries++;
                }else{
                    $item->count_not_deliveries++;
                    $assignment->delivery = new Delivery(['grade'=>'لم يتم التسليم']);
                }
                    return $assignment;
            });
            return $item;
        });
        return $students->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.academic.student.assignmentsgrdes-stu', [
            'students' => $this->students
        ]);
    }
}
