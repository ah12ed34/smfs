<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Notifications extends Component
{

    public function setAN($a)
    {
        $this->dispatch('na', $a);
    }
    public function render()
    {
        return view('livewire.admin.notifications');
    }
}
