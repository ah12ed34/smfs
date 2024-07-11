<?php

namespace App\Livewire\Components\Nav\Academic;

use Livewire\Component;
use App\Models\Group;
use App\Traits\Searching;

class Students extends Component
{
    use Searching;
    public $active ;
    public $urlName = 'students';
    public $group_subject;
    // public $otherGroups;
    // public $search;

    public function mount($group_subject)
    {
        $this->group_subject = $group_subject;
        $this->urlName = request()->route()->getName();
        // $this->otherGroups = $this->group_subject->getOtherGroups();


    }

    // public function srch(){
    //     $this->dispatch('search', $this->search);
    // }

    public function render()
    {
        return view('livewire.components.nav.academic.students');
    }
}
