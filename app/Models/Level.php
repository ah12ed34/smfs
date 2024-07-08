<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'department_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'department_id' => 'integer',
    ];

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subjects_levels', );
    }

    public function subjectLevels()
    {
        return $this->hasMany(SubjectsLevels::class, 'level_id','id');
    }
}
