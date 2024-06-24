<?php

namespace App\Livewire\Components\Academic;

use Livewire\Component;
use App\Models\GroupProject;
use App\Models\Student;
use App\Models\WorkGroup;
use App\Tools\ToolsApp;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Illuminate\Pagination\LengthAwarePaginator;
use PhpParser\Node\Expr\Cast\Array_;

class AddStudents extends Component
{
    use WithPagination
    ,WithoutUrlPagination
    ;
    // checkbox اضافة طلاب لقروب المشروع  عنطريق
    public $students_id = [];
    public $project_group ;
    // public $page=1;
    public $search;
    public $perPage = 5;
    public $pageName = 'studentsPage';
    public $allStudents = [];

    public function mount(
        // $group_id,$subject_id,$project_id,$pg_id
        )
    {
        if (session()->has('project_group_id')) {
            $pg_id = session()->get('project_group_id');
        }elseif(request()->has('pg_id')){
            $pg_id = request()->get('pg_id');
        }else{
            return;
        }
        if (session()->has('project_id')) {
            $project_id = session()->get('project_id');
        }

        // $this->prameters = request()->route()->parameters;
        // dd($this->prameters);
        $this->project_group = GroupProject::
        where('id',$pg_id)
        ->where('project_id',$project_id)
        ->first();
        // dd($this->project_group);
        if ($this->project_group) {
            $this->students_id = $this->project_group->students->map(function($student) {
                // to string to array
                return $student->student->id;
            })->toArray();
            // session()->put('project_group_id', $this->project_group->id);
        }else{

           return;
            // dd($this->project_group,$pg_id,request()->all(),session()->all());
        }
        // else{
        //     if(session()->has('project_group_id')){
        //         $this->project_group = GroupProject::find(session()->get('project_group_id'));
        //         $this->students_id = $this->project_group->students->map(function($student) {
        //             return $student->student->student->user_id;
        //         })->toArray();
        //     }
        // }
        // dd(request()->query());
        // dd($this->getPageName());
        // if(request()->has($this->pageName)){
        //     dd('request',$this->page);
        //     $page = request()->input($this->pageName);
        //     if(is_numeric($page)&&$page>0){
        //         $this->page = $page;
        //     }else{
        //         $this->page = 1;
        //     }
        // }
        // if(request()->getpa
        // dd(request()->input('components.0.calls.0.params'));
        $this->dispatch('openModal');
    }
    // {
    //     if ($this->project_group) {
    //         $this->students_id = $this->project_group->students->map(function($student) {
    //             return $student->student->student->user_id;
    //         })->toArray();
    //         session()->put('project_group_id', $this->project_group->id);
    //     }else{
    //         if(session()->has('project_group_id')){
    //             $this->project_group = GroupProject::find(session()->get('project_group_id'));
    //             $this->students_id = $this->project_group->students->map(function($student) {
    //                 return $student->student->student->user_id;
    //             })->toArray();
    //         }
    //     }
    //     if(request()->has($this->pageName)){
    //         dd('request',$this->page);
    //         $page = request()->input($this->pageName);
    //         if(is_numeric($page)&&$page>0){
    //             $this->page = $page;
    //         }else{
    //             $this->page = 1;
    //         }
    //     }
    //     // if(request()->getpa
    //     // dd(request()->input('components.0.calls.0.params'));
    //     $this->dispatch('openModal');
    // }
    public function getStudentsProperty()
    {
        $group = $this->project_group->project->GroupSubject->group;
        // $other_students = WorkGroup::where('group_id', '!=',$this->project_group->id)->pluck('student_id')->toArray();
        $other_students = $this->project_group->project->GroupProjects->where('id','!=',$this->project_group->id)->map(function($group){
            return $group->students->map(function($student) {
                return $student->student_id;
            });
        })->flatten()->unique()->toArray();
        // dd($other_students);
        // with out key
        $this->students_id = array_values(array_diff($this->students_id, $other_students));
        // dd($this->students_id,$other_students);
        // dd($this->students_id,$other_students,gettype($this->students_id),gettype($other_students));
        $students = $group->students->map(function($student) use ($other_students) {
            if (in_array($student->pivot->id, $other_students)) {
                // if(array_search($student->pivot->id, $this->students_id)){
                //     // remove student from array of students_id
                //     $this->students_id = array_diff($this->students_id, [$student->pivot->id]);
                // }
                return null;
            }
            return [
                'id_group' => $student->pivot->id,
                'id' => $student->user_id,
                'name' => $student->user->name,
                'checked' => in_array($student->user_id, $this->students_id, true)
            ];
        })->filter(function($student) {
            return $student !== null;
        })
        ->filter(function($student) {
            return empty($this->search) || strpos($student['name'], $this->search) !== false
                || strpos($student['id'], $this->search) !== false;
        });

        $paginationStudents =  $students->paginate($this->perPage, $this->pageName);

        // dd($paginationStudents);
        return $paginationStudents;
    }

    public function addStudentsToProject(){
        $this->validate([
            // 'required|min:'.$this->project_group->project->min_students.'|max:'.$this->project_group->project->max_students,
            'students_id' => 'required|array|min:'.$this->project_group->project->min_students.'|max:'.$this->project_group->project->max_students,
        ]);

        // add students to project group
        $exist_students = $this->project_group->students->map(function($student) {
            return $student->student->id ;
        })->toArray();
        $date = now();
        // dd($this->students_id,$exist_students);
        foreach ($this->students_id as $student_id) {

            if (!in_array($student_id, $exist_students)) {
                // find student in array of all students
                $this->project_group->students()->create([
                    'student_id' => $student_id,
                    'created_at' => $date,
                    'updated_at' => $date,
                ]);

            }
        }


        $unselected = array_diff($exist_students, $this->students_id);
        if (!empty($unselected)) {
            foreach ($unselected as $student_id) {
                $this->project_group->students()->where('student_id', $student_id)->delete();
            }
        }
        if($this->project_group->student_id == null||!in_array($this->project_group->student_id,$this->students_id)){
            $this->project_group->student_id = reset($this->students_id);
            $this->project_group->save();
        }
        $this->dispatch('closeModal',['detail'=>'add-students']);

    }

    public function render()
    {
        return view('livewire.components.academic.add-students'
        ,[
            'students' => $this->students
        ]);
    }
}
