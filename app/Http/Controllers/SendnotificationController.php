<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\file;
class SendnotificationController extends Controller
{
    //
    public function index(){
        return view("academic.sendnotification.sendnotification");
    }
}
