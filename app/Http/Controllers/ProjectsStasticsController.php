<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\file;
use App\Models\Group;
use App\Models\GroupProject;
use App\Models\GroupSubject;
use App\Models\Project;
use App\Models\Student;
use App\Models\User;

class ProjectsStasticsController extends Controller
{
    //
    public function index($group_subject,$project_id){
        $gs = GroupSubject::findOrfail($group_subject);
        $p = Project::findOrfail($project_id);
        if(!$gs || !$p){
            return redirect()->route('group.index');
        }
        if($gs->teacher_id != auth()->user()->academic->user_id){
            return redirect()->route('group.index');
        }
        $qurey = request()->query();
        $parameters = request()->route()->parameters();

        $stastics = [
            'count_groups'=>0,
            'count_done'=>0,
            'count_not_done'=>0,
            'count_late'=>0,
        ];
        $project_groups = [
            'count_students'=>0,
            'count_groups'=>0,
            'all_students'=>0,
            'max_groups'=>0,
            'min_groups'=>0,
        ];
        $count_students = $gs->students->count();
        $project_groups['all_students'] = $count_students;
        $project = $p;
        $project_groups['max_groups'] = ceil($count_students / $project->min_students);
        $project_groups['min_groups'] = ceil($count_students / $project->max_students);

        $GroupProjects = $project->GroupProjects()
            ->get()
            ->map(function ($group) use ($project_groups, &$stastics, $project, $count_students) {
                $group->count_students = $group->students->count();
                $project_groups['count_students'] += $group->count_students;
                $project_groups['count_groups'] += 1;

                // Check if the group project is done
                if ($group->file) {
                    if($group->delivery_date > $project->end_date){
                        $stastics['count_late']++;
                    }else{
                        $stastics['count_done']++;
                    }
                    // $stastics['count_done']++;
                } else {
                    $stastics['count_not_done']++;
                }


                return $group;
            });

        if ($project_groups['count_students'] < $count_students) {
            while ($project_groups['max_groups'] > $project_groups['count_groups']) {
                if ($project_groups['min_groups'] <= $project_groups['count_groups'] && $GroupProjects[$GroupProjects->count() - 1]->just_created ?? false) {
                    break;
                }
                $group = new GroupProject(['project_id' => $project_id]);
                // $group->id = 'G' . ($project_groups['count_groups'] + 1);
                // $group->name = 'Group ' . ($project_groups['count_groups'] + 1);
                // $group->student = new Student(['user' => new User(['name' => 'Sin asignar'])]);
                $group->count_students = 0;
                $group->just_created = true;
                $project_groups['count_groups'] += 1;
                $stastics['count_not_done']++;
                $GroupProjects->push($group);
            }
        }

        // Set the total number of groups in statistics
        $stastics['count_groups'] = $GroupProjects->count();

        return view('academic.project.projectsStastics',compact('group_subject','project_id','qurey','parameters'
    ,'stastics','gs'));
    }
}
