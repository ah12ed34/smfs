<?php

namespace App\Livewire\Components\Nav\Student\StudStudyingBooks;

use Livewire\Component;
use App\Traits\Searching;

class NavStudBooksChapters extends Component
{
    use Searching;
    public $group_subject;
    public $search;
    public $practical = false;
    public $active;
    public function mount()
    {
        if (request()->has('practical') && $this->group_subject->has_practical) {
            if (request()->practical == 'false') {
                $this->practical = false;
            } else {
                $this->practical = true;
            }
        }
    }
    public function render()
    {
        return view('livewire.components.nav.student.stud-studying-books.nav-stud-books-chapters');
    }
}
