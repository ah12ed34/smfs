<?php

namespace App\Http\Controllers\students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\models\file;
class StudStastisticsController extends Controller
{
    //
    public function index(){
        return view('students.StudStasticsallsubjects.studStastistics');
    }
}
