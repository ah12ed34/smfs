<?php

namespace App\Livewire\Academic\Student;

use App\Models\Delivery;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
class AssignmentsgrdesStu extends Component
{
    use WithPagination;
    public $group_subject;
    public $search;
    public $perPage = 10;
    public $columnsName=[];
    public function mount($group_subject)
    {
        $this->group_subject = $group_subject;
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
        $students = $this->group_subject->getStudentsInGroupBySubject($this->search)

        ->paginate($this->perPage);

        $students->getCollection()->transform(function($item){
            $item->grade = 0;
            $item->count_deliveries = 0;
            $item->count_not_deliveries = 0;
            $item->assignments = $this->group_subject->getFilesInGroupBySubject('assignment',null)->where('is_active',1)->get()
            ->map(function($assignment) use ($item){
                // dd();
                $assignment->delivery = Delivery::where('student_group_id',$item->pivot->id)
                    ->where('file_id',$assignment->group_file->id)->first();
                if($assignment->delivery){
                    // dd($assignment->delivery->grade);
                    $item->grade += $assignment->delivery->grade;
                    $item->count_deliveries++;
                }else
                    $item->count_not_deliveries++;
                    return $assignment;
            });
            return $item;
        });
        // dd($students);
        return $students;
    }

    public function render()
    {
        return view('livewire.academic.student.assignmentsgrdes-stu', [
            'students' => $this->students
        ]);
    }
}
