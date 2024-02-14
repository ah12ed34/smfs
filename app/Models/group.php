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
        return $this->belongsToMany(Subject::class, 'group_subjects', 'group_id', 'subject_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'group_students', 'group_id', 'student_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function group()
    {
        return $this->belongsTo(group::class, 'group_id');
    }

    public function groups()
    {
        return $this->hasMany(group::class, 'group_id');
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($group) {
            $group->subjects()->detach();
            $group->students()->detach();
            $group->groups()->delete();
        });
        static::deleted(function ($group) {
            if ($group->schedule) {
                unlink($group->schedule);
            }
        });
        static::creating(function ($group) {
            // $group->id = uniqid();
        });
        static::created(function ($group) {

            $group->save();
        });
    }



}
