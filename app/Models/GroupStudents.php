<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupStudents extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'group_id',
        'student_id',
        'ay_id',
        // 'is_active',
        // 'is_practical',
        // 'is_theoretical',
        // 'is_completed',
        // 'is_examed',
        // 'is_exemed',
        // 'is_midterm_examed',
        // 'is_final' ,
    ];
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'user_id');
    }
    public function groupSubject()
    {
        return $this->belongsTo(GroupSubject::class, 'group_id', 'group_id');
    }
    public function getDelivery($id)
    {
        return $this->hasOne(Delivery::class, 'group_student_id', 'id')->where('group_file_id', $id)->first();
    }
}
