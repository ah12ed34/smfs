<?php

namespace App\Livewire\Components\Nav\ManagerOfDepart;

use Livewire\Component;

class ManagDepartMain extends Component
{
    public $active = [
        'tab' => 'departmentLevels',
        // 'tab' =>'departmentNotifications',
        // 'tab' =>'departmentStatistics',
        // 'tab' => 'departmentStatistics'
    ];
//     public $active_noti = [
//         'tab' => 'departmentNotifications',
// ];
// public $active_Stasti = [
//     'tab' => 'departmentStatistics',
// ];
    public function render()
    {
        return view('livewire.components.nav.managerOFdepart.manag-depart-main');
    }
}
