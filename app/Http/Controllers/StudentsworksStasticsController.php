<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\file;
class StudentsworksStasticsController extends Controller
{
    //
    public function index(){
        return view('academic.student.studentsworksStastics');
    }
}
