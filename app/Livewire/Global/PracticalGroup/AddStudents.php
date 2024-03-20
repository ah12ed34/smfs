<?php

namespace App\Livewire\Global\PracticalGroup;

use Livewire\Component;
use App\Models\Group;
use App\Models\Student;
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

    public function getStudentsProperty()
{
    return Student::join('users', 'users.id', '=', 'students.user_id')
    ->where('students.level_id',$this->group->level_id)
    ->where(function($query){
        $query->whereIn('user_id',function($query){
            $query->select('student_id')->from('group_students')->where('group_id',$this->group->id);
        });
        $query->WhereNotIn('user_id',function($query){
            $query->select('student_id')->from('group_students')->whereIn('group_id',function($query){
                $query->select('id')->from('groups')->where('group_id',$this->group->id)->whereNot('id',$this->practical_group->id);
            });
        });
    })
    ->where(function($query){
        $query->where('users.name','like','%'.$this->search.'%')
        ->orWhere('users.email','like','%'.$this->search.'%')
        ->orWhere('users.phone','like','%'.$this->search.'%')
        ->orWhere('users.id','like','%'.$this->search.'%');
    })->select('students.*','users.name','users.email')->paginate($this->perPage);
}

    public function render()
    {
        return view('livewire.global.practical-group.add-students',['students'=>$this->students]);
    }
}
