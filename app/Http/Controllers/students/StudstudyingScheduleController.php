<?php

namespace App\Http\Controllers\students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\file;
class StudstudyingScheduleController extends Controller
{
    //
    public function indexSchedule(){
        return view('students.studStudyingschedule.studStudyingSchedule');
    }
}
