<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\file;
class WorksStasticsAssignementsController extends Controller
{
    //
    public function index(){
        return view('academic.student.worksStasticsAssignements');
    }
}
