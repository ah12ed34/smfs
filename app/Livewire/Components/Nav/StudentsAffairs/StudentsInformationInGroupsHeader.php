<?php

namespace App\Livewire\Components\Nav\StudentsAffairs;

use Livewire\Component;

class StudentsInformationInGroupsHeader extends Component
{
    public $level;
    public $search;
    public $isP ;
    public $backUrl;

    public function mount(){
        if($this->isP){
            $this->backUrl = route('studentsAffairs_main_studentsGroups',[$this->level?->id,'type'=>'sub']);
        }else{
            $this->backUrl = route('studentsAffairs_main_studentsGroups',[$this->level?->id]);
        }
    }

    public function srch()
    {
        $this->dispatch('search', $this->search);
    }
    public function render()
    {
        return view('livewire.components.nav.students-affairs.students-information-in-groups-header');
    }
}
