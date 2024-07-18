<?php

namespace App\Traits;

use App\Models\Level;
use App\Repositories\SubjectsRepository;
use App\Repositories\EmployeesRepository;
use Illuminate\Database\Eloquent\Collection;

trait LevelTraits{
    use Tools;
    protected $subjectsR;
    Protected $EmployeesR;
    public $level;

    public function initializeLevel(){
        $this->subjectsR = new SubjectsRepository();
        $this->EmployeesR = new EmployeesRepository();
    }
    public function getLevels($student){
        if(empty($student)){
            $student = auth()->user()->student;
        }
        $levels = $this->SubjectsR->getLevelsStudent($student);
        $array = [];
        if(is_array($levels)&& count($levels)>0){

            foreach($levels as $value){
                    if(is_array($value['term'])){
                        foreach($value['term'] as $v){
                            $array[] = ['id'=>$value['gs']->id,'term'=>$v,
                            'name'=>$value['gs']->group->name.' '.$value['gs']->group->level->name.' '.$v];
                        }
                    }
            }
        }
        return $array;
    }

    public function getTeramByLevel(Level $level){
        $terms = $level->subjectLevels()->max('semester');
        $collect = collect();
        // $collect->where('id',1)->first()->name;
        for($i = 1; $i <= $terms; $i++){
            $collect->push((object)['id'=>$i,'name'=>'الترم '.$this->numberToOrdinal($i)]);
        }
        // dd( $collect->where('id',1)->first()->name);
        return $collect;
    }

    public function getStudentsByLevelGroupTerm($subjects,$term,$groups,$group_id = null){
       if($subjects->count() == 0){
           return new Collection();
         }
        $students = new Collection();

        $subjects->each(function ($subject) use ($term, $groups, $group_id, &$students) {

            $subject->groupSubjects()->each(function ($groupSubject) use ($term, $groups, $group_id, $subject, &$students) {
                $group_ids = $groups->when($group_id, function ($query) use ($group_id) {
                    return $query->where('id', $group_id);
                })->pluck('id');

                $this->EmployeesR->getStudentsInGroupBySubject($groupSubject)
                    ->whereIn('group_students.group_id', $group_ids)
                    ->where('subjects_levels.semester', $term)
                    ->each(function ($student) use ($subject, $groupSubject, &$students) {
                        $subject->theory_total_grade = min(100, $student->delivery_grade + $student->work_grade + $student->group_grade + $student->helf_grade + $student->final_grade + $student->addional_grades + $student->persents);
                        $subject->practical_total_grade = min(100, $student->practical_delivery_grade + $student->practical_work_grade + $student->practical_group_grade + $student->practical_helf_grade + $student->practical_final_grade + $student->practical_addional_grades + $student->practical_persents);
                        $subject->total_grade = (($student->practical_grade ?? 100) / 100) * $subject->practical_total_grade
                            + ((100 - ($student->practical_grade ?? 0)) / 100) * $subject->theory_total_grade;
                        $subject->group = $groupSubject->group->name;
                        $subject->count_deliveries = $student->count_deliveries + $student->practical_count_deliveries;
                        $subject->count_groups = $student->count_groups + $student->practical_count_groups;

                        $subject->practicalGroupProject = $student->practical_group_project_id;

                        if(!isset($subject->groupProject)){
                            $subject->groupProject = new Collection();
                        }
                        if(!$subject->groupProject->contains('id', $student->group_project_id)&&$student->group_project_id){
                            $subject->groupProject->push(['id' => $student->group_project_id]);
                        }
                        if(!$subject->groupProject->contains('id', $student->practical_group_project_id)&&$student->practical_group_project_id){
                            $subject->groupProject->push(['id' => $student->practical_group_project_id]);
                        }
                        // $subject->groupProject->push(
                        //     $student->group_project_id,
                        //     $student->practical_group_project_id
                        // );
                        // التأكد من أن الموضوعات هي مجموعة
                        if (!isset($student->subjectCollection)) {
                            $student->subjectCollection = new Collection();
                        }


                        // إضافة الموضوع الحالي إلى المجموعة
                        $student->subjectCollection->push($subject);
                        // if($student->where('pivot.group_id',$groupSubject->group_id)->count() == 0){
                        //     $students->push($student);
                        // }

                        $existingStudent = $students->firstWhere('user_id', $student->user_id);
                        // dd($existingStudent,$student->user_id);
                        if ($existingStudent) {
                            $existingStudent->subjectCollection->push($subject);
                            $existingStudent->total_grade += $subject->total_grade;
                            // $existingStudent->count_groups += $subject->count_groups;
                            // $existingStudent->count_deliveries += $subject->count_deliveries;
                            // dd($existingStudent);
                        } else {
                            $student->total_grade = $subject->total_grade;
                            // $student->count_deliveries = $subject->count_deliveries;
                            // $student->count_groups = $subject->count_groups;
                            $students->push($student);
                        }
                    });
            });
        });
        return $students;
    }
}
