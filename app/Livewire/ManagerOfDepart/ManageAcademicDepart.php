<?php

namespace App\Livewire\ManagerOfDepart;

use App\Traits\EmployeeTrait;
use App\Traits\Searchable;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ManageAcademicDepart extends Component
{
    use Searchable, EmployeeTrait;

    public function mount()
    {
        $this->initializeEmployeeTrait();
    }

    public function getAcademicsProperty()
    {
        return $this->EmployeesR->getAcademicsByDepartment(auth()->user()->academic->department_id)
        ->whereHas('user', function($q){
            $q->where('name', 'like','%'. $this->search . '%')
            ->orWhere('email', 'like','%'. $this->search . '%')
            ->orWhere('phone', 'like','%'. $this->search . '%')
            ->orWhere('username', 'like','%'. $this->search . '%')
            ->orWhere(DB::raw('CONCAT(name, " ", last_name)'), 'like','%'. $this->search . '%')
            ;
        })->paginate($this->perPage);

    }
    public function render()
    {
        return view('livewire.managerOFdepart.manage-academic-depart', [
            'academics' => $this->academics,
        ]);
    }
}
