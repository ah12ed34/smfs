<?php

namespace App\Livewire\ManagerOfDepart;

use Livewire\Component;

class ManageDepartStastistic extends Component
{
    public $statistics ;
    public $department ;

    public function mount()
    {
        $this->department = auth()->user()->academic->department;

        $this->statistics = [
            'Academics' => $this->department->academics->count(),
            // 'Students' => $this->department->students->count(),
            // 'Employees' => $this->department->employees->count(),
            'Levels' => $this->department->levels->count(),
            'Groups' => $this->department->groups('not_practical')->count(),
            'Practical Groups' => $this->department->groups('practical')->count(),
        ];
        $this->statistics['Students'] = $this->department->levels->sum(function($level){
            return $level->students->count();
        });
        $this->statistics['Subjects'] = $this->department->levels->sum(function($level){
            return $level->subjects->filter(function($subject){
                return $subject->pivot->isActivated == 1;
            })->count() ;
        });
        $this->statistics['Teachers'] = $this->department->academics->where('academic_name','!=','assistant_professor')->count();
        $this->statistics['AssistantTeachers'] = $this->department->academics->where('academic_name','assistant_professor')->count();
    }

    public function render()
    {
        return view('livewire.managerOFdepart.manage-depart-stastistic'
        ,['statistics' => $this->statistics]);
    }
}
