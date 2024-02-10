<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studying extends Model
{
    use HasFactory;

    public function teacher() {
        return $this->hasOne(Academic::class);
    }
    public function students() {
        return $this->hasMany(Student::class);
    }
}
