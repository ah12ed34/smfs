<?php

namespace App\Livewire\Globle\Levelsubject;

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
        return view('livewire.globle.levelsubject.index',[
            'levels' => $this->level
        ]);
    }
}
