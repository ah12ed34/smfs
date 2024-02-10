<?php

namespace App\Http\Controllers\students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudAssignementsController extends Controller
{
    //
    public function index(){
        return view('students.studAssignments.studAssignments');
    }
    public function indexDoneAssigne(){
        return view('students.studAssignments.studDoneAssignments');
    }
}
