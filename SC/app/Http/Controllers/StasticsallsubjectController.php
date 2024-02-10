<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\file;
class StasticsallsubjectController extends Controller
{
    //
    public function index(){
        return view('academic.stasticsallsubject.stasticsallsubject');
    }
}
