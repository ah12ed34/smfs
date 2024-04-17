<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectChat extends Model
{
    use HasFactory;

    public function Students() { return $this->hasMany(WorkGroup::class);}
    public function Group(){return $this->hasOne(GroupProject::class);}

}
