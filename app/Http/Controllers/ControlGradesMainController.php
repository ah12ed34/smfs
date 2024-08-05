<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\File;
use app\models\ControlGradesDepartments;
use app\Models\ControlGradeslevels;
use app\Models\ControlGradesMain;
use app\Models\ControlGradesStatistics;
use App\Models\Department;
use App\Models\Level;

class ControlGradesMainController extends Controller
{
    //
    public function ControlGradesDepartments()
    {
        $departments = Department::all();
        return view('control_grades.control_grades_departments', compact('departments'));
    }
    public function ControlGradeslevels(Department  $department)
    {
        $levels = $department->levels;
        return view('control_grades.control_grades_levels', compact('levels'));
    }
    // {
    //     return view('control_grades.control_grades_levels');
    // }
    public function ControlGradesMain(Level $level)
    {
        return view('control_grades.control_grades_main', compact('level'));
    }
    public function ControlGradesStatistics(Level $level)
    {
        return view('control_grades.control_grades_statistics', compact('level'));
    }
}
