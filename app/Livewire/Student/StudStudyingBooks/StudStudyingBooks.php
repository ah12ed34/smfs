<?php

namespace App\Livewire\Student\StudStudyingBooks;

use Livewire\Component;
use Livewire\WithPagination;

class StudStudyingBooks extends Component
{
    use WithPagination;
    public $user;
    public $search;
    public $perPage = 5;

    public function mount()
    {
        $this->user = auth()->user();

    }


    public function getSubjectsProperty()
    {
        // $subjects = $this->user->student->groups->last()->groupSubjects->map(function ($groupSubject) {
        //     return $groupSubject->subjects;
        // })->flatten();
    // dd($subjects);
    // dd($subjects->paginate(5));
    //paginate
        // dd(
        //     $this->user->student->groups
        //     ->where('group_id',null)
        //     ->last()
        //     ->groupSubjects()->with(['subjects','teacher'])
        //     ->paginate(5)
        // ->flatten()
        // );
        $subjects = $this->user->student->groups
        ->where('group_id',null)
        ->last()
        ->groupSubjects()->with(['subjects','teacher'])
        ->paginate(5)
        ;;
        return $subjects;
    }
    public function render()
    {
        return view('livewire.student.stud-studying-books.stud-studying-books'
        ,[
            'subjects' => $this->subjects,
        ]);
    }
}
