<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectsLevels extends Model
{
    use HasFactory;

    protected $table = 'subjects_levels';
    protected $fillable = [
        'id',
        'subject_id',
        'level_id',
        'semester',
        'has_practical',
        'isActivated',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function groupFiles()
    {
        return $this->hasManyThrough(GroupFile::class, GroupSubject::class, 'subject_id', 'group_id', 'id', 'group_id');
    }

    public function groupSubjects()
    {
        return $this->hasMany(GroupSubject::class, 'subject_id', 'id');
    }



}
