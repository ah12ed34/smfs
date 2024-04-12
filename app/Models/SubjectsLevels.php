<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectsLevels extends Model
{
    use HasFactory;

    protected $table = 'subjects_levels';
    protected $fillable = [
        'id',
        'subject_id',
        'level_id',
        'semester',
        'has_practical',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
}
