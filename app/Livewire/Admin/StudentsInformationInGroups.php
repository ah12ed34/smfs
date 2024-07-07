<?php

namespace App\Livewire\Admin;

use App\Models\Group;
use App\Models\Level;
use App\Traits\Groupsable;
use App\Traits\Searchable;
use App\Traits\Studentsable;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

use function PHPSTORM_META\elementType;

class StudentsInformationInGroups extends Component
{
    use Studentsable ,Searchable,Groupsable{
        Groupsable::selected as selectedGroup;
        Studentsable::selected  insteadof Groupsable;
        Studentsable::setGender  insteadof Groupsable;
        Studentsable::setSystem insteadof Groupsable;
        Groupsable::setGender as setGenderGroup;
        Groupsable::setSystem as setSystemGroup;

    }
    public $level;
    public $group;
    public $groups;

    public function mount(Level $LId,Group $group)
    {
        $this->level = $LId;
        $this->group = $group;
        $this->sortField = 'id';
        $this->groups = $this->level->groups;
        if($group->group_id){
            $this->groups = $this->groups->where('group_id',$group->group_id);
        }else{
            $this->groups = $this->groups->whereNull('group_id');
        }
    }

    public function moveStudent($id,$group_id)
    {
        // dd($id,$group_id);
        if ($this->students->contains($id)) {
            $student = $this->students->find($id);
            $newGroup = $this->groups->find($group_id);
            $this->moveStudentToGroup($student,$newGroup,$this->group);
            }
            // check if error column not found valdiation error group_id
            if(!$this->getErrorBag()->has('group_id')){
                $this->students->forget($this->students->search($student));
            }


    }

    public function getStudentsProperty()
    {
        $studentsQuery = $this->group->students();
        if (!empty($this->search)) {
            $studentsQuery->whereHas('user', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%')
                    ->orWhere('id', 'like', '%' . $this->search . '%')
                    ->orWhere('username', 'like', '%' . $this->search . '%')
                    ->orWhereRaw("concat(name, ' ', last_name) like ?", ['%' . $this->search . '%']);
            });
        }

        // ترتيب النتائج بناءً على الحقل المحدد
        if (in_array($this->sortField, ['id', 'name', 'username', 'email', 'phone', 'user_id', 'group_id', 'system', 'level_id'])) {
            $studentsQuery->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        }
        // $studentsQuery->map(function ($student) {
        //     if(!$this->group->group_id){
        //         $student->group_id = $this->group->id;
        //     }else{
        //         $student->group_id = $this->group->id;
        //     }
        //     return $student;
        // });
        // تنفيذ الاستعلام مع التصفية والفرز
        $students = $studentsQuery->paginate($this->perPage);
            // dd($students);
        return $students;
    }
    public function render()
    {
        return view('livewire.admin.students-information-in-groups',['students' => $this->students ]);
    }
}
