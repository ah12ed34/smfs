<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'group_id',
        'student_id',
        'description',
        'grade',

    ];
    public function group(){
        return $this->belongsTo(GroupProject::class,'group_id','id');
    }
    public function student(){
        return $this->belongsTo(GroupStudents::class,'student_id','id');
    }

}
