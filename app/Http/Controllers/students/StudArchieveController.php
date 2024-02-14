<?php

namespace App\Http\Controllers\students;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\models\file;
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
        return  view('students.studArchieve.studGrades');
    }
}
