<?php
namespace App\Traits\Academic;

use App\Models\GroupSubject;
use App\Repositories\EmployeesRepository;
use App\Traits\Searchable;
use Illuminate\Support\Facades\DB;
trait studentAT

{
    use Searchable;
    protected $academicR;
    // initialize
    public function initializeStudentAT()
    {
        $this->academicR = new EmployeesRepository();
    }

    public function getStudents(GroupSubject $group_subject)
    {
        $this->sortField = 'user_id';
        return $this->academicR->getStudentsInGroupBySubject($group_subject)
        ->select('students.*', 'studyings.*')
            ->whereHas('user', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%')
                    ->orWhere('id', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ;
    }

    // public function getStudentsWithProjects(GroupSubject $group_subject)
    // {
    //     $this->sortField = 'user_id';
    //     $Students = $this->academicR->getStudentsInGroupBySubject($group_subject)

    //         ->whereHas('user', function ($query) {
    //             $query->where('name', 'like', '%' . $this->search . '%')
    //                 ->orWhere('email', 'like', '%' . $this->search . '%')
    //                 ->orWhere('phone', 'like', '%' . $this->search . '%')
    //                 ->orWhere('id', 'like', '%' . $this->search . '%');
    //         })
    //         ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
    //         ->get()
    //         ->map(function ($student) use ($group_subject) {
    //             $student->projects_name = $group_subject->projects->pluck('name')->implode(',');

    //             $student->projects = DB::table('projects')
    //                 ->join('group_projects', 'projects.id', '=', 'group_projects.project_id')
    //                 ->join('work_groups', 'group_projects.id', '=', 'work_groups.group_id')
    //                 ->where('projects.subject_id', $group_subject->id)
    //                 ->where('work_groups.student_id', $student->pivot->id)
    //                 ->select('projects.*', 'work_groups.grade as selfgrade'
    //                 ,'group_projects.grade as globalgrade', 'group_projects.comment as group_comment'
    //                 , 'group_projects.id as group_project_id')
    //                 ->addSelect(DB::raw('CONCAT(projects.name, " - ", projects.grade) as project_name'))
    //                 ->get();

    //             return $student;
    //         });
    //         // dd($Students->paginate($this->perPage));

    //     return $Students->paginate($this->perPage);
    // }

    private function getStudentProjects($student, GroupSubject $group_subject)
{
    return DB::table('projects')
        ->join('group_projects', 'projects.id', '=', 'group_projects.project_id')
        ->join('work_groups', 'group_projects.id', '=', 'work_groups.group_id')
        ->where('work_groups.student_id', $student->pivot->id)
        ->where('projects.subject_id', $group_subject->id)
        ->select(
            'projects.*',
            'work_groups.grade as selfgrade',
            'group_projects.grade as globalgrade',
            'group_projects.comment as group_comment',
            'group_projects.id as group_project_id'
        )
        ->get();
}

    public function getStastistics(GroupSubject $group_subject)
    {
        $projectsCount = $group_subject->projects()->get()->map(function ($project) {
            return $project->GroupProjects()->where('file', '!=', '')->count();
        })->sum();

        $projectsNotDeliveredCount = $group_subject->projects()->get()->map(function ($project) {
            return $project->GroupProjects()->whereNull('file')->count();
        })->sum();


        // $assignedCount = $group_subject->GroupFiles()
        // ->where('is_active', 1)
        // ->get()->map(function ($gfile) {
        //     return $gfile->file()->where('type', 'assignment')->get()->map(function ($file) {
        //         return $file->deliveries()->count();
        //     })->sum();
        // })->sum();

        $Delivered = DB::table('group_students')
        ->join('group_subjects', 'group_students.group_id', '=', 'group_subjects.group_id')
        ->join('group_files', 'group_subjects.id', '=', 'group_files.group_subject_id')
        ->join('files', 'group_files.file_id', '=', 'files.id')
        ->leftJoin('deliveries', function ($join) {
            $join->on('group_students.id', '=', 'deliveries.student_group_id')
                 ->on('group_files.id', '=', 'deliveries.file_id');
        })
        ->where('group_students.group_id', $group_subject->group_id)
        ->where('group_students.ay_id', $group_subject->ay_id)
        ->where('group_subjects.id', $group_subject->id)
        ->where('files.type', 'assignment')
        ->where('is_active', 1)

                ;
        $notDeliveredCount = (clone $Delivered)->whereNull('deliveries.id')->count();
        $assignedCount = (clone $Delivered)->whereNotNull('deliveries.id')->count();

        return [
            'projectsCount' => $projectsCount,
            'deliveryAssessmentCount' => $assignedCount,
            'notDeliveredCount' => $notDeliveredCount,
            'projectsNotDeliveredCount' => $projectsNotDeliveredCount,
            ];
    }

    // public function getDelviredProjects($student, GroupSubject $group_subject)
    // {
    //     return
    // }
}
