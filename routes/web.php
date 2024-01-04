<?php

use App\Mail\MyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use Illuminate\Support\Facades\Auth;
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

// Route::get(
//     '/testEmail',
//     function () {
//         $name = "ahmed";
//        Mail::to('ah12ed34@gmail.com')->send(new MyEmail($name));
//     });
Route::get(
    '/home',function () {     return view('home');
    });

    Route::prefix('student')->group(function () {
        Route::get('/create', 'StudentController@create')->name('student.create');
        Route::post('/store', 'StudentController@store')->name('student.store');
        // Route::get('/index', 'StudentController@index')->name('student.index');
        // Route::get('/edit/{id}', 'StudentController@edit')->name('student.edit');
        // Route::post('/update/{id}', 'StudentController@update')->name('student.update');
        // Route::get('/delete/{id}', 'StudentController@delete')->name('student.delete');
    });
    Route::get('/api/levels/{departmentId}', [LevelController::class, 'getLevelsByDepartment']);

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
