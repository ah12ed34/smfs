<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\file;
class FormsquizController extends Controller
{
    //
    public function index(){
        return view("academic.studyingbooks.forms-quiz");
    }
}
