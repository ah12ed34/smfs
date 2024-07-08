<?php

namespace App\Livewire\Components\Nav\Admin;

use Livewire\Component;
use App\Models\Department as DepartmentModel;
use App\Models\Academic;
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
    public function render()
    {

        return view('livewire.components.nav.admin.department');
    }
}
