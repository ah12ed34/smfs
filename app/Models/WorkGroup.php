<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkGroup extends Model
{
    use HasFactory;

    public function getSudents(){
        return $this->hasMany(Group::class);
    }
    public function chat(){
        return $this->hasMany(ProjectChat::class);
    }

}
