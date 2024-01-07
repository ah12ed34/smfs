<?php

namespace App\Http\Controllers;


use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Auth\LoginController;

class HomeController extends Controller
{
    //
    public function index()
    {
        // ...
        return redirect(LoginController::redirectTo());
    }
}
