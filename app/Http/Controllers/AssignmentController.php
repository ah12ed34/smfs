<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\file ;
use App\Models\GroupSubject;

class AssignmentController extends Controller
{
    //
    public function index($subject_id,$group_id)
    {
        $group_subject = GroupSubject::where('subject_id',$subject_id)->where('group_id',$group_id)->first();
        return view('academic.assignment.assignments',compact('group_subject'));
    }
}
