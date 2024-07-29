<?php

namespace App\Livewire\Components\Nav\ManagerOFdepart\Managedepartlevel;

use Livewire\Component;
use App\Traits\Searching;
use app\Models\Department;

class BooksChaptersHeader extends Component
{
    use Searching;
    public $level;
    public $parameter ;
    public $active = [
        'tab' => 'books',
    ];
    public $user;
   
   
    public function mount()
    {
        // $this->user = auth()->user();
        $this->initializeSearching();
        $this->parameter = $this->parameters;

    }
    //  public function getLevelsProperty()
    // {
    //     return Department::FindOrFail($this->user?->academic?->department_id)->levels;
    // }
    public function render()
    {
        return view('livewire.components.nav.managerOFdepart.managedepartlevel.books-chapters-header');
    }
}
