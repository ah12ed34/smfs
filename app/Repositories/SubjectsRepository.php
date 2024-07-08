<?php

namespace App\Repositories;

use App\Contracts\SubjectsInterface;
use App\Models\Group;
use App\Models\GroupStudents;
use App\Models\GroupSubject;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class SubjectsRepository extends StudentsRepository implements SubjectsInterface
{
    public function getSubjects()
    {
        return Subject::all();
    }

    public function getSubject($id)
    {
        return Subject::findOrFail($id);
    }

    public function createSubject($data)
    {
        return Subject::create($data);
    }

    public function updateSubject($id, $data)
    {
        $subject = Subject::findOrFail($id);
        $subject->update($data);
        return $subject;
    }

    public function deleteSubject($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return $subject;
    }

    public function getSubjectLevels($id)
    {
        $subject = Subject::findOrFail($id);
        return $subject->levels;
    }

    public function getSubjectLevel($id, $level_id)
    {
        $subject = Subject::findOrFail($id);
        return $subject->levels()->where('level_id', $level_id)->first();
    }

    public function getSubjectsByGroup(Group $group)
    {
        return $group->groupSubjects()
            ->where('group_subjects.ay_id', $this->currentAcademicYear->id)
            ->where('group_subjects.is_practical', $group->group_id ? 1 : 0)
            // ->with(['levelSubject' => function ($query) {
            //     $query->where('subjects_levels.semester', $this->currentAcademicYear->term);
            // }])
            ;
    }
    public function getSubjectsStudent(Student $student,GroupStudents $groupStudents = null,$practical = false)
    {
        $subjects = Subject::join('subjects_levels', 'subjects.id', '=', 'subjects_levels.subject_id')
            ->join('group_subjects', 'subjects_levels.id', '=', 'group_subjects.subject_id')
            ->join('groups', 'group_subjects.group_id', '=', 'groups.id')
            ->join('group_students', 'groups.id', '=', 'group_students.group_id')
            ->join('users', 'group_subjects.teacher_id', '=', 'users.id')
            ->where('group_students.student_id', $student->user_id)
            ->when($practical, function ($query) {
                $query->whereNotNull('groups.group_id');
            }, function ($query) {
                $query->whereNull('groups.group_id');
            }
            )
            ->when($groupStudents, function ($query) use ($groupStudents) {
                $query->where('group_students.id', $groupStudents->id)
                    ->where('group_subjects.ay_id', $groupStudents->ay_id);
            }, function ($query) {
                $query->where('group_subjects.ay_id', $this->currentAcademicYear->id);
            })
            ->where('group_subjects.is_practical', $practical ? 1 : 0)
            ->where('subjects_levels.semester', $this->currentAcademicYear->term)
            ->select(['group_subjects.*','subjects.*','group_subjects.id as group_subject_id',
                    DB::raw("CONCAT(users.name, ' ', users.last_name) as teacher_name")
                ]);

        return $subjects;
    }

    public function getSubjectsByLevelAndTerm($level_id){
        return Subject::join('subjects_levels', 'subjects.id', '=', 'subjects_levels.subject_id')
            ->join('levels', 'subjects_levels.level_id', '=', 'levels.id')
            ->where('levels.id', $level_id)
            ->where('subjects_levels.semester', $this->currentAcademicYear->term)
            ->select('subjects.*')
            ;
    }

}
