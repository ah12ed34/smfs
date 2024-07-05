<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'term',
        'status',
        'created_at',
        'updated_at'
    ];
    public function groups()
    {

        return $this->belongsToMany(Group::class, 'group_students', 'group_id', 'student_id')
            ->withPivot('id');
    }

    public static function currentAcademicYear()
    {
        // get the current academic year last created academic year
        return self::where('status', 1)->orderBy('id', 'desc')->first();
    }

    public function isActive()
    {
        return $this->status == 1;
    }

    public static function getTerm()
    {
        return self::currentAcademicYear()->term;
    }

    public static function setTerm($term)
    {
        if (is_numeric($term)) {
            $ay = self::currentAcademicYear();
            $ay->term = $term;
            $ay->save();
        }
    }



}
