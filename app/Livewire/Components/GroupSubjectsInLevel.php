<?php

namespace App\Livewire\Components;

use App\Models\Group;
use App\Models\Level;
use App\Models\Subject;
use Livewire\Component;
use App\Models\AcademicYear;
use App\Models\GroupSubject;
use Livewire\WithPagination;
use App\Models\Academic as teacher;

class GroupSubjectsInLevel extends Component
{
    use WithPagination;

    public $group;
    public $subject;
    public $groupSubject;
    public $teachers;
    public $search;
    public $teacher_subject = [];
    public $perPage = 10;
    public ?Level $level = null;
    public $term = null;
    // public $group
    protected $queryString = ['search'];

    public $ay_id;
    public $sup_teacher_subject = [];
    public function mount()
    {
        if (!$this->level) {
            abort(404);
        }

        $this->teachers = teacher::all();
        $this->ay_id = AcademicYear::currentAcademicYear()->id;
        // $this->groupSubject = GroupSubject::where('group_id', $this->group->id)
        //     ->where('ay_id', $this->ay_id)->get();
        // $this->teacher_subject =
        //     $this->groupSubject->where('is_practical', 0)->pluck('teacher_id', 'subject_id')->toArray();
        // GroupSubject::whereIn('group_id',$group->groups()->pluck('id'))
        // ->where('is_practical', 1)->get()->map(function($items){
        //     $this->sup_teacher_subject[$items->group_id.' '.$items->subject_id] = $items->teacher_id.'';
        // });
        GroupSubject::whereIn('group_id', Group::where('level_id', $this->level->id)->pluck('id'))
            ->get()->map(function ($items) {
                $this->sup_teacher_subject[$items->group_id . ' ' . $items->subject_id] = $items->teacher_id . '';
            });
    }

    public function updatedTeacherSubject($value, $key)
    {
        // dd($this->ay_id);
        if (empty($key)) {
            return;
        }
        if (!empty($value)) {
            if (!teacher::find($value) && !is_array($value)) {
                return redirect()->route("groupsubject", $this->group->id)->with("error", "Teacher not found!");
            }
            if ($this->group->IsPractical()) {
                GroupSubject::updateOrCreate(
                    ['group_id' => $this->group->id, 'subject_id' => $key, 'is_practical' => 1],
                    ['teacher_id' => $value]
                );
            } else {
                GroupSubject::updateOrCreate(
                    ['group_id' => $this->group->id, 'subject_id' => $key, 'ay_id' => AcademicYear::currentAcademicYear()->id],
                    ['teacher_id' => $value]
                );
            }
        } else {
            GroupSubject::where('group_id', $this->group->id)
                ->where('ay_id', $this->ay_id)
                ->where('subject_id', $key)->delete();
        }
    }


    public function updatedSupTeacherSubject($value, $key)
    {
        if (empty($key) && explode(' ', $key)[0] == null) {
            return;
        }
        if (!empty($value)) {
            if (!teacher::find($value)) {
                return redirect()->route("groupsubject", $this->group->id)->with("error", "Teacher not found!");
            }
            $supGroup_v = explode(' ', $key)[0];
            $subject_v = explode(' ', $key)[1];

            GroupSubject::updateOrCreate(
                ['group_id' => $supGroup_v, 'subject_id' => $subject_v, 'is_practical' => 1, 'ay_id' => $this->ay_id],
                ['teacher_id' => $value]
            );
        } else {
            GroupSubject::where('ay_id', $this->ay_id)
                ->where('group_id', explode(' ', $key)[0])->where('subject_id', explode(' ', $key)[1])->delete();
        }
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
    public function getGroupsProperty()
    {
        $groups = Group::where('level_id', $this->level->id)
            ->where('group_id', null)
            ->get();
        return $groups;
    }
    public function getSubjectsProperty()
    {
        $subject = Subject::join('subjects_levels', 'subjects_levels.subject_id', '=', 'subjects.id')
            ->where('subjects_levels.level_id', $this->level->id)
            ->where('subjects_levels.isActivated', 1)
            // ->when($this->group->group_id, function ($query) {
            //     $query->where('subjects_levels.has_practical', 1);
            // })
            ->when($this->term, function ($query) {
                $query->where(
                    'subjects_levels.semester',
                    $this->term
                );
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
        return view(
            'livewire.components.group-subjects-in-level',
            [
                'subjects' => $this->subjects,
                'groups' => $this->groups,
            ]
        );
    }
}
