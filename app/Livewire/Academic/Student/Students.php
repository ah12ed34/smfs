<?php

namespace App\Livewire\Academic\Student;

use App\Models\GroupStudents;
use App\Models\GroupSubject;
use App\Models\Studying;
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
    public $helf_exem;
    public $working;
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

// public function getData($user_id,$returnData)
// {
//     if(!$user_id) return 0;
//     $id = $this->group_subject->students()->where('user_id',$user_id)
//     ->first()->pivot->id;
//     // dd($id);
//     $studying = null ;
//     if($this->group_subject->studying){
//         // dd($this->group_subject->studying);
//         $studying = $this->group_subject->studying->where('student_id', $id)
//         // ->where('subject_id', $this->group_subject->id)
//         ->first();
//     }
//     if(!$studying) return 0;
//     switch($returnData){
//         case 'total':
//             $x = 0;
//             for ($i = 1; $i < 16; $i++) {
//                 switch ($studying->{'persents' . $i}) {
//                     case 'present':
//                     case 'permit':
//                         $x++;
//                         break;
//                     case 'late':
//                         $x += 0.5;
//                         break;
//                 }
//             }
//             return $x + ($studying->addional_grades ?? 0) + ($studying->helf_exem ?? 0) + ($studying->final_exem ?? 0);
//         case 'persents':
//             $x = 0;
//             for ($i = 1; $i < 16; $i++) {
//                 switch ($studying->{'persents' . $i}) {
//                     case 'present':
//                     case 'permit':
//                         $x++;
//                         break;
//                     case 'late':
//                         $x += 0.5;
//                         break;
//                 }
//             }
//             return $x;
//             case 'final_exem':
//                 return $studying->final_exem ?? 'لم يتم رصد البيانات';
//             case 'helf_exem':
//                 return $studying->helf_exem ?? 'لم يتم رصد البيانات';
//             case 'addional_grades':
//                 return $studying->addional_grades ?? 0;
//     }
// }

    public function select($id)
    {
        $this->student_selected = $this->students->where('user_id',$id)->first();
        $this->helf_exem = $this->student_selected->helf_grade;
        $this->working = $this->student_selected->addional_grades;
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
                $student->theory_total_grade = $student->delivery_grade + $student->work_grade + $student->group_grade + $student->helf_grade + $student->final_grade + $student->addional_grades + $student->persents;
                $student->practical_total_grade = $student->practical_delivery_grade + $student->practical_work_grade + $student->practical_group_grade + $student->practical_helf_grade + $student->practical_final_grade + $student->practical_addional_grades + $student->practical_persents;
                $student->theory_total_grade = $student->theory_total_grade > 100 ? 100 : $student->theory_total_grade;
                $student->practical_total_grade = $student->practical_total_grade > 100 ? 100 : $student->practical_total_grade;
                $student->total_grade = (((($student->practical_grade??100) / 100) * $student->practical_total_grade)
                + (((100 - ($student->practical_grade??0)) / 100) * $student->theory_total_grade))
                ;
                $student->Appreciation = $this->Appreciation($student->total_grade);
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

    public function save()
    {
        $this->validate([
            'helf_exem' => 'required|numeric|min:0',
            'working' => 'required|numeric|min:0',
        ]);
        // dd($this->student_selected, $this->helf_exem, $this->working);
        // create or update
        if($this->helf_exem + $this->working +
        ($this->student_selected->theory_total_grade ?? $this->student_selected->total_grade
        - $this->student_selected->helf_grade - $this->student_selected->addional_grades)
        > 100
        ){
            $this->addError('working', 'الدرجات المضافة والنصف الاخير لا يجب ان تتعدى 100');
            return;
        
        }
        Studying::updateOrCreate([
            'student_id' => GroupStudents::where('student_id', $this->student_selected->user_id)
            ->where('group_id', $this->group_subject->group_id)
            ->where('ay_id', $this->group_subject->ay_id)
            ->first()->id,
            'subject_id' => $this->group_subject->id
        ], [
            'helf_exem' => $this->helf_exem,
            'addional_grades' => $this->working
        ]);


        // $this->group_subject->studying->where('student_id', )
        // ->first()->update([
        //     'helf_exem' => $this->helf_exem,
        //     'addional_grades' => $this->working
        // ]);
        $this->dispatch('closeModal');
    }

    public function Appreciation($total)
    {
        if($total >= 90)
            return 'ممتاز';
        if($total >= 80)
            return 'جيد جدا';
        if($total >= 70)
            return 'جيد';
        if($total >= 50)
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
