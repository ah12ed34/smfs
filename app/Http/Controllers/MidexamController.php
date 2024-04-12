<?php

namespace App\Http\Controllers;

use App\Models\groupSubject;
class MidexamController extends Controller
{
    //
    public function index($subject_id ,$group_id){
        $group_subject = groupSubject::where('subject_id',$subject_id)->where('group_id',$group_id)->
        where('teacher_id',auth()->user()->academic->user_id)->firstOrFail();
      return view('academic.student.midexam',compact('group_subject'));
    }


}
