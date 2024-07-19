<?php

namespace App\Livewire\ManagementOFSechedules;

use App\Models\Department;
use App\Traits\SchedulesTrait;
use App\Traits\Searchable;
use App\Traits\ToolsNav;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AcademicsSechedules extends Component
{
    use ToolsNav,Searchable,SchedulesTrait;
    public Department $department;

    public function mount()
    {
        $this->initializeToolsNav($this->department->levels->first(),['term','type']);
        if(request()->has('term')&&is_numeric(request()->term)){
            $this->term_id = request()->term;
        }else{
            $this->term_id = 1;
        }
    }

    public function getAcademicsParameters()
    {
        $this->sortField = 'user_id';
        return $this->department->Academics()->
        whereHas('user',function($user){
            return $user->where(DB::raw('CONCAT(name," ",last_name)'), 'like', '%'.$this->search.'%')
                ->orWhere('email','like','%'.$this->search.'%')
                ->orWhere('phone','like','%'.$this->search.'%')
                ->orWhere('id','like','%'.$this->search.'%')
                ->orWhere('username','like','%'.$this->search.'%');

            ;
        })
        ->orderBy($this->sortField,$this->sortAsc ? 'asc' : 'desc')
        ->get()
        ->filter(function($academic){
            return $academic->term == null || $academic->term->id == $this->term_id;
        })
        ->paginate($this->perPage)
        ;
    }


    public function render()
    {
        return view('livewire.managementOFsechedules.academics-sechedules',
        [
            'academics' => $this->getAcademicsParameters()
        ]
    );
    }
}
