<?php

namespace App\Livewire\Academic\Student;

use App\Models\Student;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class StudentsPersents extends Component
{
    use WithPagination;
    public $group_subject;
    public $search;
    public $sortField = 'name';
    public $sortAsc = true;
    public $perPage = 10;
    public $studying ;
    public $lecture = [] ;
    public function mount($group_subject)
    {
        $this->group_subject = $group_subject;

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

    public function sevePersents()
    {

        foreach ($this->lecture as $keyX => $value) {

            $id = $this->group_subject->students()->where('user_id',$keyX)->first()->pivot->id;
            // dd($this->group_subject->studying);
            $studying = null ;
            if(!$this->group_subject->studying){
                dd($this->group_subject->studying);
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

    #[On('search')]
    public function search($search)
    {
        $this->search = $search;
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
        return $this->group_subject->getStudentsInGroupBySubject($this->search)
        ->paginate($this->perPage);
    }
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }


    public function render()
    {
        return view('livewire.academic.student.students-persents',[ 'students' => $this->students]);
    }
}
