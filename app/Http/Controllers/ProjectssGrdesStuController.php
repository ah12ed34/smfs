<?php

namespace App\Http\Controllers;

use App\Models\GroupSubject;
class ProjectssGrdesStuController extends Controller
{
    //
    public function index($subject_id,$group_id)
    {
        $group_subject = GroupSubject::where('subject_id',$subject_id)->where('group_id',$group_id)->first();
        return view("academic.student.projectsgrades-stu",compact('group_subject'));
    }

}
