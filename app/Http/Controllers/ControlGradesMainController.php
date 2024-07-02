<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\File;
use app\models\ControlGradesDepartments;
use app\Models\ControlGradeslevels;
use app\Models\ControlGradesMain;
use app\Models\ControlGradesStatistics;


class ControlGradesMainController extends Controller
{
    //
    public function ControlGradesDepartments(){
        return view('control_grades.control_grades_departments');
    }
    public function ControlGradeslevels(){
        return view('control_grades.control_grades_levels');
    }
    public function ControlGradesMain(){
        return view('control_grades.control_grades_main');
    }
    public function ControlGradesStatistics(){
        return view('control_grades.control_grades_statistics');
    }
}
