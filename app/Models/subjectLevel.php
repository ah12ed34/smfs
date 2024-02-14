<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subjectLevel extends Model
{
    use HasFactory;
    protected $table = 'subjects_levels';
    protected $fillable = [
        'id',
        'subject_id',
        'level_id',
        'semester',
        'has_practical',
        'isActivated',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function groups()
    {
        return $this->hasMany(group::class);
    }


}
