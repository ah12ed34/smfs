<?php

namespace App\Livewire\Academic\Subject;

use App\Models\GroupProject;
use Livewire\Component;
use App\Models\GroupSubject;
use App\Models\Project ;
use App\Models\Student;
use App\Models\User;
use App\Tools\ToolsApp;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
class ProjectGroups extends Component
{
    use WithPagination;
    public $group_subject;
    public $search;
    public $perPage = 10;
    public $projectDetails;
    public $project_id;
    public $project_groups = [
        'count_students'=>0,
        'count_groups'=>0,
        'all_students'=>0,
        'max_groups'=>0,
        'min_groups'=>0,
    ];
    public $users = [];
    public $name;
    public $file;
    public $grade;
    public $comment;

    public $grade_id= [];
    public $comment_id = [];
    public $boss = [];
    public function mount($subject_id,$group_id,$project_id)
    {
        $this->group_subject = GroupSubject::where('subject_id',$subject_id)->where('group_id',$group_id)->first();
        $this->project_id = $project_id;
    }

    public function selected($id)
    {
        $this->projectDetails = $this->GroupProjects->where('id',$id)->first();

        // dd($this->projectDetails);
        $this->name = $this->projectDetails->name ?? '';
        $this->grade = $this->projectDetails->grade;
        $this->comment = $this->projectDetails->comment_teacher;
        $this->file = $this->projectDetails->file;
        $this->boss = $this->projectDetails->student->user_id ;

        $this->users = $this->projectDetails->students->map(function($student){
            $this->grade_id[$student->student->student->user_id] = $student->grade;
            $this->comment_id[$student->student->student->user_id] = $student->description;
            return ['id'=>$student->student->student->user_id,'name'=>$student->student->student->user->name
                    ,'student_id'=>$student->student_id,'grade'=>$student->grade,'comment'=>$student->comment];
        });
    }

    public function updateProjectGroup(){
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
            'name'=>$this->name,
            'student_id'=> $studentIds->firstWhere('id',$this->boss)['student_id'],
        ]);
        foreach($this->users as $user){
            if($this->projectDetails->students->where('student_id',$user['student_id'])->count() == 0){
                $this->projectDetails->students()->create([
                    'student_id'=>$user['student_id'],
                ]);
            }
        }
        $this->projectDetails->students->whereNotIn('student_id',$studentIds->pluck('student_id'))->each(function($student){
            $student->delete();
        });

        $this->reset(['name','grade','comment','boss','users']);
        $this->dispatch('closeModal');
    }

    public function correctProject(){
        $grade = is_numeric($this->grade)?$this->grade:0;
        $this->validate([
            'grade' => 'required|numeric|min:0|max:'.$this->projectDetails->project->grade ,
            'comment' => 'nullable|string',
            'grade_id.*' => 'nullable|numeric|min:0|max:'.($this->projectDetails->project->grade - $grade),
            'comment_id.*' => 'nullable|string',
        ]);

        if($this->grade!=$this->projectDetails->grade||$this->comment!=$this->projectDetails->comment_teacher){
            $this->projectDetails->update([
                'grade'=>$this->grade,
                'comment_teacher'=>$this->comment,
            ]);
        }
        foreach($this->grade_id as $key=>$grade){
            // dd($key);
            $selectedStudent = $this->projectDetails->students->where('student_id',collect($this->users)->where('id',$key)->first()['student_id'])->first();
            if ($selectedStudent &&
            ($selectedStudent->grade ?? "" != $grade || $selectedStudent->comment ?? '' != $this->comment_id[$key])) {

            $selectedStudent->update([
                'grade' => $grade,
                'description' => isset($this->comment_id[$key])?$this->comment_id[$key]:null,
            ]);
        }
        }
        $this->reset(['grade','comment','grade_id','comment_id']);
        $this->dispatch('closeModal');
    }
    public function downloadFile()
    {
        return Storage::download($this->projectDetails->file,$this->name .' - '.$this->projectDetails->project->name);
    }
    public function getGroupProjectsProperty()
    {
        $this->project_groups = [
            'count_students'=>0,
            'count_groups'=>0,
            'all_students'=>0,
            'max_groups'=>0,
            'min_groups'=>0,
        ];
        $count_students = $this->group_subject->students->count();
        $this->project_groups['all_students'] = $count_students;
        $project = Project::where('id',$this->project_id)->first();
        $this->project_groups['max_groups'] = ceil($count_students / $project->min_students);
        $this->project_groups['min_groups'] = ceil($count_students / $project->max_students);

        $GroupProjects = $project->GroupProjects()
        ->where('name','like','%'.$this->search.'%')
        ->get()
        ->map(function($group){
            $group->count_students = $group->students->count();
            $this->project_groups['count_students'] += $group->count_students;
            $this->project_groups['count_groups'] += 1;

            return $group;
        })
        ;

        if($this->project_groups['count_students'] < $count_students){
            while(($this->project_groups['max_groups'] > $this->project_groups['count_groups'])){
                if(($this->project_groups['min_groups'] <= $this->project_groups['count_groups']&&$GroupProjects[$GroupProjects->count()-1]->just_created??false)){
                    break;
                }
                $group = new GroupProject(['project_id'=>$this->project_id]);
                $group->id = (int) 0..($this->project_groups['count_groups']+1);
                $group->name = 'Group '.
                ($this->project_groups['count_groups']+1);
                $group->student = new Student(['user'=>new User(['name'=>'Sin asignar'])]);
                $group->count_students = 0;
                $group->just_created = true;
                $this->project_groups['count_groups'] += 1;
                $GroupProjects->push($group);
            }
        }
        return ToolsApp::convertToPagination($GroupProjects, $this->perPage);

    }
    public function render()
    {
        return view('livewire.academic.subject.project-groups'
        ,['GroupProjects'=>$this->GroupProjects]);
    }
}
