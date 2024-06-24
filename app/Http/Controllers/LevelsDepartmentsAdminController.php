<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\models\File;

class LevelsDepartmentsAdminController extends Controller
{
    //
    public function index(){
        return view('admin.levels-departments');
    }
}




