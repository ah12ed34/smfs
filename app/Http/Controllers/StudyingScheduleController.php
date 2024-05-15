<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\file;
class StudyingScheduleController extends Controller
{
    //
    public function index(){
        $academic = auth()->user()->academic;
        return view("academic.studyingschedule.studyingschedule",compact('academic'));
    }
}
