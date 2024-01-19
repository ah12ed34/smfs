<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\file;
class WorksStasticsStudentsSuccessController extends Controller
{
    //
    public function index(){
        return view('academic.student.worksStasticsStudentsSuccess');
    }
}
