<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'name_ar',
        'name_en',
        'image',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class, 'subjects_levels', 'subject_id', 'level_id');
    }
}
