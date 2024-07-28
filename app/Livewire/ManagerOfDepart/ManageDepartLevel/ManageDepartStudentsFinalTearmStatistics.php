<?php

namespace App\Livewire\ManagerOFdepart\Managedepartlevel;

use App\Models\AcademicYear;
use App\Models\Group;
use App\Models\Level;
use App\Traits\LevelTraits;
use App\Traits\Studentsable;
use Livewire\Component;
use App\Traits\Tools;

class ManageDepartStudentsFinalTearmStatistics extends Component
{
    use LevelTraits;
    public $level;
    public $groups;
    public $subjects;
    public $terms;
    public $active = [
        'group' => 'all',
        'subject' => 'all',
        'tab' => 'statistics',
    ];

    public $studentsCount = 0;
    public $studentsFirst = 0;
    public $studentsSuccess = 0;
    public $studentsFail  = 0;
    public $studentsCountDeliveries = 0;
    public $studentsCountGroupProjects = 0;
    public function mount(Level $level)
    {

        $this->level = $level;
        if(request()->has('group')&&is_numeric(request('group')))
            $this->active['group'] = request('group');


        if(request()->has('term')&&is_numeric(request('term')))
            $this->active['term'] = request('term');
        else
            $this->active['term'] = AcademicYear::getTerm();
        $this->groups = $this->level->groups->whereNull('group_id');
        $this->subjects = $this->level->subjects
        ->where('pivot.semester', $this->active['term'])
        ->where('pivot.isActivated', 1);
        if(request()->has('subject')&&is_numeric(request('subject'))){
            $id = request('subject');
            if($this->subjects->where('pivot.id',$id)->count()>0){
                $this->active['subject'] = $id;
            }
        }
        $this->terms = $this->getTeramByLevel($this->level);
        // dd($this->terms->where('id',1)->first()->name);
        $this->initializeLevel();

            // $this->getStatitcsByLevelGroupSubjectTerm();
   list($this->studentsCount) = array_values($this->getStatitcsByLevelGroupSubjectTerm());
        // dd($this->studentsCount,$this->studentsFirst,$this->studentsSuccess,$this->studentsFail);
}
    public function getStatitcsByLevelGroupSubjectTerm(){
        $ay_id = AcademicYear::currentAcademicYear()->id;

        $students = Group::where('level_id',$this->level->id)
        ->when($this->active['group'] != 'all',function($query){
            return $query->where('id',$this->active['group']);
        },function($query){
                return $query->whereNull('group_id');
        })->get()
        ->map(function($group) use ($ay_id){
            $students = $group->students->where('pivot.ay_id',$ay_id);
            return $students;
        })
        ->flatten()
        ->count();


        $totle =
            $this->getStudentsByLevelGroupTerm($this->subjects->when($this->active['subject'] != 'all', function($query){
                return $query->where('pivot.id',$this->active['subject']);
            })
            ,$this->active['term'],$this->groups,
            $this->active['group'] == 'all' ? null : $this->active['group']
    );
    // $this->studentsCountGroupProjects = $totle->whereNotNull('group_project_id')
    // ->unique('group_project_id')->count()+$totle->whereNotNull('practical_group_project_id')
    // ->unique('practical_group_project_id')->count();
    $existedGP = [];
    $totle->each(function($student) use (&$existedGP){
        $student->subjectCollection->each(function($subject) use (&$existedGP){
            $subject->groupProject->each(function($gp) use (&$existedGP){
                if(!in_array($gp['id'],$existedGP)){
                    $existedGP[] = $gp['id'];
                }
            });
        });
        $this->studentsCountDeliveries += $student->count_deliveries;

        if($student->subjectCollection->count() == 0){
            $this->studentsFail++;
        }
        else{
            $student->total_grade_av = $student->total_grade / ($this->active['subject'] != 'all' ? $student->subjectCollection->count() : $this->subjects->count());
            // dd($student->total_grade_av,$student->total_grade,$student->subjectCollection->count(),$this->subjects->count());
            if($student->total_grade_av >= 50){
                $this->studentsSuccess++;
                if($student->total_grade_av >= 85){
                    $this->studentsFirst++;
                }
            }
            else{
                $this->studentsFail++;
            }
        }
    });
    // dd($existedGP);
    $this->studentsCountGroupProjects = sizeof($existedGP);
    // dd($students,$studentsFirst,$studentsSuccess,$studentsFail);
    return [
        'students' => $students,
    ];
    }
    public function render()
    {
        return view('livewire.managerOFdepart.managedepartlevel.manage-depart-students-final-tearm-statistics');
    }
}
