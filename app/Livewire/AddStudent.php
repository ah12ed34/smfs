<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class AddStudent extends Component
{
    use WithPagination;
    public $paginationTheme = 'bootstrap';
    // public $students;
    public $group;
    public $selected = [20163007];
    public $search = '';
    public $max = 0;
    public $count = 0;
    protected $student  ;

    public function mount($group)
    {
        $this->group = $group;

        // paginate
        $this->max = $group->max_students;
        $this->selected = [];
        // $this->count = $this->students->count();
    }



    public function updatedSelected()
    {

        // $this->count = count($this->selected);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }




    public function save(){
        $this->validate([
            'selected' => 'required|array|min:1|max:'.$this->max,
        ]);


        dd($this->selected);
        // $this->group->students()->sync($this->selected);
        // $this->emit('saved');
    }




    public function render()
    {
        $students = Student::where('level_id',$this->group->level_id)
        // ->where('name','like','%'.$this->search.'%')
        ->orderBy('user_id')
        ->paginate(10);
        // session()->put('livewire.' . $students->user_id . '.selected', $this->selected);
        $this->count = $students->count();
        return view('livewire.add-student' ,[
            'totalStudents' => Student::where('level_id',$this->group->level_id)->count(),
            'students' => $students,


        ]);
    }
    public function isSelected($user_id)
    {
        return in_array($user_id, $this->selected);
    }
    public function storeSelected()
    {

    }
}
