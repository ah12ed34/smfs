<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\file;
class ProjectsStasticsController extends Controller
{
    //
    public function index($group_subject,$group_project){
        return view('academic.project.projectsStastics',compact('group_subject','group_project'));
    }
}
