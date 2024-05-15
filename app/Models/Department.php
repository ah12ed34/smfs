<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description',
    ];

    public function levels()
    {
        return $this->hasMany(Level::class);
    }

    public function Academics(){
        return $this->hasMany(Academic::class);
    }

    public function Subjects()
    {
        $subjects = collect();
        foreach ($this->levels as $level) {
            $subjects = $subjects->merge($level->subjects);
        }
        return $subjects;
    }

    public function groups($filter = 'all')
    {
        $groups = collect();
        foreach ($this->levels as $level) {
            $groups = $groups->merge($level->groups);
        }
        if ($filter == 'practical') {
            // practical groups
            $groups = $groups->filter(function ($group) {
                return $group->IsPractical();
            });
        } elseif ($filter == 'not_practical') {
            // not practical groups
            $groups = $groups->filter(function ($group) {
                return !$group->IsPractical();
            });
        }
        return $groups;
    }
    public function students()
    {
        $s = Student::join('users', 'users.id', '=', 'students.user_id')
            ->whereIn('students.level_id', function ($subquery) {
                $subquery->select('id')
                    ->from('levels')
                    ->where('department_id', $this->id);

            })->get();
            // dd($s);
            return $s;
    }

}
