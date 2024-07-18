<?php

namespace App\Http\Controllers\students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\models\file;
use App\Models\AcademicYear;
use App\Models\Project;

class StudProjectsController extends Controller
{
    private $ay_id;
    private $semester;
    //
    public function __construct()
    {
        $this->ay_id = AcademicYear::currentAcademicYear()->id;
        $this->semester = AcademicYear::getTerm();
    }
    public function index(){
        return view('students.studProjects.studProjects');
    }
    public function Stastistcex(){
        $user = auth()->user();
        // Delivery time expires
        $counts = [
            'all' => 0,
            'unfinished' => 0,
            'finished' => 0,
            'not-graded' => 0,
            'expired' => 0,
        ];
        $projects = Project::join('group_subjects', 'projects.subject_id', '=', 'group_subjects.id')
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

        ->where('group_students.student_id', $user->student->user_id)
        ->where('group_students.ay_id', $this->ay_id)
        ->where('group_subjects.ay_id', $this->ay_id)
        ->where('subjects_levels.semester', $this->semester)
        ->select('projects.*', 'group_projects.grade as gp_grade', 'group_projects.name as gp_name', 'group_projects.file as gp_file', 'group_projects.id as gp_id'
                    ,'academics.user_id as teacher_id',
                    )
        ->get();
        // dd($projects);
        $projects = $projects->map(function($project) use (&$counts){

            $counts['all']++;

            if($project->grade){
                $counts['not-graded']++;
            }
            if($project->gp_file){
                $counts['finished']++;
            }else{
                if($project->end_date < now()){
                    $counts['expired']++;
                }else{
                    $counts['unfinished']++;
                }
            }

            return $project;
        });
        // dd($counts);
        return view('students.studProjects.studProjectsStastics', compact('projects', 'counts'));
    }
}
