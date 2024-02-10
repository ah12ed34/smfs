<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function Roles(){
        return $this->belongsToMany(Role::class);
    }
    public function Users(){
        return $this->belongsToMany(User::class);
    }

}
