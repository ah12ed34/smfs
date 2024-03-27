<?php

namespace App\Livewire\Global\PracticalGroup;

use App\Models\Group;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class AddStudents extends Component
{
    use WithPagination;
    public $page;
    public $group;
    public $search;
    public $perPage = 10;
    public $practical_group;
    protected $queryString = ['search'];
    public $selectedStudents = [];
    //practical_group


    public function mount(Group $group,$practical_group)
    {

        $this->practical_group = Group::where('group_id',$group->id)->where('id',$practical_group)->firstOrFail();
        $this->selectedStudents = $this->practical_group->students->pluck('user_id')->map(function($item){
            return (string)$item ;
        })->toArray();
        $this->group = $group;
        $this->page = request()->page ?? 1;
        // preventPageRefresh();
    }

    public function addStudents(){
        if(count($this->selectedStudents) == 0){
            $this->practical_group->students()->detach();
            return;
        }
        $this->practical_group->students()->syncWithoutDetaching($this->selectedStudents);
        $removedStudents = $this->practical_group->students->whereNotIn('user_id',$this->selectedStudents)->pluck('user_id')->toArray();
        $this->practical_group->students()->detach($removedStudents);

    }

    public function getStudentsProperty()
    {
        // $query = Student::join('users', 'users.id', '=', 'students.user_id')
        //     ->where('students.level_id', $this->group->level_id)
        //     ->whereIn('students.user_id', function ($subquery) {
        //         $subquery->select('student_id')
        //             ->from('group_students')
        //             ->where('group_id', $this->group->id);
        //     })
        //     ->whereNotIn('students.user_id', function ($subquery) {
        //         $subquery->select('student_id')
        //             ->from('group_students')
        //             ->whereIn('group_id', function ($subsubquery) {
        //                 $subsubquery->select('id')
        //                     ->from('groups')
        //                     ->where('group_id', $this->group->id)
        //                     ->whereNot('id', $this->practical_group->id);
        //             });
        //     })
        //     ->where(function ($subquery) {
        //         $subquery->where('users.name', 'like', '%' . $this->search . '%')
        //             ->orWhere('users.email', 'like', '%' . $this->search . '%')
        //             ->orWhere('users.phone', 'like', '%' . $this->search . '%')
        //             ->orWhere('users.id', 'like', '%' . $this->search . '%');
        //     })
        //     ->select('students.*', 'users.name', 'users.email');

        // if ($this->selectedStudents != null && count($this->selectedStudents) > 0) {
        //     $studentIds = $this->practical_group->students->pluck('user_id')->toArray();
        //     $query->orderByRaw('FIELD(students.user_id, ' . implode(',', $studentIds) . ') DESC');
        // }

        return $this->practical_group->getStudentsInGroup($this->search, $this->perPage, $this->selectedStudents);
    }

    public function render()
    {
        return view('livewire.global.practical-group.add-students',['students'=>$this->students]);
    }
}
