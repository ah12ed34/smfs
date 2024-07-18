<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupProject extends Model
{
    use HasFactory;
    public $table = 'group_projects';
    public $fillable = [
        'project_id',
        'grade',
        'file',
        'student_id',
        'name',
        'comment',
        'delivery_date',

    ];
    public function project(){
        return $this->hasOne(Project::class,'id','project_id');
    }
    public function student(){
        return $this->hasOneThrough(Student::class,GroupStudents::class,'id','user_id','student_id','student_id');
    }
    public function students(){
        // $students = $this->join('work_groups','group_projects.id','=','work_groups.group_id')
        // ->join('group_students','work_groups.student_id','=','group_students.id')
        // ->join('students','group_students.student_id','=','students.user_id')
        // ->join('users','students.user_id','=','users.id')
        // ->select('students.*','users.name')
        // ->get();
        $students = $this->hasMany(WorkGroup::class,'group_id','id');


        return $students;
        // return $this->hasMany(WorkGroup::class,'group_id','id');

    }

    public function is_student_exist(){
        $studentIds = $this->students->pluck('student_id')->toArray();
        $exists = $this->project->groupSubject->group->students()
        ->whereIn('id', $studentIds)
        ->where('student_id', $this->student_id)
        ->exists();

    return $exists;
    }

}
