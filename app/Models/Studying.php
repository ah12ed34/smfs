<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studying extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'subject_id',
        'persents1',
        'persents2',
        'persents3',
        'persents4',
        'persents5',
        'persents6',
        'persents7',
        'persents8',
        'persents9',
        'persents10',
        'persents11',
        'persents12',
        'persents13',
        'persents14',
        'persents15',
        'is_completed',
        'addional_grades',
        'helf_exem',
        'final_exem',


    ];

    public function teacher() {
        return $this->hasOne(Academic::class);
    }
    public function students() {
        return $this->hasMany(Student::class);
    }
}
