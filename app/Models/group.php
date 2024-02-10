<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'max_students',
        'schedule',
        'level_id',
        'group_id',
    ];

    public function subjects()
    {
        return $this->belongsToMany(groupSubject::class, 'group_subjects_pivot');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'group_students', 'group_id', 'student_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function parent()
    {
        return $this->belongsTo(group::class, 'group_id');
    }



}
