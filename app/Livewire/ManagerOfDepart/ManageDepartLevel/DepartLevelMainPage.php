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

    public function mount(Level $level){
        $this->level = $level;
        $this->initializeGroupsable();
    }


    public function getGroupsProperty(){
        return $this->level->groups;
    }

    public function render()
    {
        return view('livewire.managerOFdepart.managedepartlevel.managedepart-level-mainpage');
    }
}
