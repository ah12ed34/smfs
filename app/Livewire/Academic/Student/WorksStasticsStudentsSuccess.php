<?php

namespace App\Livewire\Academic\Student;

use App\Models\GroupSubject;
use Livewire\Component;
use App\Traits\Academic\studentAT;

class WorksStasticsStudentsSuccess extends Component
{
    use studentAT;
    public $group_subject;
    public $stastistics;
    public function mount(GroupSubject $group_subject,$s){
        $this->initializeStudentAT();
        $this->group_subject = $group_subject;
        $this->stastistics = in_array($s, ['success','fail']) ? $s : 'success';
    }
    public function getStudentsProperty(){
        $student = $this->getStudents($this->group_subject)
        ->get()->map(function($student) {
            $student->theory_total_grade = $student->delivery_grade + $student->work_grade + $student->group_grade + $student->helf_grade + $student->final_grade + $student->addional_grades + $student->persents;
            $student->practical_total_grade = $student->practical_delivery_grade + $student->practical_work_grade + $student->practical_group_grade + $student->practical_helf_grade + $student->practical_final_grade + $student->practical_addional_grades + $student->practical_persents;
            $student->theory_total_grade = $student->theory_total_grade > 100 ? 100 : $student->theory_total_grade;
            $student->practical_total_grade = $student->practical_total_grade > 100 ? 100 : $student->practical_total_grade;
            $student->total_grade = (((($student->practical_grade??100) / 100) * $student->practical_total_grade)
            + (((100 - ($student->practical_grade??0)) / 100) * $student->theory_total_grade))
            ;
            $student->Appreciation = $this->Appreciation($student->total_grade);
            return $student;
        })->filter(function($student){
            return $this->stastistics == 'success' ? $student->total_grade >= 50 : $student->total_grade < 50;
        })

        ->paginate($this->perPage);
        // dd($student);
        return $student;
    }
    public function Appreciation($grade){

        if($grade >= 50){
            return 'ناجح';

        }else{
            return 'راسب';
        }
    }
    public function render()
    {
        return view('livewire.academic.student.works-stastics-students-success'
        ,[
            'students' => $this->students
        ]);
    }
}
