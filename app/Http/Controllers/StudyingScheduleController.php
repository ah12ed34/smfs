<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\file;
class StudyingScheduleController extends Controller
{
    //
    public function main_academic_sechedules(){
        // $academic = auth()->user()->academic;
        return view("academic.studyingschedule.main_academic_sechedules");
    }
    public function academic_schedule(){
        $academic = auth()->user()->academic;
        return view("academic.studyingschedule.studyingschedule",compact('academic'));
    }
    public function students_Schedule_studying()
    {
        // $academic = auth()->user()->academic;
        return view("academic.studyingschedule.students_Schedule_studying");
    }
    public function classes_Schedules_studying()
    {
        // $academic = auth()->user()->academic;
        return view("academic.studyingschedule.classes_Schedules_studying");
    }
}
