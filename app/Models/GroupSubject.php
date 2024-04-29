<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupSubject extends Model
{
    use HasFactory;

    protected $fillable = [
    'id',
    'group_id',
    'subject_id',
    'teacher_id',
    'is_practical',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function subject()
    {

    // return Subject::join('subjects_levels', 'subjects.id', '=', 'subjects_levels.subject_id')
    //         ->where('subjects_levels.id', $this->subject_id)
    //         ->select('subjects.*')
    //         ->get();

        return Subject::join('subjects_levels', 'subjects.id', '=', 'subjects_levels.subject_id')
            ->where('subjects_levels.id', $this->subject_id)
            ->select('subjects.*')
            ->first();
    }
    public function teacher()
    {
        return $this->belongsTo(Academic::class, 'teacher_id','user_id');
    }

    public function practicalGroups()
    {
        return $this->belongsToMany(Group::class, 'practical_groups', 'group_subject_id', 'group_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'group_students', 'group_id','student_id'
        ,'group_id','user_id')->withPivot('id');

    }

    public function studying(){
        return $this->hasOne(Studying::class,'subject_id','id');
    }

    public function isNotNullStudying(){
        return $this->hasMany(Studying::class,'subject_id','id')->whereNotNull('id');
    }

    /*
    * $this->group_subject->students()
        ->whereHas('user', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')->
            orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('phone', 'like', '%' . $this->search . '%')
            ->orWhere('id', 'like', '%' . $this->search . '%');
        })
        ->whereNotIn('students.user_id', function ($query) {
            $query->select('group_students.student_id')
            ->from('group_students')
            ->where('group_id', $this->group_subject->group_id)
            ->join('studyings', 'group_students.id', '=', 'studyings.student_id')
            ->where('studyings.subject_id', $this->group_subject->id)
            ->where('studyings.is_completed', 1);
        });
    */
    public function getStudentsInGroupBySubject($search){
        return $this->students()
        ->whereHas('user', function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')->
            orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->orWhere('id', 'like', '%' . $search . '%');
        })
        ->whereNotIn('students.user_id', function ($query) {
            $query->select('group_students.student_id')
            ->from('group_students')
            ->where('group_id', $this->group_id)
            ->join('studyings', 'group_students.id', '=', 'studyings.student_id')
            ->where('studyings.subject_id', $this->id)
            ->where('studyings.is_completed', 1);
        });
    }
    public function projects()
    {
        return $this->hasOne(Project::class, 'subject_id', 'id');
        return $this->hasMany(Project::class, 'subject_id', 'id');
    }


    public function getProjectsInGroupBySubject($search){
        if ($this->projects) {
            return $this->projects->GroupProjects()
                ->where('name', 'like', '%' . $search . '%');
        }
        return GroupProject::where('project_id',0);
    }

    public function getOtherGroups(){
        if(!optional(auth()->user())->isAcademic())
        {
            return;
        }
        return
        Group::join('group_subjects', 'groups.id', '=', 'group_subjects.group_id')
            ->where('group_subjects.subject_id', $this->subject_id)
            ->where('group_subjects.teacher_id', auth()->user()->academic->user_id)
            ->where('groups.id', '!=', $this->group_id)
            ->select('groups.*')
            ->get();
    }

    public function files()
    {
        return $this->hasManyThrough(File::class, GroupFile::class, 'group_subject_id', 'id', 'id', 'file_id')
            ->withTrashedParents();
    }

    public function GroupFiles(){
        return $this->hasMany(GroupFile::class,'group_subject_id','id');
    }

    public function getFilesInGroupBySubject($type = 'assignment',$search){

        // dd($this->files->where('type', $type));
        $file = $this->files()->where('type', $type)
        ->where('name', 'like', '%' . $search . '%');
        // dd($file->get());
        return $file;
    }


}
