<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Traits\EmployeeTrait;
use App\Traits\Searchable;
use App\Models\User;
use App\Models\Role;
use App\Models\Department;
class AllEmolpyeesInformation extends Component
{
    use EmployeeTrait,Searchable;


    public function mount(){
        $this->sortField = 'id';
        $this->initializeEmployeeTrait();
        // $this->roles = Role::all();
        // $this->departments = Department::all();
        // $this->rolesAll = Role::all();
    }

    public function addEmployeeModal(){
        if($this->openType != 'add'){
            $this->resetEmployee();
        }
        $this->openType = 'add';
    }

    public function getEmployeesProperty(){
        $users = User::whereDoesntHave('student');

        if($this->search){
            $users = $users->where('name','like','%'.$this->search.'%')
            ->orWhere('email','like','%'.$this->search.'%')
            ->orWhere('phone','like','%'.$this->search.'%')
            ->orWhere('username','like','%'.$this->search.'%')
            ->orWhere('academic_name','like','%'.$this->search.'%')
            ->orWhere('id','like','%'.$this->search.'%');
        }
                $users = $users->orderBy($this->sortField,$this->sortAsc ? 'asc' : 'desc');
        return $users->paginate($this->perPage);

    }
    public function render()
    {
        return view('livewire.admin.all-emolpyees-information',[
            'employees' => $this->employees
        ]);
    }
}
