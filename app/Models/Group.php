<?php

namespace App\Models;

use App\Tools\MyApp;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Vite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'max_students',
        'schedule',
        'level_id',
        'group_id',
        'gender',
        'system'
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'group_subjects', 'group_id', 'subject_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'group_students', 'group_id', 'student_id')
            ->withPivot(['id', 'ay_id']);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function groups()
    {
        return $this->hasMany(Group::class, 'group_id');
    }

    public function groupSubjects()
    {
        return $this->hasMany(GroupSubject::class, 'group_id', 'id');
    }

    public function groupStudents()
    {
        return $this->hasMany(GroupStudents::class, 'group_id', 'id');
    }

    public function IsPractical()
    {
        return $this->group_id;
    }

    // public function getStudentsInGroup($search = '',$page = 5 ,$selectedStudents = null,$sort = 'DESC')
    // {
    //     $query = Student::join('users', 'users.id', '=', 'students.user_id')
    //         ->where('students.level_id', $this->level_id)
    //         ->whereIn('students.user_id', function ($subquery) {
    //             if($this->group_id){
    //                 $subquery->select('student_id')
    //                     ->from('group_students')
    //                     ->where('group_id', $this->group_id);
    //                 $subquery->whereNotIn('student_id', function ($subsubquery) {
    //                     $subsubquery->select('student_id')
    //                         ->from('group_students')
    //                         ->whereIn('group_id', function ($subsubsubquery) {
    //                             $subsubsubquery->select('id')
    //                                 ->from('groups')
    //                                 ->where('group_id', $this->group_id)
    //                                 ->whereNot('id', $this->id)
    //                                 ;
    //                         });
    //                 });
    //             }else{

    //                     $subquery->whereNotExists(function ($subquery) {
    //                         $subquery->select(DB::raw(1))
    //                         ->from('group_students')
    //                         ->whereRaw('group_students.student_id = students.user_id')
    //                         ->where('group_students.group_id', '!=', $this->id);
    //                     });
    //             }
    //         });
    //     if($search != null && $search != ''){
    //         $query->where(function ($subquery) use ($search) {
    //             $subquery->where('users.name', 'like', '%' . $search . '%')
    //                 ->orWhere('users.email', 'like', '%' . $search . '%')
    //                 ->orWhere('users.phone', 'like', '%' . $search . '%')
    //                 ->orWhere('users.id', 'like', '%' . $search . '%');
    //         });
    //     }

    //     if (!empty($selectedStudents)) {
    //         $studentIds = $selectedStudents === true ? $this->students->pluck('user_id')->toArray() : $selectedStudents;
    //         $query->orderByRaw('FIELD(students.user_id, ' . implode(',', $studentIds) . ')'.$sort.'');
    //     }
    //     return $query->paginate($page);
    // }


    // *
    // * Get students in group
    // *
    // * @param string $search  [null] search by name, email, phone, id
    // * @param int $page   [5] number of students per page
    // * @param array|null $selectedStudents [null, true, [1,2,3]] selected students to be on top
    // * @param bool $sort [true, false] sort selected students in ascending or descending order
    // * @param string $sortBy [user_id, name, email, phone] sort by column
    // * @return \Illuminate\Pagination\LengthAwarePaginator [students] students in group
    // */
    public function getStudentsInGroup($search = '', $page = 5, $selectedStudents = null, $sortBy = 'user_id', $sort = true)
    {
        $query = Student::join('users', 'users.id', '=', 'students.user_id')
            ->where('students.level_id', $this->level_id);

        if ($this->group_id) {
            $query->whereIn('students.user_id', function ($subquery) {
                $subquery->select('student_id')
                    ->from('group_students')
                    ->where('group_id', $this->group_id)
                    ->whereNotIn('student_id', function ($subsubquery) {
                        $subsubquery->select('student_id')
                            ->from('group_students')
                            ->whereIn('group_id', function ($subsubsubquery) {
                                $subsubsubquery->select('id')
                                    ->from('groups')
                                    ->where('group_id', $this->group_id)
                                    ->whereNot('id', $this->id);
                            });
                    });
            });
        } else {
            $query->whereNotExists(function ($subquery) {
                $subquery->select(DB::raw(1))
                    ->from('group_students')
                    ->whereRaw('group_students.student_id = students.user_id')
                    ->where('group_students.group_id', '!=', $this->id)
                    ->join('groups', function ($join) {
                        $join->on('groups.id', '=', 'group_students.group_id')
                            ->whereNull('groups.group_id');
                    });
            });

            // dd($query->toSql());
        }
        // exit students finsh studing all subjects is_completed = 1
        $query->whereNotExists(function ($subquery) {
            $subquery->select(DB::raw(1))
                ->from('group_subjects')
                ->whereRaw('group_subjects.group_id =' . $this->id)
                ->join('studyings', function ($join) {
                    $join->on('studyings.subject_id', '=', 'group_subjects.id')
                        ->where('studyings.student_id', '=', 'group_students.id')
                        ->where('studyings.is_completed', '=', 0);
                });
            // dd($subquery->get());
        });
        if (!empty($search)) {
            $query->where(function ($subquery) use ($search) {
                $subquery->where('users.name', 'like', '%' . $search . '%')
                    ->orWhere('users.email', 'like', '%' . $search . '%')
                    ->orWhere('users.phone', 'like', '%' . $search . '%')
                    ->orWhere('users.id', 'like', '%' . $search . '%');
            });
            // sand message to user if not found any student but exist other students in other groups

        }

        if (!empty($selectedStudents)) {
            $studentIds = $selectedStudents === true ? $this->students->pluck('user_id')->toArray() : $selectedStudents;
            if (!empty($studentIds)) {
                if ($sort) {
                    arsort($studentIds);
                } else {
                    asort($studentIds);
                }
                $query->orderByRaw('FIELD(students.user_id, ' . implode(',', $studentIds) . ') DESC ');
                $query->orderBy(array_search($sortBy, ['user_id', 'name', 'email', 'phone']) ? $sortBy : 'user_id', $sort ? "ASC" : "DESC");
            }
        }

        $students = $query->paginate($page);

        if ($students->isEmpty() && !empty($search)) {
            $student = Student::join('users', 'users.id', '=', 'students.user_id')
                ->where('users.name', 'like', '%' . $search . '%')
                ->orWhere('users.email', 'like', '%' . $search . '%')
                ->orWhere('users.phone', 'like', '%' . $search . '%')
                ->orWhere('users.id', 'like', '%' . $search . '%')
                ->first();

            if ($student) {
                if ($student->level_id == $this->level_id && !$student->groups->isEmpty()) {
                    session()->flash('warning', __('general.student_not_found_in_group_exist_in_other_group', ['group' => $student->groups->first()->name]));
                } elseif ($student->level_id != $this->level_id) {
                    if ($student->level->department_id != $this->level->department_id) {
                        session()->flash('warning', __('general.student_not_found_in_department_exist_in_other_department', ['department' => $student->level->department->name]));
                    } else {
                        session()->flash('warning', __('general.student_not_found_in_level_exist_in_other_level', ['level' => $student->level->name]));
                    }
                }
            }
        }

        return $students;
    }

    public function Projects()
    {
        return $this->hasMany(Project::class);
    }

    public function getScheduleAttribute()
    {
        return $this->attributes['schedule'] ? asset('storage/' . $this->attributes['schedule']) : Vite::asset('resources/svg/file.svg');
    }

    public function getGGenderAttribute()
    {
        return MyApp::getStudentGender($this->gender);
    }

    public function getGSystemAttribute()
    {
        return MyApp::getSystem($this->system);
    }
    public static function boot()
    {
        parent::boot();
        static::updated(function ($group) {
            if ($group->isDirty('schedule')) {
                if ($group->getOriginal('schedule') && Storage::exists($group->getOriginal('schedule'))) {
                    Storage::delete($group->getOriginal('schedule'));
                }
            }
        });
        static::deleting(function ($group) {
            $group->subjects()->detach();
            $group->students()->detach();
            $group->groups()->delete();
        });
        static::deleted(function ($group) {
            if ($group->schedule && Storage::exists($group->schedule)) {
                Storage::delete($group->schedule);
            }
        });
    }
}
