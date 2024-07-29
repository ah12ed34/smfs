<?php

namespace App\Livewire\StudentsAffairs;

use Livewire\Component;
use App\Models\Level;
use App\Models\User;
use Livewire\WithFileUploads;
use App\Traits\Searchable;
use App\Traits\Studentsable;
use App\Models\Department;

class StudentsAffairsMainStudentsInformation extends Component
{
    use Searchable, Studentsable;
    use WithFileUploads;
    public $level;
    public $departments;


    public function mount(Level $LId)
    {
        $this->level = $LId;
        $this->departments = Department::all();
        $this->sortField = 'name';
    }

    public function setDepartment($id)
    {
        if($this->departments->contains($id)){
            $this->department_id = $id;
        }
    }

    public function addStudent()
    {
        if($this->studentData){
            $this->resetStudent();
        }
        $this->is_active = true;
        $this->level_id = $this->level->id;
        $this->department_id = $this->level->department_id;
    }




    public function getStudentsProperty()
    {
        $students = User::whereHas('student', function ($q) {
            $q->where('level_id', $this->level->id);
        })
            ->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%')
                    ->orWhere('id', 'like', '%' . $this->search . '%')
                    ->orWhere('username', 'like', '%' . $this->search . '%')
                    ->orWhereRaw("concat(name,' ',last_name) like ?", ['%' . $this->search . '%']);
            })
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
            // dd($students);
            return $students;
    }


    public function render()
    {
        return view('livewire.students-affairs.students-affairs-main-students-information', ['students' => $this->students]);
    }
}
