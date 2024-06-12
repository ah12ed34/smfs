<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'file',
        'grade',
        'subject_id',
        'is_active',
        'max_student',
        'min_student',
        'start_date',
        'end_date',
        'description',
    ];
    public function getProjectGroup(){
        return $this->hasMany(GroupProject::class);
    }

    public function GroupProjects(){
        return $this->hasMany(GroupProject::class,'project_id','id');
    }
}
