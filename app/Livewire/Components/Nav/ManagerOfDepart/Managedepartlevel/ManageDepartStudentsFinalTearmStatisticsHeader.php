<?php

namespace App\Livewire\Components\Nav\ManagerOFdepart\Managedepartlevel;

use Livewire\Component;
use App\Traits\Searching;

class ManageDepartStudentsFinalTearmStatisticsHeader extends Component
{
    use Searching;
    public $level;
    public $parameter ;
    public $groups;
    public $subjects;
    public $terms;
    public $active = [
        'group' => 'all',
        'subject' => 'all',
        'term' => '1',
        'tab' => 'statistics',
    ];
    public function mount()
    {
        $this->initializeSearching();
        $this->parameter = $this->parameters;

    }
    public function render()
    {
        return view('livewire.components.nav.managerOFdepart.managedepartlevel.manage-depart-students-final-tearm-statistics-header');
    }
}
