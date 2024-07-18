<?php

namespace App\Livewire\Components\Nav\ManagerOFdepart\Managedepartlevel;

use Livewire\Component;
use App\Traits\Searching;
use PHPUnit\Metadata\Api\Groups;

class AllSechedulesStudyinhgHeader extends Component
{
    use Searching;
    public $level;
    public $parameter ;
    public $groups;
    public $teachers;
    public $routeName;
    public $active = [
        'tab' => 'schedules',
    ];
    public function mount(array $active = null)
    {
        $this->initializeSearching();
        $this->parameter = $this->parameters;
        if($active){

            $this->active = array_merge($this->active, $active);
            // dd($active);
        }
        $this->routeName = request()->route()->getName();
    }
    public function render()
    {
        return view('livewire.components.nav.managerOFdepart.managedepartlevel.all-sechedules-studyinhg-header');
    }
}
