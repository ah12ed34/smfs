<?php

namespace App\Http\Controllers\students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\models\file;
class StudArcheiveController extends Controller
{
    //
    public function indexArchieve(){
        return  view('students.studArchive.studArchieve');
    }
    public function indexArchieveProjects(){
        return  view('students.studArchive.studArchieveProjects');
    }
    public function indexArchieveAssignements(){
        return  view('students.studArchive.studArchieveAssignements');
    }
    public function indexArchieveGrades(){
        return  view('students.studArchive.studGrades');
    }
}
