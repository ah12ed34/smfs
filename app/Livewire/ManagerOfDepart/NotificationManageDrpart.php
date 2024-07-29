<?php

namespace App\Livewire\ManagerOfDepart;

use Livewire\Component;

class NotificationManageDrpart extends Component
{
    public $active_noti = [
        'tab' => 'departmentNotifications',
];
public function render()
    {
        return view('livewire.managerOFdepart.notification-manage-drpart');
    }
}
