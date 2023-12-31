<?php

use App\Mail\MyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/testEmail',
    function () {
        $name = "ahmed";
       Mail::to('ah12ed34@gmail.com')->send(new MyEmail($name));
    });
Route::get(
    '/home',function () {
        return view('home');
    });