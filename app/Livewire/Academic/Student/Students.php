<?php

namespace App\Livewire\Academic\Student;

use App\Models\GroupSubject;
use App\Repositories\EmployeesRepository;
use App\Traits\Searchable;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Illuminate\Support\Collection;

class Students extends Component
{
    use Searchable;
    public $group_subject;
    public $search;
    public $student_selected ;
    // public $total = [];
    // public $persents = [];
    // public $final_exem = [];
    // public $helf_exem = [];
    // public $addional_grades = [];

    protected $AcademicR;
    public function __construct()
    {
        $this->AcademicR = new EmployeesRepository();
    }
    public function mount(GroupSubject $group_subject)
    {
        if($group_subject->teacher_id != auth()->user()->academic->user_id)
            abort(403);
        $this->group_subject = $group_subject;
        // $this->getPageData();
        $this->sortField = 'user_id';


    }

    public function updatingPage($page)
    {
        // $this->getPageData($page);
    }

public function getData($user_id,$returnData)
{
    if(!$user_id) return 0;
    $id = $this->group_subject->students()->where('user_id',$user_id)
    ->first()->pivot->id;
    // dd($id);
    $studying = null ;
    if($this->group_subject->studying){
        // dd($this->group_subject->studying);
        $studying = $this->group_subject->studying->where('student_id', $id)
        // ->where('subject_id', $this->group_subject->id)
        ->first();
    }
    if(!$studying) return 0;
    switch($returnData){
        case 'total':
            $x = 0;
            for ($i = 1; $i < 16; $i++) {
                switch ($studying->{'persents' . $i}) {
                    case 'present':
                    case 'permit':
                        $x++;
                        break;
                    case 'late':
                        $x += 0.5;
                        break;
                }
            }
            return $x + ($studying->addional_grades ?? 0) + ($studying->helf_exem ?? 0) + ($studying->final_exem ?? 0);
        case 'persents':
            $x = 0;
            for ($i = 1; $i < 16; $i++) {
                switch ($studying->{'persents' . $i}) {
                    case 'present':
                    case 'permit':
                        $x++;
                        break;
                    case 'late':
                        $x += 0.5;
                        break;
                }
            }
            return $x;
            case 'final_exem':
                return $studying->final_exem ?? 'لم يتم رصد البيانات';
            case 'helf_exem':
                return $studying->helf_exem ?? 'لم يتم رصد البيانات';
            case 'addional_grades':
                return $studying->addional_grades ?? 0;
    }
}

    public function select($id)
    {
        $this->student_selected = $this->group_subject->students()->where('user_id',$id)->first();
    }

    public function getStudentsProperty()
    {
        // dd($this->group_subject->students);
        // $students = $this->group_subject->getStudentsInGroupBySubject($this->search)
        //     ->paginate($this->perPage);
        // dd($this->AcademicR->getStudentsInGroupBySubject($this->group_subject)->paginate($this->perPage));
        $students = $this->AcademicR->getStudentsInGroupBySubject($this->group_subject)
            ->whereHas('user', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')->
                orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%')
                ->orWhere('id', 'like', '%' . $this->search . '%');
            })
            //sortField
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->get()->map(function($student) {
                $student->totle_grades = $student->helf_grade + $student->delivery_grade + $student->addional_grades + $student->persents + $student->work_grade+$student->group_grade ;
                if($student->totle_grades > 100)
                    $student->totle_grades = 100;
                else if($student->totle_grades < 0)
                    $student->totle_grades = 0;
                $student->Appreciation = $this->Appreciation($student->totle_grades);
                return $student;
            })
            ->paginate($this->perPage);
        // $students = $students->map(function($student) {
        //     $student->studying = $this->group_subject->studying->where('student_id', $student->pivot->id)
        //     ->first();
        //     return $student;
        // });
// dd($students);
        return $students;
    }

    public function Appreciation($total)
    {
        if($total >= 90)
            return 'ممتاز';
        if($total >= 80)
            return 'جيد جدا';
        if($total >= 70)
            return 'جيد';
        if($total >= 60)
            return 'مقبول';
        return 'راسب';
    }

    public function render()
    {
        return view('livewire.academic.student.students', [
            'students' => $this->students
        ]);
    }
}
