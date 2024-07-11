<?php

namespace App\Livewire\Academic\Student;

use App\Models\GroupSubject;
use App\Models\Student;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Repositories\EmployeesRepository;
use App\Traits\Searchable;

class StudentsPersents extends Component
{
    use Searchable;
    public $group_subject;
    public $studying ;
    public $lecture = [] ;
    protected $AcademicR ;
    public function __construct()
    {
        $this->AcademicR = new EmployeesRepository();
    }
    public function mount(GroupSubject $group_subject)
    {
        if($group_subject->teacher_id != auth()->user()->academic->user_id)
            abort(403);
        $this->group_subject = $group_subject;
        $this->sortField = 'user_id';
    // Ensure that the studying relationship is loaded
    $group_subject->load('studying');

    foreach ($group_subject->students as $key => $student) {
        for ($i = 1; $i < 16; $i++) {
            // Check if studying relationship is loaded and not null
            if ($group_subject->studying && $group_subject->studying->where('student_id', $student->pivot->id)->first() != null) {
                $this->lecture[$student->user_id][$i] = $group_subject->studying->where('student_id', $student->pivot->id)->first()->{'persents' . $i};
            }
        }
    }
        // $this->group_subject = $group_subject;
        // foreach ($group_subject->students as $key => $student) {
        //     for ($i=1; $i < 16; $i++) {
        //         if($group_subject->studying->where('student_id',$student->pivot->id)->first() == null)
        //             continue;
        //         // dd($group_subject->studying->where('student_id',$student->pivot->id)->first());
        //         $this->lecture[$student->user_id][$i] = $group_subject->studying->where('student_id',$student->pivot->id)->first()->{'persents'.($i)};
        //     }
        // }
        // // dd($this->lecture);

    }

    public function savePersents()
    {

        foreach ($this->lecture as $keyX => $value) {

            $id = $this->group_subject->students()->where('user_id',$keyX)->first()->pivot->id;
            // dd($this->group_subject->studying);
            $studying = null ;
            if(!$this->group_subject->studying){
                // dd($this->group_subject->studying);
                $studying = $this->group_subject->studying()->create([
                    'student_id' => $id,
                    'subject_id' => $this->group_subject->id,
                ]);
            }else{
            $studying = $this->group_subject->studying->where('student_id',$id)->firstOrCreate(
                ['subject_id' => $this->group_subject->id,
                'student_id' => $id, ]
            );
            }
            foreach ($value as $keyY => $value) {
                $studying->{'persents'.($keyY)} = $value;
            }
            $studying->save();



        }

    }

    public function getStudentsProperty()
    {
        // not sutdying students is not is_compleated
        // return $this->group_subject->students()
        // ->whereHas('user', function ($query) {
        //     $query->where('name', 'like', '%' . $this->search . '%')->
        //     orWhere('email', 'like', '%' . $this->search . '%')
        //     ->orWhere('phone', 'like', '%' . $this->search . '%')
        //     ->orWhere('id', 'like', '%' . $this->search . '%');
        // })
        // ->whereNotIn('students.user_id', function ($query) {
        //     $query->select('group_students.student_id')
        //     ->from('group_students')
        //     ->where('group_id', $this->group_subject->group_id)
        //     ->join('studyings', 'group_students.id', '=', 'studyings.student_id')
        //     ->where('studyings.subject_id', $this->group_subject->id)
        //     ->where('studyings.is_completed', 1);
        // })
        // return $this->group_subject->getStudentsInGroupBySubject($this->search)
        // ->paginate($this->perPage);
        return $this->AcademicR->getStudentsInGroupBySubject($this->group_subject)
        ->whereHas('user', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')->
            orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('phone', 'like', '%' . $this->search . '%')
            ->orWhere('id', 'like', '%' . $this->search . '%');
        })
        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
        ->paginate($this->perPage);
        ;
    }


    public function render()
    {
        return view('livewire.academic.student.students-persents',[ 'students' => $this->students]);
    }
}
