<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    use HasFactory;

    public function subjects()
    {
        return $this->belongsToMany(groupSubject::class, 'group_subjects_pivot');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_group_pivot');
    }

    public function teachers()
    {
        
    }

}
