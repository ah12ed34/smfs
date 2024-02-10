<?php

namespace App\Http\Controllers\students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\models\file;

class StudProjectsController extends Controller
{
    //
    public function index(){
        return view('students.studProjects.studProjects');
    }
    public function Stastistcex(){
        return view('students.studProjects.studProjectsStastics');
    }
}
