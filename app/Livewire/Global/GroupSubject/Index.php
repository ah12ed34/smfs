<?php

namespace App\Livewire\Global\GroupSubject;

use Livewire\Component;
use App\Models\Group;
use App\Models\Subject;
use App\Models\groupSubject;
use App\Models\Academic as teacher;
use Illuminate\Support\Facades\Log;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;

    public $group;
    public $subject;
    public $groupSubject;
    public $teachers;
    public $search;
    public $teacher_subject = [];
    public $perPage = 10;
    protected $queryString = ['search'];

    public function mount(Group $group)
    {
        $this->group = $group;
        $this->teachers = teacher::all();

        $this->groupSubject = groupSubject::where('group_id', $this->group->id)->get();
        $this->teacher_subject = $this->groupSubject->pluck('teacher_id', 'subject_id')->toArray();

        // dd($this->teachers);
    }

    public function updatedTeacherSubject($value, $key)
    {
        if(empty($key)){
            return;
        }
        if(!empty($value)){
            if(!teacher::find($value)){
                return redirect()->route("groupsubject", $this->group->id)->with("error", "Teacher not found!");
            }
            if($this->group->IsPractical()){
                groupSubject::updateOrCreate(
                ['group_id' => $this->group->id, 'subject_id' => $key,'is_practical' => 1],
                ['teacher_id' => $value]
                );
            }else{
            groupSubject::updateOrCreate(
            ['group_id' => $this->group->id, 'subject_id' => $key],
            ['teacher_id' => $value]
            );
        }
    }else{
        groupSubject::where('group_id', $this->group->id)->where('subject_id', $key)->delete();
    }
        // if($value == null){
        //     $info = GroupSubject::where('group_id', $this->group->id)->where('subject_id', $key)->delete();

        // }else{
        //     if($this->group->IsPractical()){
        //         $info = GroupSubject::updateOrCreate(
        //         ['group_id' => $this->group->id, 'subject_id' => $key,'is_practical' => 1],
        //         ['teacher_id' => $value]
        //         );
        //     }else{
        //     $info = GroupSubject::updateOrCreate(
        //     ['group_id' => $this->group->id, 'subject_id' => $key],
        //     ['teacher_id' => $value]
        //     );
        // }
        // }
    }


    // public function getSubjectsProperty()
    // {
    //     if($this->group->group_id){
    //         return Subject::join('subjects_levels', 'subjects_levels.subject_id', '=', 'subjects.id')
    //         ->where('subjects_levels.level_id', $this->group->level_id)
    //         ->where('subjects_levels.has_practical', 1)
    //         ->where(function ($query) {
    //             $query->where('subjects.name_ar', 'like', '%' . $this->search . '%')
    //                 ->orWhere('subjects.name_en', 'like', '%' . $this->search . '%')
    //                 ->orWhere('subjects.id', 'like', '%' . $this->search . '%');
    //         })->select('subjects.*','subjects_levels.*')->paginate($this->perPage);
    //     }else{
    //         return Subject::join('subjects_levels', 'subjects_levels.subject_id', '=', 'subjects.id')
    //         ->where('subjects_levels.level_id', $this->group->level_id)
    //         ->where(function ($query) {
    //             $query->where('subjects.name_ar', 'like', '%' . $this->search . '%')
    //                 ->orWhere('subjects.name_en', 'like', '%' . $this->search . '%')
    //                 ->orWhere('subjects.id', 'like', '%' . $this->search . '%');
    //         })->select('subjects.*','subjects_levels.*')->paginate($this->perPage);

    //     }
    // }
    public function getSubjectsProperty()
{
    $subject = Subject::join('subjects_levels', 'subjects_levels.subject_id', '=', 'subjects.id')
        ->where('subjects_levels.level_id', $this->group->level_id)
        ->where('subjects_levels.isActivated', 1)
        ->when($this->group->group_id, function ($query) {
            $query->where('subjects_levels.has_practical', 1);
        })
        ->where(function ($query) {
            $query->where('subjects.name_ar', 'like', '%' . $this->search . '%')
                ->orWhere('subjects.name_en', 'like', '%' . $this->search . '%')
                ->orWhere('subjects.id', 'like', '%' . $this->search . '%');
        })
        ->select('subjects.*', 'subjects_levels.*')
        ->paginate($this->perPage);
        return $subject;
}

    public function render()
    {
        return view('livewire.global.group-subject.index', ['subjects' => $this->subjects]);
    }
}
