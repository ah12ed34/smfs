<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\file;

class ReciveAssignmentController extends Controller
{
    //
    public function index(){
        return view('academic.assignment.recive-assignments');
    }
}
