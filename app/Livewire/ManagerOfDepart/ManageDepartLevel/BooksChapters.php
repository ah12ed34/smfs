<?php

namespace App\Livewire\ManagerOFdepart\Managedepartlevel;

use App\Models\Level;
use Livewire\Component;

class BooksChapters extends Component
{
    public $level;
    public function mount(Level $level)
    {
        $this->level = $level;
    }
    public function render()
    {
        return view('livewire.managerOFdepart.managedepartlevel.books-chapters');
    }
}
