<?php

namespace App\Livewire\Components\Nav\Admin;

use Livewire\Component;

class StudentsInformationInGroupsHeader extends Component
{
    public $level;
    public $search;
    public $isP ;
    public $backUrl;

    public function mount(){
        if($this->isP){
            $this->backUrl = route('students_main_groups',[$this->level?->id,'type'=>'sub']);
        }else{
            $this->backUrl = route('students_main_groups',[$this->level?->id]);
        }
    }

    public function srch()
    {
        $this->dispatch('search', $this->search);
    }
    public function render()
    {
        return view('livewire.components.nav.admin.students-information-in-groups-header');
    }
}
