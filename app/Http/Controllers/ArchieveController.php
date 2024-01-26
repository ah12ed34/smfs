<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\file;
class ArchieveController extends Controller
{
    //
    public function index(){
        return view('academic.archieve.archieve');
    }
}
