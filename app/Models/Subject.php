<?php

namespace App\Models;

use App\Livewire\global\Subject\LevelSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'name_ar',
        'name_en',
        'image',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class, 'subjects_levels', 'subject_id', 'level_id');
    }

    public function groups()
    {
        return $this->hasMany(GroupSubject::class);
    }

    public function groupSubjects()
{

    // return GroupSubject::join('subjects_levels', 'group_subjects.subject_id', '=', 'subjects_levels.id')
    //     ->where('subjects_levels.subject_id', $this->id)
    //     ->select('group_subjects.*')
    //     ->get();
    return $this->hasManyThrough(
        GroupSubject::class,
        SubjectsLevels::class,
        'subject_id',
        'subject_id',
        'id',
        'id'
    )
    ;
}
    public function subjects_levels()
    {
        return $this->hasMany(SubjectsLevels::class);
    }

}
