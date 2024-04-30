<?php

namespace App\Livewire\Academic\Student;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Illuminate\Support\Collection;

class Students extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $group_subject;
    public $search;
    public $perPage = 10;
    public $student_selected ;
    // public $total = [];
    // public $persents = [];
    // public $final_exem = [];
    // public $helf_exem = [];
    // public $addional_grades = [];




    public function updatingSearch()
    {
        $this->resetPage();
    }
    #[On('search')]
    public function search($v){
        $this->search = $v;
    }

    public function mount($group_subject)
    {
        $this->group_subject = $group_subject;
        // $this->getPageData();

    }

    public function updatingPage($page)
    {
        // $this->getPageData($page);
    }

public function getData($user_id,$returnData)
{
    if(!$user_id) return 0;
    $id = $this->group_subject->students()->where('user_id',$user_id)->first()->pivot->id;
    $studying = null ;
    if($this->group_subject->studying){
        // dd($this->group_subject->studying);
        $studying = $this->group_subject->studying->where('student_id', $id)->first();
    }
    if(!$studying) return 0;
    switch($returnData){
        case 'total':
            $x = 0;
            for ($i = 1; $i < 16; $i++) {
                switch ($studying->{'persents' . $i}) {
                    case 'present':
                    case 'permit':
                        $x++;
                        break;
                    case 'late':
                        $x += 0.5;
                        break;
                }
            }
            return $x + ($studying->addional_grades ?? 0) + ($studying->helf_exem ?? 0) + ($studying->final_exem ?? 0);
        case 'persents':
            $x = 0;
            for ($i = 1; $i < 16; $i++) {
                switch ($studying->{'persents' . $i}) {
                    case 'present':
                    case 'permit':
                        $x++;
                        break;
                    case 'late':
                        $x += 0.5;
                        break;
                }
            }
            return $x;
            case 'final_exem':
                return $studying->final_exem ?? 'لم يتم رصد البيانات';
            case 'helf_exem':
                return $studying->helf_exem ?? 'لم يتم رصد البيانات';
            case 'addional_grades':
                return $studying->addional_grades ?? 0;
    }
}

    public function select($id)
    {
        $this->student_selected = $this->group_subject->students()->where('user_id',$id)->first();
    }

    public function getStudentsProperty()
    {
        // dd($this->group_subject->students);
        $students = $this->group_subject->getStudentsInGroupBySubject($this->search)
            ->paginate($this->perPage);

        // $students = $students->map(function($student) {
        //     $student->studying = $this->group_subject->studying->where('student_id', $student->pivot->id)
        //     ->first();
        //     return $student;
        // });

        return $students;
    }

    public function render()
    {
        return view('livewire.academic.student.students', [
            'students' => $this->students
        ]);
    }
}
