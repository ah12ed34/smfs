<?php

namespace App\Livewire\Components\Academic\StudentsAffairs;

use App\Models\Group;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class AddStudentsInGroup extends Component
{
    use WithPagination
    ,WithoutUrlPagination
    ;

    public $AddStudentsIntoGroup;
    public $group;
    public $students;
    public $selectedStudents = [];
    public $paginateName = 'students';

    public function mount()
    {
        if($this->group){
            $this->AddStudentsIntoGroup = true;
        }else{
            $this->AddStudentsIntoGroup = false;
        }
    }

    public function addSTGS()
    {
        $this->group->students()->syncWithoutDetaching($this->selectedStudents);
        $this->selectedStudents = [];

        $this->dispatch('refreshStudentsInGroup');
    }

    public function getStudentsInGroup(Group $group,$selectedStudents = null,$sortBy ='user_id', $sort = true)
    {
        $query = Student::join('users', 'users.id', '=', 'students.user_id')
            ->where('students.level_id', $group->level_id);

        if ($group->group_id) {
            $query->whereIn('students.user_id', function ($subquery) use ($group){
                $subquery->select('student_id')
                    ->from('group_students')
                    ->where('group_id', $group->group_id)
                    ->whereNotIn('student_id', function ($subsubquery) use ($group){
                        $subsubquery->select('student_id')
                            ->from('group_students')
                            ->whereIn('group_id', function ($subsubsubquery) use ($group){
                                $subsubsubquery->select('id')
                                    ->from('groups')
                                    ->where('group_id', $group->group_id)
                                    ->whereNot('id', $group->id);
                            });
                    });
            });
        } else {
            $query->whereNotExists(function ($subquery) use ($group){
                $subquery->select(DB::raw(1))
                    ->from('group_students')
                    ->whereRaw('group_students.student_id = students.user_id')
                    ->where('group_students.group_id', '!=', $group->id)
                    ->join('groups', function ($join) {
                        $join->on('groups.id', '=', 'group_students.group_id')
                            ->whereNull('groups.group_id');
                    });

            });

            // dd($query->toSql());
        }
        // exit students finsh studing all subjects is_completed = 1
        $query->whereNotExists(function ($subquery) use ($group){
            $subquery->select(DB::raw(1))
            ->from('group_subjects')
            ->whereRaw('group_subjects.group_id =' . $group->id)
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
            if(!empty($studentIds)){
                if($sort){
                    arsort($studentIds);
                }else{
                    asort($studentIds);
                }
                $query->orderByRaw('FIELD(students.user_id, ' . implode(',', $studentIds) . ') DESC ');
                $query->orderBy(array_search($sortBy, ['user_id', 'name', 'email', 'phone']) ? $sortBy : 'user_id', $sort ? "ASC" : "DESC");
            }
        }

        return $query->get();
    }

    public function getStudentsAddProperty()
    {

            $students = $this->getStudentsInGroup($this->group)
                        ->diff($this->group->students)
            ;

        if($this->group->gender&&$this->group->gender != 'all'){
            $students = $students->map(function($student){
                if($student->user->gender == $this->group->gender){
                    return $student;
                }
            })->filter();
        }
        if($this->group->system&&$this->group->system != 'all'){
            $students = $students->where('system',$this->group->system);
        }
                // dd( $students->paginate(8, $this->paginateName));

        return $students->paginate(8, $this->paginateName);
    }


    public function render()
    {
        return view('livewire.components.academic.students-affairs.add-students-in-group'
            ,[
            'studentsAdd' => $this->studentsAdd
        ]);
    }
}
