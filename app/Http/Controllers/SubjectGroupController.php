<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
class SubjectGroupController extends Controller
{
    //
    public function index(Group $group)
    {
        return view('global.subject_group.index',compact('group'));
    }
}
