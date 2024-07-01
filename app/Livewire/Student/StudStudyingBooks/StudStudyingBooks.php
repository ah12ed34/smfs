<?php

namespace App\Livewire\Student\StudStudyingBooks;

use App\Models\Subject;
use App\Tools\MyApp;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class StudStudyingBooks extends Component
{
    use WithPagination;
    public $user;
    public $search;
    public $perPage = MyApp::perPageLists;

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
        // $subjects = $this->user->student->groups
        // ->where('group_id',null)
        // ->last()
        // ->groupSubjects()
        // ->with(['subjects','teacher'])
        // ->paginate($this->perPage)
        // ;;
        // $subjects = Subject::join('subjects_levels', 'subjects.id', '=', 'subjects_levels.subject_id')
        //     ->join('group_subjects', 'subjects_levels.id', '=', 'group_subjects.subject_id')
        //     ->join('groups', 'group_subjects.group_id', '=', 'groups.id')
        //     ->join('group_students', 'groups.id', '=', 'group_students.group_id')
        //     ->where('group_students.student_id', $this->user->id)
        //     ->where('groups.group_id',null)
        //     ->where('group_subjects.is_practical',0)
        //     ->select(['group_subjects.*','subjects.*'])
        ;

        $subjects = Subject::join('subjects_levels', 'subjects.id', '=', 'subjects_levels.subject_id')
        ->join('group_subjects', 'subjects_levels.id', '=', 'group_subjects.subject_id')
        ->join('groups', 'group_subjects.group_id', '=', 'groups.id')
        ->join('group_students', 'groups.id', '=', 'group_students.group_id')
        ->join('users', 'group_subjects.teacher_id', '=', 'users.id')
        ->where('group_students.student_id', $this->user->id)
        ->select(['group_subjects.*','subjects.*','group_subjects.id as group_subject_id',
                DB::raw("CONCAT(users.name, ' ', users.last_name) as teacher_name")
            ]);

    $subjects->where(function($query) {
        $query->where('group_subjects.is_practical', 0)
              ->orWhereNotIn('group_subjects.id', function($subquery) {
                  $subquery->select('group_subjects.id')
                          ->from('group_subjects')
                          ->where('is_practical', 1)
                          ->whereIn('subject_id', function($innerSubquery) {
                              $innerSubquery->select('subject_id')
                                            ->from('group_subjects')
                                            ->where('is_practical', 0);
                          });
              });
    });
        // $subjects = Subject::join('subjects_levels', 'subjects.id', '=', 'subjects_levels.subject_id')
        //     ->join('group_subjects', 'subjects_levels.id', '=', 'group_subjects.subject_id')
        //     ->join('groups', 'group_subjects.group_id', '=', 'groups.id')
        //     ->join('group_students', 'groups.id', '=', 'group_students.group_id')
        //     ->where('group_students.student_id', $this->user->id)
        //     ->where(function($query) {
        //         $query->whereNot('subjects_levels.has_practical', true)
        //               ->orWhereNotNull('subjects_levels.has_practical');
        //     })
        //     ->select(['group_subjects.*','subjects.*'])
        //     ;

    //     dd($subjects,
    //     $subjects->get(),
    //     // $subjects_isparctical,
    //     // $subjects_isparctical->get(),
    //     // $subjects_ispractical_query->get(),
    // );
        return $subjects->paginate($this->perPage);
    }
    public function render()
    {
        return view('livewire.student.stud-studying-books.stud-studying-books'
        ,[
            'subjects' => $this->subjects,
        ]);
    }
}
