<?php

namespace App\Livewire\Components\Nav\Student;

use Livewire\Component;

class NavStudAssignements extends Component
{
    public $activeTab = 'all';
    public $practical ;
    public $subject = null;
    public $name = null;
    public $subjects = [];


    public function mount()
    {
        if (request()->has('active')) {
            if (array_intersect(['notSent', 'send'], [request()->active])) {
                switch (request()->active) {
                    case 'notSent':
                        $this->activeTab = 'not_delivered';
                        break;
                    case 'send':
                        $this->activeTab = 'delivered';
                        break;
                    default:
                        $this->activeTab = 'all';
                        break;
                }
        }else{
            $this->activeTab = 'all';
        }
        }

        $this->name = array_search($this->subjects,array_column($this->subjects,'code'))===false&&!is_null($this->subject)?
        $this->subjects[array_search($this->subject, array_column($this->subjects, 'code'))]['name']
        :'جميع المواد';
        // dd(array_search($this->subjects,array_column($this->subjects,'code'))===false&&!is_null($this->subject)?
        //             $this->subjects[array_search($this->subject, array_column($this->subjects, 'code'))]['name']
        //             :'جميع المواد');
    }
    public function render()
    {
        return view('livewire.components.nav.student.nav-stud-assignements');
    }
}
