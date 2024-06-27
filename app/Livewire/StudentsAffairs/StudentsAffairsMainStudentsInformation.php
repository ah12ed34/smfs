<?php

namespace App\Livewire\StudentsAffairs;

use Livewire\Component;
use App\Models\Level;
use App\Models\User;
use App\Tools\MyApp;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;

class StudentsAffairsMainStudentsInformation extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $level;
    public $parPage = MyApp::parPage;
    public $search;
    public $sortField;
    public $sortAsc = true;

    public $studentData;

    public $photo;
    public $username;
    public $email;
    public $phone;
    public $name;
    public $gender;
    public $password;
    public $password_confirmation;
    public $department_id;
    public $level_id;
    public $is_active;
    public $system;
    public $birthday;



    public function mount(Level $LId)
    {
        $this->level = $LId;
        $this->sortField = 'name';
    }

    public function sortBy($field)
    {
        if ($this->sortField == $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }
    #[On('search')]
    public function search($v)
    {
        $this->search = $v;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingParPage()
    {
        $this->resetPage();
    }

    public function selected($id){
        $this->studentData = $this->students->where('id',$id)->firstOrFail();
    }

    public function showStudent($id)
    {
        $this->selected($id);
        $this->studentData->show = true;
    }

    public function deleteStudent()
    {
        $this->studentData->delete();
    }

    public function editStudent($id)
    {
        $this->selected($id);
        $this->studentData->edit = true;

        $this->username = $this->studentData->username;
        $this->email = $this->studentData->email;
        $this->phone = $this->studentData->phone;
        $this->name = $this->studentData->name;
        $this->gender = $this->studentData->gender;
        $this->birthday = $this->studentData->birthday;
        $this->department_id = $this->studentData->student->department_id;
        $this->level_id = $this->studentData->student->level_id;
        $this->is_active = $this->studentData->student->is_active;
        $this->system = $this->studentData->student->system;


    }

    public function getStudentsProperty()
    {
        $students = User::whereHas('student', function ($q) {
            $q->where('level_id', $this->level->id);
        })
            ->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->parPage);

            return $students;
    }


    public function render()
    {
        return view('livewire.students-affairs.students-affairs-main-students-information'
            , ['students' => $this->students]);
    }
}
