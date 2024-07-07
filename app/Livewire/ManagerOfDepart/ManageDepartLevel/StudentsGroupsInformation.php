<?php

namespace App\Livewire\ManagerOFdepart\Managedepartlevel;

use App\Models\Group;
use App\Models\Level;
use App\Traits\Searchable;
use App\Traits\Studentsable;
use App\Traits\Groupsable;
use Livewire\Component;

class StudentsGroupsInformation extends Component
{
    use Searchable,Groupsable,Studentsable{
        Groupsable::selected as selectedGroup;
        Studentsable::selected  insteadof Groupsable;
        Studentsable::setGender  insteadof Groupsable;
        Studentsable::setSystem insteadof Groupsable;
        Groupsable::setGender as setGenderGroup;
        Groupsable::setSystem as setSystemGroup;}
    public $level;
    public $group;

    public function mount(Level $level,Group $group)
    {
        $this->level = $level;
        $this->group = $group;
        $this->initializeGroupsable();
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
        return view('livewire.managerOFdepart.managedepartlevel.students-groups-information',[
            'students' => $this->students
        ]);
    }
}
