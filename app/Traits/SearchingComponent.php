<?php

namespace App\Traits;

use Livewire\Component;

class SearchingComponent extends Component
{
    public $search;
    public $parameters ;
    public $qurey;
    public $routeName;
    public $active;
    public $terms;
    public $types;
    public $groups;
    public $subjects;
    public $teachers;
    public function initializeSearching(){
        $this->parameters = request()->route()->parameters();
        $this->qurey = request()->query();
        $this->routeName = request()->route()->getName();
    }

    public function srch(){
        $this->dispatch('search', $this->search);
    }
}
