<?php

namespace App\Http\Controllers\students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\file;
class StudstudyingScheuleController extends Controller
{
    //
    public function index(){
        return view('students.studstudyingScheule.studstudyingScheule');
    }
}
