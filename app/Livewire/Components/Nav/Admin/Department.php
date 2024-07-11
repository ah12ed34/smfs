<?php

namespace App\Livewire\Components\Nav\Admin;

use Livewire\Component;
use App\Models\Department as DepartmentModel;
use App\Models\Academic;
// use App\Models\Department; (remove this line)
class Department extends Component
{
    public $card_notification;
    public $active;
    public $depa;
    public $departments;
    public $search_model = '';

    public function mount()
    {
        $this->departments = DepartmentModel::all();
    }

    public function search(){

        $this->dispatch('search',$this->search_model);
    }

    public function addacademic(){
        $this->dispatch('addacademic');
    }
    public function department(){
        $this->depa->department_id = $this->depa->department_id;
        $this->dispatch('department',$this->depa);
    }
    public function render()
    {
        // $departments = DepartmentModel::find($this->depa->department_id);
        // $levels = $department->levels()->get();
        // $departments = DepartmentModel::where( $departments->department_id)->get();
    
        return view('livewire.components.nav.admin.department');
    }
}
