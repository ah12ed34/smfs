<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\file;
use App\Models\GroupSubject;

class StudentsController extends Controller
{
    //
    public function index($group_subject){
        $group_subject = GroupSubject::where('id',$group_subject)->
        where('teacher_id',auth()->user()->academic->user_id)->firstOrFail();
        return view('academic.student.students',compact('group_subject'));
    }
}
