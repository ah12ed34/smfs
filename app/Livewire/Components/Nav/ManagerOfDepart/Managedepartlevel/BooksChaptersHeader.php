<?php

namespace App\Livewire\Components\Nav\ManagerOFdepart\Managedepartlevel;

use Livewire\Component;
use App\Traits\Searching;

class BooksChaptersHeader extends Component
{
    use Searching;
    public $level;
    public $parameter ;
    public function mount()
    {
        $this->initializeSearching();
        $this->parameter = $this->parameters;

    }
    public function render()
    {
        return view('livewire.components.nav.managerOFdepart.managedepartlevel.books-chapters-header');
    }
}
