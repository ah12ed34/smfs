<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainDetalisOFSystemLoginController extends Controller
{
    //
    public function vision_of_system()
    {
        return view('detailsSystem.vision_of_system');
    }
    public function messageOFsystem()
    {
        return view('detailsSystem.messageOFsystem');
    }
    public function targets_of_system()
    {
        return view('detailsSystem.targets_of_system');
    }
}
