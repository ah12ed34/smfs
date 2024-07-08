<?php

namespace App\Repositories;

use App\Models\Academic;
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
}
