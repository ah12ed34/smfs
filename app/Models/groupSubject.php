<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Attributes\Group;

class groupSubject extends Model
{
    use HasFactory;

    protected $fillable = [
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
        return $this->belongsTo(Subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Academic::class);
    }

    public function practicalGroups()
    {
        return $this->belongsToMany(Group::class, 'practical_groups', 'group_subject_id', 'group_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'group_students', 'group_id', 'student_id');
    }
}
