<?php

namespace App\Livewire\Academic\Subject;

use App\Models\GroupProject;
use Livewire\Component;
use App\Models\GroupSubject;
use App\Models\Project;
use App\Models\Student;
use App\Models\User;
use App\Traits\Searchable;
use Illuminate\Support\Facades\Storage;

class ProjectGroups extends Component
{
    use Searchable;
    public $group_subject;
    public $projectDetails;
    public $project_id;
    public $project_groups = [
        'count_students' => 0,
        'count_groups' => 0,
        'all_students' => 0,
        'max_groups' => 0,
        'min_groups' => 0,
    ];
    public $users = [];
    public $name;
    public $file;
    public $grade;
    public $comment;

    public $parameters;
    public $query;

    public $grade_id = [];
    public $comment_id = [];
    public $boss = [];

    public $add_student = false;
    public $active = [
        'tab' => null,
    ];
    public function mount(GroupSubject $group_subject, $project_id)
    {
        $this->group_subject = $group_subject;
        $this->project_id = $project_id;
        $this->parameters = request()->route()->parameters;
        $this->query = request()->query();
        if (
            isset($this->query['tab']) && $this->query['tab'] != null
            && in_array($this->query['tab'], ['done', 'not_done'])
        ) {
            $this->active['tab'] = $this->query['tab'];
        }
        // dd($parameters);
    }

    public function selected($id, $add_student = false)
    {

        $this->projectDetails = $this->GroupProjects->where('id', $id)->first();

        if ($add_student) {
            $this->validate([
                'name' => 'required',
            ]);
            $this->add_student = $add_student;
            if ($this->projectDetails->just_created) {
                $createGP = $this->projectDetails;
                unset(
                    $createGP->just_created,
                    $createGP->count_students,
                    $createGP->count_groups,
                    $createGP->student,
                    $createGP->id
                );
                $createGP->save();
                // dd($createGP);
            }
            session()->put(['project_group_id' => $this->projectDetails->id, 'project_id' => $this->project_id]);
        } else {
            $this->add_student = false;
        }
        // dd($this->projectDetails);
        $this->name = $this->projectDetails->name ?? '';
        $this->grade = $this->projectDetails->grade;
        $this->comment = $this->projectDetails->comment_teacher;
        $this->file = $this->projectDetails->file;
        $this->boss = $this->projectDetails->student->user_id ?? null;
        if (
            null == $this->projectDetails->just_created
            || false == $this->projectDetails->just_created
        ) {
            // $this->users = $this->projectDetails->students->map(function($student){
            //     return [
            //         'id'=>$student->student->user_id,
            //         'student_id'=>$student->student_id,
            //         'name'=>$student->student->user->name,
            //     ];
            // })->toArray();

            $this->users = $this->projectDetails->students->map(function ($student) {
                if (!$student->student) {
                    $student->delete();
                    return;
                }
                if (!$student?->student) {
                    dd($student->student);
                }
                $this->grade_id[$student->student->user_id] = $student->grade;
                $this->comment_id[$student->student->user_id] = $student->description;
                return [
                    'id' => $student->student->user_id, 'name' => $student->student->user->name, 'student_id' => $student->student_id, 'grade' => $student->grade, 'comment' => $student->comment
                ];
            });
        } else {
            $this->users = [];
        }
    }

    public function updateProjectGroup()
    {
        $this->validate([
            'name' => 'required',
            'boss' => 'required',
            'users' => 'required',
        ]);
        // dd(is_array($this->users),$this->users->
        // $student_id = 0;
        // foreach($this->users as $user){
        //     if($user['id'] == $this->boss){
        //         $student_id = $user['student_id'];
        //         break;
        //     }
        // }
        // dd($student_id);
        $studentIds = collect($this->users);
        // dd($studentIds->firstWhere('id',$this->boss)['student_id']);
        $this->projectDetails->update([
            'name' => $this->name,
            'student_id' => $studentIds->firstWhere('id', $this->boss)['student_id'],
        ]);
        foreach ($this->users as $user) {
            if ($this->projectDetails->students->where('student_id', $user['student_id'])->count() == 0) {
                $this->projectDetails->students()->create([
                    'student_id' => $user['student_id'],
                ]);
            }
        }
        $this->projectDetails->students->whereNotIn('student_id', $studentIds->pluck('student_id'))->each(function ($student) {
            $student->delete();
        });

        $this->reset(['name', 'grade', 'comment', 'boss', 'users']);
        $this->dispatch('closeModal');
    }

    public function correctProject()
    {
        $grade = is_numeric($this->grade) ? $this->grade : 0;
        $this->validate([
            'grade' => 'required|numeric|min:0|max:' . $this->projectDetails->project->grade,
            'comment' => 'nullable|string',
            'grade_id.*' => 'nullable|numeric|min:0|max:' . ($this->projectDetails->project->grade - $grade),
            'comment_id.*' => 'nullable|string',
        ]);

        if ($this->grade != $this->projectDetails->grade || $this->comment != $this->projectDetails->comment_teacher) {
            $this->projectDetails->update([
                'grade' => $this->grade,
                'comment_teacher' => $this->comment,
            ]);
        }
        foreach ($this->grade_id as $key => $grade) {
            // dd($key);
            $selectedStudent = $this->projectDetails->students->where('student_id', collect($this->users)->where('id', $key)->first()['student_id'])->first();
            if (
                $selectedStudent &&
                ($selectedStudent->grade ?? "" != $grade || $selectedStudent->comment ?? '' != $this->comment_id[$key])
            ) {

                $selectedStudent->update([
                    'grade' => $grade,
                    'description' => isset($this->comment_id[$key]) ? $this->comment_id[$key] : null,
                ]);
            }
        }
        $this->reset(['grade', 'comment', 'grade_id', 'comment_id']);
        $this->dispatch('closeModal');
    }
    public function downloadFile()
    {
        if ($this?->projectDetails?->file == null) {
            return $this->dispatch('alert', ['message' => __('general.file_not_found'), 'type' => 'error']);
        } elseif (Storage::missing($this?->projectDetails?->file)) {
            return $this->dispatch('alert', ['message' => __('general.file_not_found'), 'type' => 'error']);
        } else {
            return Storage::download($this->projectDetails->file, $this->name . ' - ' . $this->projectDetails->project->name);
        }
    }
    public $student_delete = null;
    // delete student from group
    public function select_delete($user_id)
    {
        if ($this->projectDetails->project->min_students >= $this->projectDetails->students->count()) {
            $this->addError('deleteE', 'لا يمكن حذف الطالب لأن عدد الطلاب أقل من الحد الأدنى');
            $this->dispatch('deleteError');
            return;
        }


        $this->student_delete = $user_id;
        // dd($this->student_delete,$user_id);
    }
    public function delete_student()
    {
        if ($this->student_delete == null) {
            $this->dispatch('closeModalDelete');
            return;
        }
        $this->projectDetails->students->each(function ($student) {
            // dd($student->student->user_id,$this->student_delete);
            if ($student->student->user_id == $this->student_delete) {
                // dd($student->student->user_id,$this->student_delete);
                $student->delete();
                $this->dispatch('closeModalDelete');
                if (false == $this->projectDetails->just_created)
                    $this->users = $this->projectDetails->students->map(function ($student) {
                        if (!$student->student) {
                            $student->delete();
                            return;
                        }
                        if (!$student?->student) {
                            dd($student->student);
                        }
                        $this->grade_id[$student->student->user_id] = $student->grade;
                        $this->comment_id[$student->student->user_id] = $student->description;
                        return [
                            'id' => $student->student->user_id, 'name' => $student->student->user->name, 'student_id' => $student->student_id, 'grade' => $student->grade, 'comment' => $student->comment
                        ];
                    });

                return;
            }
        });
    }

    public function getGroupProjectsProperty()
    {
        $this->project_groups = [
            'count_students' => 0,
            'count_groups' => 0,
            'all_students' => 0,
            'max_groups' => 0,
            'min_groups' => 0,
        ];
        $count_students = $this->group_subject->students->count();
        $this->project_groups['all_students'] = $count_students;
        $project = Project::where('id', $this->project_id)->first();
        $this->project_groups['max_groups'] = ceil($count_students / $project->min_students);
        $this->project_groups['min_groups'] = ceil($count_students / $project->max_students);

        $GroupProjects = $project->GroupProjects()
            // ->where('name','like','%'.$this->search.'%')
            ->get()
            ->map(function ($group) {
                $group->count_students = $group->students->count();
                $this->project_groups['count_students'] += $group->count_students;
                $this->project_groups['count_groups'] += 1;

                return $group;
            });

        if ($this->project_groups['count_students'] < $count_students) {
            while (($this->project_groups['max_groups'] > $this->project_groups['count_groups'])) {
                if (($this->project_groups['min_groups'] <= $this->project_groups['count_groups'] && $GroupProjects[$GroupProjects->count() - 1]->just_created ?? false)) {
                    break;
                }
                $group = new GroupProject(['project_id' => $this->project_id]);
                $group->id = 'G' . ($this->project_groups['count_groups'] + 1);
                $group->name = 'Group ' .
                    ($this->project_groups['count_groups'] + 1);
                $group->student = new Student(['user' => new User(['name' => 'Sin asignar'])]);
                $group->count_students = 0;
                $group->just_created = true;
                $this->project_groups['count_groups'] += 1;
                $GroupProjects->push($group);
            }
        }

        return $GroupProjects
            ->filter(function ($group) {
                if ($this->active['tab'] == 'done') {
                    return $group->file != null;
                } elseif ($this->active['tab'] == 'not_done') {
                    return $group->file == null;
                } else {
                    return true;
                }
            })
            ->filter(function ($group) {
                // search by name of group

                return
                    $this->search == '' ||
                    str_contains($group->name, $this->search) !== false;
            })
            ->paginate($this->perPage);
    }
    public function render()
    {
        return view(
            'livewire.academic.subject.project-groups',
            ['GroupProjects' => $this->GroupProjects]
        );
    }
}
