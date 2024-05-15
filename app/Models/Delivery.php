<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'student_group_id',
        'file_id',
        'file',
        // 'file2',
        'is_active',
        'grade',
        'delivery_date',
        'comment',
    ];

    public function groupStudent()
    {
        return $this->hasOne(GroupStudents::class, 'id', 'student_group_id');
    }


}
