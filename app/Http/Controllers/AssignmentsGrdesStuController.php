<?php

namespace App\Http\Controllers;

use App\Models\groupSubject;
class AssignmentsGrdesStuController extends Controller
{
    //
    public function index($subject_id,$group_id)
    {
        $group_subject = groupSubject::where('subject_id',$subject_id)->where('group_id',$group_id)->first();
        return view("academic.student.assignmentsgrdes-stu",compact('group_subject'));
    }
}
