<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'level_id',
        'image',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
