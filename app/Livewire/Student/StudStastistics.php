<?php

namespace App\Livewire\Student;

use Livewire\Component;
use App\Models\Delivery;
use App\Models\Project;
use App\Models\AcademicYear;

class StudStastistics extends Component
{
    public $user;
    public $assignementsnotsent;
    public $assignementssent;
    public $projectsFinished;
    public $projectsUnfinished;


    private $ay_id;
    private $semester;

    public function mount()
    {
        $this->user = auth()->user();
        $this->ay_id = AcademicYear::currentAcademicYear()->id;
        $this->semester = AcademicYear::getTerm();
        $this->getCountAssignements();

    }

    public function getCountAssignements(){
        $this->assignementsnotsent = 0;
        $this->assignementssent = 0;
        $this->projectsFinished = 0;
        $this->projectsUnfinished = 0;
        $assignements = $this->user->student->groups->flatMap(function ($group) {
            return $group->groupSubjects->flatMap(function ($groupSubject) {
                if($groupSubject->ay_id != $this->ay_id ||
                $groupSubject->subjectLevel->semester !=
                $this->semester
                ){
                    return [];
                }
                return $groupSubject->getFilesInGroupBySubject('assignment',null)
                    ->where('is_active', 1)
                    ->get()
                    ->map(function ($file) {
                        $file->delivery = Delivery::where('file_id', $file->group_file->id)
                        ->whereHas('groupStudent', function ($query) {
                            $query->where('student_id', $this->user->student->user_id);
                        })
                        ->first();
                        return $file;
                    });
            });
        });
        foreach ($assignements as $assignement) {
            if ($assignement->delivery) {
                $this->assignementssent++;
            } else {
                $this->assignementsnotsent++;
            }
        }

        Project::join('group_subjects', 'projects.subject_id', '=', 'group_subjects.id')
        ->join('groups', 'group_subjects.group_id', '=', 'groups.id')
        ->join('group_students', 'groups.id', '=', 'group_students.group_id')
        ->join('group_projects', 'projects.id', '=', 'group_projects.project_id')
        ->join('academics', 'group_subjects.teacher_id', '=', 'academics.user_id')
        ->join('users', 'academics.user_id', '=', 'users.id')
        ->join('work_groups', function($join) {
            $join->on('group_projects.id', '=', 'work_groups.group_id')
                 ->on('work_groups.student_id', '=', 'group_students.id');
        })
        ->join('subjects_levels', 'group_subjects.subject_id', '=', 'subjects_levels.id')
        ->join('subjects', 'subjects_levels.subject_id', '=', 'subjects.id')

        ->join('group_students as gs', 'gs.id', '=', 'group_projects.student_id')
        ->join('students as s', 's.user_id', '=', 'gs.student_id')
        ->join('users as u', 'u.id', '=', 's.user_id')

        ->where('group_students.student_id', $this->user->student->user_id)
        ->where('group_students.ay_id', $this->ay_id)
        ->where('subjects_levels.semester', $this->semester)
        ->select('projects.*', 'group_projects.grade as gp_grade', 'group_projects.name as gp_name', 'group_projects.file as gp_file', 'group_projects.id as gp_id'
                    ,'academics.user_id as teacher_id',
                    )
        ->get()->map(function($project){
            if($project->gp_file){
                $this->projectsFinished++;
            }else{
                $this->projectsUnfinished++;
            }
        });

    }
    public function render()
    {
        return view('livewire.student.stud-stastistics');
    }
}
