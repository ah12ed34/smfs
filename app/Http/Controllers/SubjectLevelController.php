<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class SubjectLevelController extends Controller
{
    //
    public function index()
    {
        return view('global.levelsubject.index');
    }

    public function addSubjectLevel(Level $level)
    {
        return view('global.levelsubject.add',[
            'level' => $level
        ]);
    }

}
