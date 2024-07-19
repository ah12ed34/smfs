<?php

namespace App\Livewire\ManagementOFSechedules;

use App\Models\Department;
use App\Traits\Searchable;
use App\Traits\ToolsNav;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AcademicsSechedules extends Component
{
    use ToolsNav,Searchable;
    public Department $department;

    public function mount()
    {
        $this->initializeToolsNav($this->department->levels->first(),['term','type']);
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
        ->paginate($this->perPage);
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
