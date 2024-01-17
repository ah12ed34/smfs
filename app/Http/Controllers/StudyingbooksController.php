<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\file;
class StudyingbooksController extends Controller
{
    //
    public function index(){
        return view("academic.studyingbooks.studyingbooks");
    }
}
