<?php

namespace App\Livewire\ManagerOfDepart\ManageDepartLevel;

use App\Models\Level;
use App\Traits\Groupsable;
use App\Traits\Searchable;
use Livewire\Component;

class DepartLevelMainPage extends Component
{
    use Groupsable,Searchable;

    public $level;
    // public $typeGroup = 'main';

    public function mount(Level $level){
        $this->level = $level;
        $this->initializeGroupsable();
        $this->PracticalOrTheoretical();
    }


    public function getGroupsProperty(){
        $groups =  $this->level->groups()
        ->where(function ($q) {

            $q->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('id', 'like', '%' . $this->search . '%');
        })
        ->when($this->typeGroup != 'sub', function ($q) {
            $q->whereNull('group_id');
        }, function ($q) {
            $q->whereNotNull('group_id');
        })
        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
        ->paginate($this->perPage);

        return $groups;
    }

    public function render()
    {
        return view('livewire.managerOFdepart.managedepartlevel.managedepart-level-mainpage',[
            'groups' => $this->groups
        ]);
    }
}
