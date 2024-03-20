<?php

namespace App\Livewire\global\Levelsubject;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function getLevelProperty()
    {
        return \App\Models\Level::paginate(10);
    }

    public function render()
    {
        return view('livewire.global.levelsubject.index',[
            'levels' => $this->level
        ]);
    }
}
