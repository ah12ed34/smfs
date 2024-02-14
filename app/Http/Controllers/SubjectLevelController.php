<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class SubjectLevelController extends Controller
{
    //
    public function index()
    {
        return view('globle.levelsubject.index');
    }

    public function addSubjectLevel(Level $level)
    {
        return view('globle.levelsubject.add',[
            'level' => $level
        ]);
    }

}
