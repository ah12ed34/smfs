<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\file;
use App\Models\groupSubject;

class StudentsController extends Controller
{
    //
    public function index($subject_id ,$group_id){
        $group_subject = groupSubject::where('subject_id',$subject_id)->where('group_id',$group_id)->
        where('teacher_id',auth()->user()->academic->user_id)->firstOrFail();
        return view('academic.student.students',compact('group_subject'));
    }
}
