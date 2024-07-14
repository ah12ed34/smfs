<?php

namespace App\Repositories;

use App\Models\Academic;
use App\Models\GroupStudents;
use App\Models\GroupSubject;
use App\Models\Level;
use Illuminate\Support\Facades\DB;

class EmployeesRepository extends AcademicYRepository
{
    public function getSubjectsTeachering(Academic $academic)
    {
        return DB::table('users')->where('users.id', $academic->user_id)->
        join('academics', 'users.id', '=', 'academics.user_id')->
        join('group_subjects', 'academics.user_id', '=', 'group_subjects.teacher_id')->
        join('subjects_levels', 'group_subjects.subject_id', '=', 'subjects_levels.id')->
        join('subjects', 'subjects_levels.subject_id', '=', 'subjects.id')->
        join('levels', 'subjects_levels.level_id', '=', 'levels.id')->
        join('departments', 'levels.department_id', '=', 'departments.id')->
        join('groups', 'group_subjects.group_id', '=', 'groups.id')->
        where('group_subjects.ay_id', $this->currentAcademicYear->id)->
        where('subjects_levels.semester', $this->currentAcademicYear->term)->
        select('subjects.name_ar as subject', 'levels.name as level', 'departments.name as department', 'groups.name as group'
            ,'subjects_levels.semester as semester' ,'subjects_levels.id as subject_level_id',
            'group_subjects.id as group_subject_id','group_subjects.group_id as group_id'
            ,'group_subjects.subject_id as subject_id','group_subjects.teacher_id as teacher_id'
        )

        ;
    }
    public function getTeachingSubjectsByLevel(Academic $academic,$level)
    {
        if($level == 'all')
            return $this->getSubjectsTeachering($academic);
        if(is_numeric($level))
            return $this->getSubjectsTeachering($academic)->where('levels.id', $level);
    }

    public function getAcademicGroups(Academic $academic)
    {
        return DB::table('users')->where('id', $academic->user_id)->
        join('academics', 'users.id', '=', 'academics.user_id')->
        join('group_subjects', 'academics.user_id', '=', 'group_subjects.Teather_id')->
        join('groups', 'group_subjects.group_id', '=', 'groups.id')->
        join('levels', 'groups.level_id', '=', 'levels.id')->
        join('departments', 'levels.department_id', '=', 'departments.id')->
        where('group_subjects.ay_id', $this->currentAcademicYear->id)->
        select('groups.name as group', 'levels.name as level', 'departments.name as department')
        ;
    }

    public function getSubjectsable(){
        return DB::table('subjects')->
        // ->join('subjects', 'subjects.id', '=', 'subjects_levels.subject_id')->
        join('subjects_levels', 'subjects.id', '=', 'subjects_levels.subject_id')->
        join('levels', 'subjects_levels.level_id', '=', 'levels.id')->
        join('departments', 'levels.department_id', '=', 'departments.id')
        ;
    }

    public function getSubjectsableByAcademicAndLevel($academic_id,$level_id)
    {
        return $this->getSubjectsable()
        // ->join('group_subjects', 'group_subjects.subject_id', '=', 'subjects_levels.id')
        // ->join('academics', 'academics.user_id', '=', 'group_subjects.teacher_id')
        ->join('groups',function($join){
            $join->on('groups.level_id', '=', 'levels.id')
            ->where(function ($query) {
                $query->where('subjects_levels.has_practical', 0)
                      ->whereNull('groups.group_id');
            })->orWhere(function($subQuery) {
                $subQuery->where('subjects_levels.has_practical', 1);
            });
        })
        // ->where(function ($query) use ($academic_id) {
        //     $query->where('academics.user_id', $academic_id)
        //         ->orWhere('group_subjects.teacher_id', $academic_id)
        //         ->orWhereNull('group_subjects.teacher_id');
        // })
        ->leftJoin('group_subjects', function ($join) use ($academic_id) {
            $join->on('group_subjects.subject_id', '=', 'subjects_levels.id')
                ->where('group_subjects.teacher_id', $academic_id)
                ->where('group_subjects.ay_id', $this->currentAcademicYear->id)
                ->join('groups as gs', 'group_subjects.group_id', '=', 'gs.id');
        })
        ->where('levels.id', $level_id)
        ->where('subjects_levels.semester', $this->currentAcademicYear->term)
        ->select('subjects.name_ar as subject', 'levels.name as level', 'departments.name as department', 'groups.name as group'
            ,'subjects_levels.semester as semester' ,'subjects_levels.id as subject_level_id',
            'group_subjects.id as group_subject_id','group_subjects.group_id as group_id'
            ,'group_subjects.subject_id as subject_id','group_subjects.teacher_id as teacher_id'
            ,'gs.name as group_name'
    );

    }
    public function getAcademicsByLevel($level_id)
    {
        if(is_numeric($level_id))
        return Academic::whereIn('user_id', function ($query) use ($level_id) {
            $query->select('academics.user_id')
                ->from('academics')
                ->join('group_subjects', 'academics.user_id', '=', 'group_subjects.teacher_id')
                ->join('subjects_levels', 'group_subjects.subject_id', '=', 'subjects_levels.id')
                ->join('levels', 'subjects_levels.level_id', '=', 'levels.id')
                ->where('levels.id', $level_id)
                ->where('group_subjects.ay_id', $this->currentAcademicYear->id)
                ->where('subjects_levels.semester', $this->currentAcademicYear->term)
                ->groupBy('academics.user_id');
        });
        ;
    }

    public function getAcademicsByDepartment($department_id)
    {
        if(is_numeric($department_id))
        return Academic::whereIn('user_id', function ($query) use ($department_id) {
            $query->select('academics.user_id')
                ->from('academics')
                ->where('academics.department_id', $department_id)
                ;
        });
        ;
    }

    public function getLevelsByAcademic($academic_id)
    {
        $employeeData = Academic::where('user_id', $academic_id)->first();
        if($employeeData){
            $levels = Level::whereIn('id', function ($query) use ($employeeData) {
                $query->select('groups.level_id')
                    ->from('group_subjects')
                    ->leftJoin('groups', 'group_subjects.group_id', '=', 'groups.id')
                    ->where('group_subjects.ay_id', $this->currentAcademicYear->id)
                    ->where('group_subjects.teacher_id', $employeeData->user_id)
                    ->where('groups.level_id', '!=', null)
                    ->distinct('groups.level_id')
                    ;
            });
            return $levels->get();
        }
        return collect([]);
    }

    public function getSubjectsByAcademic($academic_id)
    {
        $employeeData = Academic::where('user_id', $academic_id)->first();
        if($employeeData){
            $subjects = DB::table('subjects')->whereIn('id', function ($query) use ($employeeData) {
                $query->select('subjects_levels.subject_id')
                    ->from('group_subjects')
                    ->join('subjects_levels', 'group_subjects.subject_id', '=', 'subjects_levels.id')
                    ->where('group_subjects.ay_id', $this->currentAcademicYear->id)
                    ->where('group_subjects.teacher_id', $employeeData->user_id)

                    ;
            });
            return $subjects->get();
        }
        return collect([]);
    }

    public function getCoursesByAcademic(Academic $academic)
    {

        return $academic->courses()->where('group_subjects.ay_id', $this->currentAcademicYear->id)
        ->whereHas('levelSubject', function ($query) {
            $query->where('semester', $this->currentAcademicYear->term);
        });
    }

    public function getStudentsInGroupBySubject(GroupSubject $group_subject){
    //     return $group_subject->students()
    //     ->whereIn('students.user_id', function ($query) use ($group_subject) {
    //         $query->select('group_students.student_id')
    //             ->from('group_students')
    //             ->where('group_id', $group_subject->group_id)
    //             // ->rightjoin('studyings', 'group_students.id', '=', 'studyings.student_id')
    //             // ->where('studyings.subject_id', $group_subject->id)
    //             ->where('group_students.ay_id',$group_subject->ay_id)
    //             ;
    //     })->leftjoin('studyings',function($join)use($group_subject){
    //         $join->on('group_students.id', '=', 'studyings.student_id')
    //         ->where('studyings.subject_id', $group_subject->id)
    //         ;
    //     })

    //    ;
    if(!$group_subject->HasPractical()){
        $students = $group_subject->students()
        ->AddSelect(
            'students.*',
            DB::raw('
                SUM(DISTINCT COALESCE(deliveries.grade, 0)) as delivery_grade,
                SUM(DISTINCT COALESCE(work_groups.grade, 0)) as work_grade,
                SUM(DISTINCT COALESCE(group_projects.grade, 0)) as group_grade,
                SUM(DISTINCT COALESCE(studyings.helf_exem, 0)) as helf_grade,
                SUM(DISTINCT COALESCE(studyings.final_exem, 0)) as final_grade,
                SUM(DISTINCT COALESCE(studyings.addional_grades, 0)) as addional_grades,
                SUM(DISTINCT
                    '.$this->getSetPersents(15).'
                ) as persents
            ')
        )
        ->join('group_subjects', 'group_students.group_id', '=', 'group_subjects.group_id')
        ->where('group_subjects.id', $group_subject->id)
        ->leftJoin('studyings', function ($join) use ($group_subject) {
            $join->on('group_students.id', '=', 'studyings.student_id')
                 ->where('studyings.subject_id', '=', $group_subject->id);
        })
        ->leftJoin('work_groups', function ($join) use ($group_subject) {
            $join->on('group_projects.id', '=', 'work_groups.group_id')
                 ->on('group_students.id', '=', 'work_groups.student_id')
                 ->join('group_projects', 'work_groups.group_id', '=', 'group_projects.id')
                 ->join('projects',function($join) use ($group_subject){
                     $join->on('group_projects.project_id', '=', 'projects.id')
                        ->where('projects.subject_id', $group_subject->id);
                 })
                 ->whereNotNull('group_projects.grade');
        })
        ->leftJoin('deliveries', function ($join) use ($group_subject) {
            $join->on('group_students.id', '=', 'deliveries.student_group_id')
                 ->join('group_files', 'deliveries.file_id', '=', 'group_files.id')
                 ->join('files', 'group_files.file_id', '=', 'files.id')
                 ->where('files.type', 'assignment')
                 ->where('group_files.group_subject_id', $group_subject->id);
        })
        ->where('group_students.ay_id', $group_subject->ay_id)
        ->groupBy('group_students.id')
        // ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
        ;
        // dd($group_subject->students()->get());

        // $students = $students->get()->map(function ($student) {
        //     $student->total_grade = $student->delivery_grade + $student->work_grade + $student->group_grade + $student->helf_grade + $student->final_grade + $student->addional_grades + $student->persents;
        //     return $student;
        // });
    }elseif(!$group_subject->IsPractical()){
        $students = $group_subject->students()
    ->AddSelect(
    'students.*',
    'subjects_levels.practical_grade as practical_grade',
    'practical_group_students.id as practical_group_student_id',
    'practical_group_students.group_id as practical_group_id',
    'practical_group_subjects.id as practical_group_subject_id',
    DB::raw('
        SUM(DISTINCT COALESCE(deliveries.grade, 0)) as delivery_grade,
        SUM(DISTINCT COALESCE(work_groups.grade, 0)) as work_grade,
        SUM(DISTINCT COALESCE(group_projects.grade, 0)) as group_grade,
        SUM(DISTINCT COALESCE(studyings.helf_exem, 0)) as helf_grade,
        SUM(DISTINCT COALESCE(studyings.final_exem, 0)) as final_grade,
        SUM(DISTINCT COALESCE(studyings.addional_grades, 0)) as addional_grades,
        SUM(DISTINCT
            ' . $this->getSetPersents(15) . '
        ) as persents

    '),
                //

    DB::raw('
        SUM(DISTINCT COALESCE(practical_deliveries.grade, 0)) as practical_delivery_grade,
        SUM(DISTINCT COALESCE(practical_work_groups.grade, 0)) as practical_work_grade,
        SUM(DISTINCT COALESCE(practical_group_projects.grade, 0)) as practical_group_grade,
        SUM(DISTINCT COALESCE(practical_studyings.helf_exem, 0)) as practical_helf_grade,
        SUM(DISTINCT COALESCE(practical_studyings.final_exem, 0)) as practical_final_grade,
        SUM(DISTINCT COALESCE(practical_studyings.addional_grades, 0)) as practical_addional_grades,
        SUM(DISTINCT
            ' . $this->getSetPersents(15, 'practical_studyings') . '
        ) as practical_persents
    ')
)

->join('group_subjects', 'group_students.group_id', '=', 'group_subjects.group_id')
        ->where('group_subjects.id', $group_subject->id)
->leftJoin('subjects_levels', function ($join) use ($group_subject) {
    $join->on('group_subjects.subject_id', '=', 'subjects_levels.id')
        ->where('subjects_levels.has_practical', 1)
        ->where('subjects_levels.level_id', $group_subject->subjectLevel->level_id);
        ;
})
->leftJoin('studyings', function ($join) use ($group_subject) {
    $join->on('group_students.id', '=', 'studyings.student_id')
        ->where('studyings.subject_id', '=', $group_subject->id);
})
->leftJoin('work_groups', function ($join) use ($group_subject) {
    $join->on('group_projects.id', '=', 'work_groups.group_id')
        ->on('group_students.id', '=', 'work_groups.student_id')
        ->join('group_projects', 'work_groups.group_id', '=', 'group_projects.id')
        ->join('projects', function ($join) use ($group_subject) {
            $join->on('group_projects.project_id', '=', 'projects.id')
                ->where('projects.subject_id', $group_subject->id);
        })
        ->whereNotNull('group_projects.grade');
})
->leftJoin('deliveries', function ($join) use ($group_subject) {
    $join->on('group_students.id', '=', 'deliveries.student_group_id')
        ->join('group_files', 'deliveries.file_id', '=', 'group_files.id')
        ->join('files', 'group_files.file_id', '=', 'files.id')
        ->where('files.type', 'assignment')
        ->where('group_files.group_subject_id', $group_subject->id);
})
->leftJoin('group_students as practical_group_students', function ($join) use ($group_subject) {
    $join->on('group_students.student_id', '=', 'practical_group_students.student_id')
        ->whereIn('practical_group_students.group_id',$group_subject->group->groups()->pluck('id'))
        ->where('practical_group_students.ay_id', $group_subject->ay_id)
        ;
})->leftJoin('group_subjects as practical_group_subjects', function ($join) use ($group_subject) {
            $join->on('practical_group_students.group_id', '=', 'practical_group_subjects.group_id')
                ->where('practical_group_subjects.subject_id', $group_subject->subject_id)
                ->where('practical_group_subjects.ay_id', $group_subject->ay_id)
                ->where('practical_group_subjects.is_practical', 1);

        })
->leftJoin('studyings as practical_studyings', function ($join) {
    $join->on('practical_group_students.id', '=', 'practical_studyings.student_id')
        ->on('practical_studyings.subject_id','=' ,'practical_group_subjects.id');
})

        ->leftJoin('work_groups as practical_work_groups', function ($join) use ($group_subject) {
            $join->on('practical_group_projects.id', '=', 'practical_work_groups.group_id')
                ->on('practical_group_students.id', '=', 'practical_work_groups.student_id')
                ->leftJoin('group_projects as practical_group_projects', 'practical_work_groups.group_id', '=', 'practical_group_projects.id')
                ->leftJoin('projects as practical_projects', function ($join) use ($group_subject) {
                    $join->on('practical_group_projects.project_id', '=', 'practical_projects.id');
                })->on('practical_projects.subject_id', 'practical_group_subjects.id')
                ->whereNotNull('practical_group_projects.grade');
        })
        ->leftJoin('deliveries as practical_deliveries', function ($join) {
            $join->on('practical_group_students.id', '=', 'practical_deliveries.student_group_id')
                ->leftJoin('group_files as practical_group_files', 'practical_deliveries.file_id', '=', 'practical_group_files.id')
                ->leftJoin('files as practical_files', 'practical_group_files.file_id', '=', 'practical_files.id')
                ->where('practical_files.type', 'assignment')
                ->on('practical_group_files.group_subject_id', 'practical_group_subjects.id')
                ;
        })
->where('group_students.ay_id', $group_subject->ay_id)
->groupBy('group_students.id', 'subjects_levels.practical_grade', 'practical_group_students.id'
    ,'practical_group_subjects.id','practical_deliveries.grade')
;

// $students = $students->get()->map(function ($student) {
// $student->theory_total_grade = $student->delivery_grade + $student->work_grade + $student->group_grade + $student->helf_grade + $student->final_grade + $student->addional_grades + $student->persents;
// $student->practical_total_grade = $student->practical_delivery_grade + $student->practical_work_grade + $student->practical_group_grade + $student->practical_helf_grade + $student->practical_final_grade + $student->practical_addional_grades + $student->practical_persents;
// if($student->practical_total_grade > 100){
//     $student->practical_total_grade = 100;
// }elseif($student->practical_total_grade < 0){
//     $student->practical_total_grade = 0;
// }
// if($student->theory_total_grade > 100){
//     $student->theory_total_grade = 100;
// }elseif($student->theory_total_grade < 0){
//     $student->theory_total_grade = 0;
// }
// $student->total_grade = (((($student->practical_grade??100) / 100) * $student->practical_total_grade)
// + (((100 - ($student->practical_grade??0)) / 100) * $student->theory_total_grade))
// ;
// if($student->total_grade > 100){
//     $student->total_grade = 100;
// }elseif($student->total_grade < 0){
//     $student->total_grade = 0;
// }
// return $student;
// });
    }
    return $students;
    }

    public function getStudentsInGroupBySubjectDeliveryAssessment(GroupSubject $group_subject){
        return $group_subject->students()
        ->whereIn('students.user_id', function ($query) use ($group_subject) {
            $query->select('group_students.student_id')
                ->from('group_students')
                ->where('group_students.group_id', $group_subject->group_id)
                ->where('group_students.ay_id',$group_subject->ay_id)
                ->join('deliveries', 'group_students.id', '=', 'deliveries.student_group_id')
                ->join('group_files', 'deliveries.file_id', '=', 'group_files.id')
                ->join('files', 'group_files.file_id', '=', 'files.id')
                ->where('files.type', 'assessment')

                // ->where()
                ;
        });
    }


    public function getSetPersents(int $x = 15,$table = 'studyings')
    {
        $result = null;
        for($i = 0; $i < $x; $i++){
            $result .= 'COALESCE(case '.$table.'.persents'.$i+1 .'
                            when "present" then 1
                            when "late" then 0.5
                            when "absent" then 0
                            when "permit" then 1
                            else 0
                        end, 0) ';
            if($i < $x - 1){
                $result .= '+ ';
            }
        }
        return $result;
    }

    public function getStudentsInGroupBySubjectProject(GroupSubject $group_subject){
        return $group_subject->students()
        ->whereIn('students.user_id', function ($query) use ($group_subject) {
            $query->select('group_students.student_id')
                ->from('group_students')
                ->where('group_students.group_id', $group_subject->group_id)
                ->where('group_students.ay_id',$group_subject->ay_id)
                ->rightjoin('group_subjects', 'group_students.group_id', '=', 'group_subjects.group_id')
                ->rightjoin('projects', 'group_subjects.id', '=', 'projects.subject_id')
                ->rightjoin('group_projects', 'projects.id', '=', 'group_projects.project_id')
                ->rightjoin('work_groups',function($join){
                    $join->on('group_projects.id', '=', 'work_groups.group_id')
                    ->on('work_groups.student_id', '=', 'group_students.id');
                    ;
                })
                ->where('group_subjects.id', $group_subject->id)

                ;
        });
    }

}
