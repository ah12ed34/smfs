<?php

namespace App\Livewire;

use App\Models\group;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\Client\Request;

class AddStudent extends Component
{
    use WithPagination;
    public $paginationTheme = 'bootstrap';
    // public $students;
    public $group;
    public $selected = [];
    public $selectedRealey = [];
    public $selectPage ;
    public $search = '';
    public $max = 0;
    public $page = 1;
    public $count = 0;
    public $perPage = 10;
    public $sortField = 'user_id';
    public $sortAsc = true;
    public $refresh = false;
    public $selectedAll = false;
    public $maxSelected = 0;
    public $selectedStudents = [];
    public $pagination = 'students';
    // protected $listeners = ['saved' => '$refresh'];

    public function mount(group $group)
    {
        $this->group = $group;

        $this->max = $this->group->max_students;
        // dd($this->group->students);
        if ($group->students) {
            $this->selected = $group->students->pluck('user_id')->mapWithKeys(function($itme){
                return [$itme => true];
            } )->toArray();
        } else {
            $this->selected = [];
        }

        // $this->count = $this->students->count();
        $this->refresh = false;
        $this->selectedAll = false;
        $this->page = $this->students->currentPage();
        if($this->page > $this->students->lastPage()){
            redirect()->
            route('group.add-student',  [$group , 'page' => $this->students->lastPage()]);
        }

    }


    public function updatingSelected()
    {
        // if(count($this->selected) >= $this->max){
        //     $this->selected = array_slice($this->selected, 0, $this->max-1, true);
        // }
    }

    public function checkSelectedAll(){
        $bool = true;
        if($this->selected < count($this->students)){
            $bool = false;
        }else
        foreach($this->students as $student){
            if(!isset($this->selected[$student->user_id])){
                $bool = false;
                break;
            }
        }
        $this->selectedAll = $bool;
    }

    public function updatedSelected($value, $key)
    {
        if($value){
            if(count($this->selected) > $this->max){
                unset($this->selected[$key]);
                if(count($this->selected) > $this->max){
                    $this->selected = array_slice($this->selected, 0, $this->max, true);
                }
            }

        }else{
            unset($this->selected[$key]);
        }

        $this->checkSelectedAll();
    }




    public function updatedSelectedAll($value, $key)
    {
        if ($value) {
            $this->selected += $this->students->pluck('user_id')->mapWithKeys(function($itme){
                return [$itme => true];
            } )->toArray();
            if(count($this->selected) >= $this->max){
                $this->selected = array_slice($this->selected, 0, $this->max, true);
            }
        } else {
            $this->students->each(function($student){
                unset($this->selected[$student->user_id]);
            });
        }
        $this->count = count($this->selected);
        $this->checkSelectedAll();

    }


    public function updatedSelectPage($value)
    {

    }


    public function updatedPerPage($perPage)
    {
        $this->perPage = $perPage;
        $this->resetPage();

    }
    public function updatedPage($page)
    {
        $this->page = $page;
        if($this->page > $this->students->lastPage()){

            $this->resetPage();

        }
        $this->checkSelectedAll();


    }

    public function updatedSortField($sortField)
    {
        $this->sortBy($sortField);
    }

    public function updatedSortAsc($sortAsc)
    {
        $this->sortAsc = $sortAsc;
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





    public function updatedSearch()
    {
        $this->resetPage();
    }




    public function save(){

        $this->validate([
            'selected' => 'array|max:'.$this->max,
        ]);

        $existingStudentIds = $this->group->students->pluck('user_id')->toArray();
        $date = now();
        $studentData = [];

        foreach ($this->selected as $key => $value) {
            if (!in_array($key, $existingStudentIds)) {
                $studentData[$key] = ['created_at' => $date, 'updated_at' => $date];
            }
        }

        if (!empty($studentData)) {
            $this->group->students()->syncWithoutDetaching($studentData);
        }
        $unselected = array_diff($existingStudentIds, array_keys($this->selected));
        if (!empty($unselected)) {
            $this->group->students()->detach($unselected);
        }




        // try {
        //     DB::beginTransaction();
        //     $this->group->students()->sync($studentData);
        //     DB::commit();
        // } catch (Exception $e) {
        //     DB::rollBack();
        //     $this->dispatch('alert', ['type' => 'error',  'message' => 'حدث خطأ ما']);
        //     return;
        // }
        $studentData = [];

        // $this->dispatch('alert', ['type' => 'success',  'message' => 'تمت الاضافة بنجاح']);
        session()->flash('message', 'تمت الاضافة بنجاح');
        $this->resetPage();
    }


        public function getStudentsProperty(){
            // $students = Student::where('level_id', $this->group->level_id)
            // // ->join('users', 'students.user_id', '=', 'users.id')
            // // ->where('users.name', 'like', '%'.$this->search.'%')
            // // ->orWhere('user_id', 'like', '%'.$this->search.'%')
            // ->leftJoin('group_students', function ($join) {
            //     $join->on('students.user_id', '=', 'group_students.student_id')
            //         ->where('group_students.group_id', '!=', $this->group->id);
            // })
            // ->whereNull('group_students.student_id')
            // ->join('users', 'students.user_id', '=', 'users.id')
            // ->where('users.name', 'like', '%'.$this->search.'%')
            // ->orWhere('students.user_id', 'like', '%'.$this->search.'%')
            // ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            // ->paginate($this->perPage);

            $students = Student::where('level_id', $this->group->level_id)
                ->join('users', 'students.user_id', '=', 'users.id')
                ->where(function ($query) {
                    $query->where('users.name', 'like', '%' . $this->search . '%')
                    ->orWhere('students.user_id', 'like', '%' . $this->search . '%');
                })
                ->whereNotExists(function ($query) {
                    $query->select(DB::raw(1))
                    ->from('group_students')
                    ->whereRaw('group_students.student_id = students.user_id')
                    ->where('group_students.group_id', '!=', $this->group->id);
                })
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage);

            return $students;
        }

    public function render()
    {
        return view('livewire.add-student' ,[
            'students' => $this->students ,
        ]);
    }
}
