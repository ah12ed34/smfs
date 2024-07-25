<?php

namespace App\Http\Controllers\students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\file;
use App\Models\Group;

class StudstudyingScheduleController extends Controller
{
    //
    public function indexSchedule()
    {
        $group = Group::where(
            'id',
            auth()->user()->student->groups()->first()->id
        )->first();
        // dd($group);
        return view('students.studStudyingschedule.studStudyingSchedule', compact('group'));
    }
}
