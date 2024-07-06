<?php

namespace App\Livewire\Student\StudStudyingBooks;

use App\Models\Group;
use App\Models\GroupStudents;
use App\Models\Subject;
use App\Tools\MyApp;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Repositories\SubjectsRepository;
use App\Traits\Tools;

class StudStudyingBooks extends Component
{
    use WithPagination,Tools;
    public $user;
    public $search;
    public $perPage = MyApp::perPageLists;
    public $terms;
    public $term = null;

    protected $SubjectsR ;
    public $group_students = null;

    public function __construct()
    {
        $this->SubjectsR =  new SubjectsRepository();
    }
    public function mount()
    {
        $this->user = auth()->user();

        $this->terms = $this->getLevels();

        if(request()->has('term')){
            $t = request()->term;
            if(is_numeric($t)){
                $this->term = $t;
                $this->SubjectsR->setTerm($t);
            }
        }
        if(request()->has('g')){
            if(is_numeric(request()->g)){
                $this->group_students = GroupStudents::where('student_id',$this->user->id)->where('id',request()->g)->firstOrFail();
            }
        }
        // dd($this->term);
    }

    public function getLevels(){
        $levels = $this->SubjectsR->getLevelsStudent($this->user->student);
        $array = [];
        if(is_array($levels)&& count($levels)>0){

            foreach($levels as $value){
                    if(is_array($value['term'])){
                        foreach($value['term'] as $v){
                            $array[] = ['id'=>$value['gs']->id,'term'=>$v,
                            "name"=>$value['level']->name." | الترم ".$this->numberToOrdinal($v),
                        ];
                        }
                    }
            }
        }

            return $array;
    }


    public function getSubjectsProperty()
    {
        $subjects =($this->SubjectsR->getSubjectsStudent($this->user->student,$this->group_students));
    //     $subjects = Subject::join('subjects_levels', 'subjects.id', '=', 'subjects_levels.subject_id')
    //     ->join('group_subjects', 'subjects_levels.id', '=', 'group_subjects.subject_id')
    //     ->join('groups', 'group_subjects.group_id', '=', 'groups.id')
    //     ->join('group_students', 'groups.id', '=', 'group_students.group_id')
    //     ->join('users', 'group_subjects.teacher_id', '=', 'users.id')
    //     ->where('group_students.student_id', $this->user->id)
    //     ->select(['group_subjects.*','subjects.*','group_subjects.id as group_subject_id',
    //             DB::raw("CONCAT(users.name, ' ', users.last_name) as teacher_name")
    //         ]);

    // $subjects->where(function($query) {
    //     $query->where('group_subjects.is_practical', 0)
    //           ->orWhereNotIn('group_subjects.id', function($subquery) {
    //               $subquery->select('group_subjects.id')
    //                       ->from('group_subjects')
    //                       ->where('is_practical', 1)
    //                       ->whereIn('subject_id', function($innerSubquery) {
    //                           $innerSubquery->select('subject_id')
    //                                         ->from('group_subjects')
    //                                         ->where('is_practical', 0);
    //                       });
    //           });
    // });
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
