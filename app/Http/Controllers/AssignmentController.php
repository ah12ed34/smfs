<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\file ;

class AssignmentController extends Controller
{
    //
    public function index(){
        return view('academic.assignment.assignments');
    }
}
