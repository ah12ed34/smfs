<?php

namespace App\Livewire\ManagerOFdepart\Managedepartlevel;

use App\Models\Academic;
use App\Models\Level;
use App\Traits\EmployeeTrait;
use App\Traits\Searchable;
use Livewire\Component;

class DepartLevelAcademicl extends Component
{
    use Searchable,EmployeeTrait;
    public $level;
    public function mount(Level $level)
    {
        $this->level = $level;
    }

    public function TeachingSubjects()
    {
        if($this->employeeData){
            // dd($this->EmployeesR?->getTeachingSubjectsByLevel(Academic::where('user_id',$this->employeeData->id)->first(),$this->level->id)->get()->toArray());
           return implode(', ', $this->EmployeesR?->getTeachingSubjectsByLevel(Academic::where('user_id',$this->employeeData->id)->first(),$this->level->id)->get()->pluck('subject')->toArray());
        }
        return '';
        // $this->EmployeesR?->getSubjectsTeachering($this->employeeData);
    }
    public function TeachingGroups()
    {
        if($this->employeeData){
            return implode(', ', $this->EmployeesR?->getTeachingSubjectsByLevel(Academic::where('user_id',$this->employeeData->id)->first(),$this->level->id)->get()->pluck('group')->unique()->toArray());
        }
        return '';
    }
    public function getAcademicsProperty()
    {
        $academics =
        $this->EmployeesR?->getAcademicsByLevel($this->level->id)
        ->whereHas('user', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%')
                ->orWhere('id', 'like', '%' . $this->search . '%');
                if(in_array($this->sortField, ['name','email','phone','id','created_at','updated_at','username'])) {
                    $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
                }
        });
        if(in_array($this->sortField, ['user_id','academic_name'])) {
            $academics = $academics->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        }
        return $academics->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.managerOFdepart.managedepartlevel.depart-level-academicl', [
            'academics' => $this->academics,
            'teachingSubjects' => $this->TeachingSubjects(),
            'TeachingGroups' => $this->TeachingGroups(),
        ]);
    }
}
