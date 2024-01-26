<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\file;
class ProfileController extends Controller
{
    //
    public function index(){
        return view('academic.profile.profile');
    }
}
