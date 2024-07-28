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
        $this->sortField = 'user_id';
    }

    public function getStudents(GroupSubject $group_subject)
    {
        $this->sortField = 'user_id';
        return $this->academicR->getStudentsInGroupBySubject($group_subject)

            ->whereHas('user', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%')
                    ->orWhere('id', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
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

    public function getSetPersents(int $x = 15, $table = 'studyings')
    {
        $result = null;
        for ($i = 0; $i < $x; $i++) {
            $result .= 'COALESCE(case ' . $table . '.persents' . $i + 1 . '
                            when "present" then 1
                            when "late" then 0.5
                            when "absent" then 0
                            when "permit" then 1
                            else 0
                        end, 0) ';
            if ($i < $x - 1) {
                $result .= '+ ';
            }
        }
        return $result;
    }

    public function getStastistics(GroupSubject $group_subject)
    {
        $projectsCount = $group_subject->projects()->get()->map(function ($project) {
            return $project->GroupProjects()->where('file', '!=', '')->count();
        })->sum();

        $projectsNotDeliveredCount = $group_subject->projects()->get()->map(function ($project) {
            return $project->GroupProjects()->whereNull('file')->count();
        })->sum();

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
            ->where('is_active', 1);
        $notDeliveredCount = (clone $Delivered)->whereNull('deliveries.id')->count();
        $assignedCount = (clone $Delivered)->whereNotNull('deliveries.id')->count();

        // if(!$group_subject->IsPractical()){
        if (!$group_subject->HasPractical()) {
            $students = $group_subject->students()
                ->AddSelect(
                    'students.*',
                    DB::raw('
                    SUM(DISTINCT COALESCE(deliveries.grade, 0)) as delivery_grade,
                    SUM(DISTINCT COALESCE(work_groups.grade, 0)) as work_grade,
                    SUM(DISTINCT COALESCE(group_projects.grade, 0)) as group_grade,
                    SUM(DISTINCT COALESCE(studyings.midterm_exam, 0)) as helf_grade,
                    SUM(DISTINCT COALESCE(studyings.final_exem, 0)) as final_grade,
                    SUM(DISTINCT COALESCE(studyings.addional_grades, 0)) as addional_grades,
                    SUM(DISTINCT
                        ' . $this->getSetPersents(15) . '
                    ) as persents
                ')
                )
                ->join('group_subjects', 'group_students.group_id', '=', 'group_subjects.group_id')
                ->where('group_subjects.id', $group_subject->id)
                ->leftJoin('studyings', function ($join) use ($group_subject) {
                    $join->on('group_students.id', '=', 'studyings.student_id')
                        ->where('studyings.subject_id', '=', $group_subject->id);
                })
                ->leftJoin('work_groups', function ($join) use ($group_subject) {
                    $join->on('group_projects.id', '=', 'work_groups.group_id')
                        ->on('group_students.id', '=', 'work_groups.student_id')
                        ->join('group_projects', 'work_groups.group_id', '=', 'group_projects.id')
                        ->join('projects', function ($join) use ($group_subject) {
                            $join->on('group_projects.project_id', '=', 'projects.id')
                                ->where('projects.subject_id', $group_subject->id);
                        })
                        ->whereNotNull('group_projects.grade');
                })
                ->leftJoin('deliveries', function ($join) use ($group_subject) {
                    $join->on('group_students.id', '=', 'deliveries.student_group_id')
                        ->join('group_files', 'deliveries.file_id', '=', 'group_files.id')
                        ->join('files', 'group_files.file_id', '=', 'files.id')
                        ->where('files.type', 'assignment')
                        ->where('group_files.group_subject_id', $group_subject->id);
                })
                ->where('group_students.ay_id', $group_subject->ay_id)
                ->groupBy('group_students.id')
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                // ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ;
            // dd($group_subject->students()->get());

            $students = $students->get()->map(function ($student) {
                $student->total_grade = $student->delivery_grade + $student->work_grade + $student->group_grade + $student->helf_grade + $student->final_grade + $student->addional_grades + $student->persents;
                return $student;
            });
            // dd($students->paginate($this->perPage));

            $success = $students->filter(function ($student) {
                return $student->total_grade >= 50;
            })->count();

            $fail = $students->filter(function ($student) {
                return $student->total_grade < 50;
            })->count();
        } elseif (!$group_subject->IsPractical()) {
            $students = $group_subject->students()
                ->AddSelect(
                    'students.*',
                    'subjects_levels.practical_grade as practical_grade',
                    'practical_group_students.id as practical_group_student_id',
                    'practical_group_students.group_id as practical_group_id',
                    'practical_group_subjects.id as practical_group_subject_id',
                    DB::raw('
            SUM(DISTINCT COALESCE(deliveries.grade, 0)) as delivery_grade,
            SUM(DISTINCT COALESCE(work_groups.grade, 0)) as work_grade,
            SUM(DISTINCT COALESCE(group_projects.grade, 0)) as group_grade,
            SUM(DISTINCT COALESCE(studyings.midterm_exam, 0)) as helf_grade,
            SUM(DISTINCT COALESCE(studyings.final_exem, 0)) as final_grade,
            SUM(DISTINCT COALESCE(studyings.addional_grades, 0)) as addional_grades,
            SUM(DISTINCT
                ' . $this->getSetPersents(15) . '
            ) as persents

        '),
                    //

                    DB::raw('
            SUM(DISTINCT COALESCE(practical_deliveries.grade, 0)) as practical_delivery_grade,
            SUM(DISTINCT COALESCE(practical_work_groups.grade, 0)) as practical_work_grade,
            SUM(DISTINCT COALESCE(practical_group_projects.grade, 0)) as practical_group_grade,
            SUM(DISTINCT COALESCE(practical_studyings.midterm_exam, 0)) as practical_helf_grade,
            SUM(DISTINCT COALESCE(practical_studyings.final_exem, 0)) as practical_final_grade,
            SUM(DISTINCT COALESCE(practical_studyings.addional_grades, 0)) as practical_addional_grades,
            SUM(DISTINCT
                ' . $this->getSetPersents(15, 'practical_studyings') . '
            ) as practical_persents
        ')
                )

                ->join('group_subjects', 'group_students.group_id', '=', 'group_subjects.group_id')
                ->where('group_subjects.id', $group_subject->id)
                ->leftJoin('subjects_levels', function ($join) use ($group_subject) {
                    $join->on('group_subjects.subject_id', '=', 'subjects_levels.id')
                        ->where('subjects_levels.has_practical', 1)
                        ->where('subjects_levels.level_id', $group_subject->subjectLevel->level_id);;
                })
                ->leftJoin('studyings', function ($join) use ($group_subject) {
                    $join->on('group_students.id', '=', 'studyings.student_id')
                        ->where('studyings.subject_id', '=', $group_subject->id);
                })
                ->leftJoin('work_groups', function ($join) use ($group_subject) {
                    $join->on('group_projects.id', '=', 'work_groups.group_id')
                        ->on('group_students.id', '=', 'work_groups.student_id')
                        ->join('group_projects', 'work_groups.group_id', '=', 'group_projects.id')
                        ->join('projects', function ($join) use ($group_subject) {
                            $join->on('group_projects.project_id', '=', 'projects.id')
                                ->where('projects.subject_id', $group_subject->id);
                        })
                        ->whereNotNull('group_projects.grade');
                })
                ->leftJoin('deliveries', function ($join) use ($group_subject) {
                    $join->on('group_students.id', '=', 'deliveries.student_group_id')
                        ->join('group_files', 'deliveries.file_id', '=', 'group_files.id')
                        ->join('files', 'group_files.file_id', '=', 'files.id')
                        ->where('files.type', 'assignment')
                        ->where('group_files.group_subject_id', $group_subject->id);
                })
                ->leftJoin('group_students as practical_group_students', function ($join) use ($group_subject) {
                    $join->on('group_students.student_id', '=', 'practical_group_students.student_id')
                        ->whereIn('practical_group_students.group_id', $group_subject->group->groups()->pluck('id'))
                        ->where('practical_group_students.ay_id', $group_subject->ay_id);
                })->leftJoin('group_subjects as practical_group_subjects', function ($join) use ($group_subject) {
                    $join->on('practical_group_students.group_id', '=', 'practical_group_subjects.group_id')
                        ->where('practical_group_subjects.subject_id', $group_subject->subject_id)
                        ->where('practical_group_subjects.ay_id', $group_subject->ay_id)
                        ->where('practical_group_subjects.is_practical', 1);
                })
                ->leftJoin('studyings as practical_studyings', function ($join) {
                    $join->on('practical_group_students.id', '=', 'practical_studyings.student_id')
                        ->on('practical_studyings.subject_id', '=', 'practical_group_subjects.id');
                })

                ->leftJoin('work_groups as practical_work_groups', function ($join) use ($group_subject) {
                    $join->on('practical_group_projects.id', '=', 'practical_work_groups.group_id')
                        ->on('practical_group_students.id', '=', 'practical_work_groups.student_id')
                        ->leftJoin('group_projects as practical_group_projects', 'practical_work_groups.group_id', '=', 'practical_group_projects.id')
                        ->leftJoin('projects as practical_projects', function ($join) use ($group_subject) {
                            $join->on('practical_group_projects.project_id', '=', 'practical_projects.id');
                        })->on('practical_projects.subject_id', 'practical_group_subjects.id')
                        ->whereNotNull('practical_group_projects.grade');
                })
                ->leftJoin('deliveries as practical_deliveries', function ($join) {
                    $join->on('practical_group_students.id', '=', 'practical_deliveries.student_group_id')
                        ->leftJoin('group_files as practical_group_files', 'practical_deliveries.file_id', '=', 'practical_group_files.id')
                        ->leftJoin('files as practical_files', 'practical_group_files.file_id', '=', 'practical_files.id')
                        ->where('practical_files.type', 'assignment')
                        ->on('practical_group_files.group_subject_id', 'practical_group_subjects.id');
                })
                ->where('group_students.ay_id', $group_subject->ay_id)
                ->groupBy(
                    'group_students.id',
                    'subjects_levels.practical_grade',
                    'practical_group_students.id',
                    'practical_group_subjects.id',
                    'practical_deliveries.grade'
                );

            $students = $students->get()->map(function ($student) {
                $student->theory_total_grade = $student->delivery_grade + $student->work_grade + $student->group_grade + $student->helf_grade + $student->final_grade + $student->addional_grades + $student->persents;
                $student->practical_total_grade = $student->practical_delivery_grade + $student->practical_work_grade + $student->practical_group_grade + $student->practical_helf_grade + $student->practical_final_grade + $student->practical_addional_grades + $student->practical_persents;
                if ($student->practical_total_grade > 100) {
                    $student->practical_total_grade = 100;
                } elseif ($student->practical_total_grade < 0) {
                    $student->practical_total_grade = 0;
                }
                if ($student->theory_total_grade > 100) {
                    $student->theory_total_grade = 100;
                } elseif ($student->theory_total_grade < 0) {
                    $student->theory_total_grade = 0;
                }
                $student->total_grade = (((($student->practical_grade ?? 100) / 100) * $student->practical_total_grade)
                    + (((100 - ($student->practical_grade ?? 0)) / 100) * $student->theory_total_grade));
                if ($student->total_grade > 100) {
                    $student->total_grade = 100;
                } elseif ($student->total_grade < 0) {
                    $student->total_grade = 0;
                }
                return $student;
            });

            $success = $students->filter(function ($student) {
                return $student->total_grade >= 50;
            })->count();

            $fail = $students->filter(function ($student) {
                return $student->total_grade < 50;
            })->count();

            // dd($students->paginate($this->perPage)->where('user_id', 24160043)->first());

        }

        // }

        return [
            'projectsCount' => $projectsCount,
            'deliveryAssessmentCount' => $assignedCount,
            'notDeliveredCount' => $notDeliveredCount,
            'projectsNotDeliveredCount' => $projectsNotDeliveredCount,
            'successCount' => $success ?? 0,
            'failedCount' => $fail ?? 0,
        ];
    }

    // public function getDelviredProjects($student, GroupSubject $group_subject)
    // {
    //     return
    // }
}
