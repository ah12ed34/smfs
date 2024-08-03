<?php

namespace App\Livewire\Components\Academic\StudentsAffairs;

use App\Models\Group;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use App\Models\Student;
use App\Traits\Groupsable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class AddStudentsInGroup extends Component
{
    use WithPagination,
        WithoutUrlPagination,
        Groupsable;

    public $AddStudentsIntoGroup;
    public $group;
    public $students;
    public $selectedStudents = [];
    public $paginateName = 'students';
    public $selectAll = false;
    protected $listeners = ['refreshStudentsInGroup' => '$refresh'];

    public function __construct()
    {
        $this->initializeGroupsable();
    }

    public function mount()
    {
        if ($this->group) {
            $this->AddStudentsIntoGroup = true;
        } else {
            $this->AddStudentsIntoGroup = false;
        }
    }

    public function updatingSelectAll($value)
    {

        $ids = $this->studentsAdd->pluck('user_id')->toArray();
        foreach ($ids as $id) {
            if ($value) {
                $this->selectedStudents[] = $id;
            } else {
                if (($key = array_search($id, $this->selectedStudents)) !== false) {
                    unset($this->selectedStudents[$key]);
                }
            }
        }
        $this->selectAll = $value;
    }
    public function updatedSelectedStudents()
    {
        $this->getSelectAll();
    }
    // cheng page
    public function updatedPaginators($page)
    {
        // dd($page);
        $this->getSelectAll();
    }
    public function getSelectAll()
    {
        $ids = $this->studentsAdd->pluck('user_id')->toArray();
        foreach ($ids as $id) {
            if (!in_array($id, $this->selectedStudents)) {
                $this->selectAll = false;
                return false;
            }
        }
        $this->selectAll = true;
    }
    public function addSTGS()
    {

        $r = $this->StudentR->addStudentsInGroup($this->group, $this->selectedStudents);
        $this->selectedStudents = [];

        if (is_array($r)) {
            foreach ($r as $error) {
                $this->setErrors($error);
            }
        }

        if (!$this->getErrorBag()->any()) {
            $this->dispatch('refreshStudentsInGroup');
        }

        // $this->dispatch('refreshStudentsInGroup');
    }

    public function setErrors($errors)
    {
        match ($errors) {
            101 => $this->addError('addError1', 'This student is already in this group'),
            102 => $this->addError('addError2', 'This group is full'),
            103 => $this->addError('addError3', 'This group system not match student system'),
            104 => $this->addError('addError4', 'This group not match student'),
            default => $this->addError('addError5', 'Error occurred'),
        };
    }

    public function getStudentsAddProperty()
    {

        $students = $this->StudentR->getStudentsInOrNotInGroup($this->group)
            ->whereNotIn('user_id', $this->StudentR->getStudentsInGroup($this->group)->pluck('user_id')->toArray());

        if ($this->group->system && $this->group->system != 'all') {
            $students = $students->where('system', $this->group->system);
        }
        if ($this->group->gender && $this->group->gender != 'all') {
            $students = $students->whereHas('user', function ($query) {
                $query->where('gender', $this->group->gender);
            });
        }
        // dd( $students->paginate(8, $this->paginateName));
        // dd($students->get());
        return $students->paginate(8, ['*'], $this->paginateName);
    }


    public function render()
    {
        return view('livewire.components.academic.students-affairs.add-students-in-group',
            [
                'studentsAdd' => $this->studentsAdd
            ]
        );
    }
}
