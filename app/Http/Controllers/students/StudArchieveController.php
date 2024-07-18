<?php

namespace App\Http\Controllers\students;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\models\file;
use app\models\student;
use App\Models\Grade;
use app\Models\Departmentl;
// use app\Models\Level;

class StudArchieveController extends Controller
{
    //
    public function indexArchieve(){
        return  view('students.studArchieve.studArchieve');
    }
    public function indexArchieveProjects(){
        return  view('students.studArchieve.studArchieveProjects');
    }
    public function indexArchieveAssignements(){
        return  view('students.studArchieve.studArchieveAssignements');
    }
    public function indexArchieveGrades(){
    // $levels = Level::all();
        // $departments = Department::all();
        // $grades = Grade::all();
        $grades = [
            (object)[
                'estimate' => 'A',
                'final_total' => 95,
                'final_exam' => 40,
                'result_practical' => 30,
                'result_theoretical' => 25,
                'quiz_practical' => 10,
                'quiz_theoretical' => 15,
                'midterm_practical' => 20,
                'midterm_theoretical' => 20,
                'assignment_practical' => 15,
                'assignment_theoretical' => 15,
                'project_practical' => 20,
                'project_theoretical' => 20,
                'attendance_practical' => 10,
                'attendance_theoretical' => 10,
                'subject' => 'Math',
                'number' => 101
            ],
            // إضافة المزيد من البيانات إذا لزم الأمر
        ];

        $overallGrade = 'A'; // افتراضياً
        $cumulativeAverage = 4.0; // افتراضياً
        $totalSum = 1000; // افتراضياً


        return  view('students.studArchieve.studGrades', compact('grades', 'overallGrade', 'cumulativeAverage', 'totalSum'));
    }
}
