<?php

namespace App\Livewire\StudentsAffairs;

use App\Models\Group;
use App\Models\Level;
use App\Traits\Groupsable;
use App\Traits\Searchable;
use App\Traits\Studentsable;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Contracts\StudentsInterface;
use App\Livewire\Academic\Student\Students;
use App\Models\AcademicYear;
use App\Repositories\StudentsRepository;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;

// use function PHPSTORM_META\elementType;

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


    public function __construct()
    {
        $this->initializeGroupsable();
    }

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

        if(request()->has('year')){
            $year = request('year');
            if(is_numeric($year)){
                $this->StudentR->setAYear($year);
            }
        }

    }

    public function moveStudent($id,$group_id)
    {
        // dd($id,$group_id);
        if ($this->students->contains($id)) {
            $student = $this->students->find($id);
            $newGroup = $this->groups->find($group_id);
            if($newGroup){
                if($newGroup->students()->where('group_students.ay_id',$this->StudentR->getAYear()->id
                )->count() >= $newGroup->max){
                    $this->addError('group_id','المجموعة ممتلئة');
                    return;
                }
            }
            $this->moveStudentToGroup($student,$newGroup,$this->group);
            }
            // check if error column not found valdiation error group_id
            if(!$this->getErrorBag()->has('group_id')){
                $this->students->forget($this->students->search($student));
            }


    }

    #[on('refreshStudentsInGroup')]
    public function refreshStudentsInGroup()
    {
        $this->students;
    }

    public function getStudentsProperty()
    {
        $students = $this->StudentR->
        getStudentsInGroup($this->group);
        if (!empty($this->search)) {
            $students->WhereHas('user', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%')
                    ->orWhere('id', 'like', '%' . $this->search . '%')
                    ->orWhere('username', 'like', '%' . $this->search . '%')
                    ->orWhereRaw("concat(name, ' ', last_name) like ?", ['%' . $this->search . '%']);
            });
        }
        $students = $students->paginate($this->perPage);
        // dd($students->get());
        return $students;
    }

    public function render()
    {
        return view('livewire.students-affairs.students-information-in-groups'
        ,[
            'students' => $this->students
        ]);
    }
}
