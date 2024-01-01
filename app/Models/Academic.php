<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    use HasFactory;
    
    public function user() {
        return $this->hasOne(User::class);
    }
    public function department() {
        return $this->hasOne(Department::class);
    }
    public function courses() {
        return $this->hasMany(groupSubject::class);
    }
    public function subjects() {
        return $this->hasMany(Subject::class);
    }
            
}
