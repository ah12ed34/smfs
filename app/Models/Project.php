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
        'is_active',
        'max_student',
        'min_student',
        'star_data',
        'end_data',
    ];
    public function getProjectGroup(){
        return $this->hasMany(GroupProject::class);
    }
}
