<?php

namespace App\Livewire;

use App\Models\group;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
use Exception;



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
        $this->selected = [];
        // $this->count = $this->students->count();
        $this->refresh = false;
        $this->selectedAll = false;
        $this->page = $this->students->currentPage();

    }


    public function updatingSelected()
    {
        // if(count($this->selected) >= $this->max){
        //     $this->selected = array_slice($this->selected, 0, $this->max-1, true);
        // }
    }

    public function checkSelectedAll(){
        $bool = true;
        if($this->perPage > count($this->students)){
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
        dd($this->students);
        $this->validate([
            'selected' => 'required|array|min:1|max:'.$this->max,
        ]);
        reset($this->selected);
        dd($this->selected,$this->selectPage);
        // $this->group->students()->sync($this->selected);
        // $this->emit('saved');
    }


        public function getStudentsProperty(){
            $students = Student::where('level_id',$this->group->level_id)
            // ->whereNotIn('user_id', $this->group->students->pluck('user_id'))
            // ->where(function ($query) {
            //     $query->where('name', 'like', '%'.$this->search.'%')
            //     ->orWhere('user_id', 'like', '%'.$this->search.'%');
            // })
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
