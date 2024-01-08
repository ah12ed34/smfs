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



    Route::get('/api/levels/{departmentId}', [LevelController::class, 'getLevelsByDepartment']);

    Auth::routes(['register' => false]);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')
    ->middleware('auth');
    Route::prefix('/student')->group(function () {
        Route::get('/', 'StudentController@index')->name('student.index');
        Route::prefix('/subject')->group(function () {
            

        });
        Route::prefix('/project')->group(function () {
           
        });
        Route::prefix('/assignment')->group(function () {
           
        });
    })->middleware('auth');
    Route::get('admin', function () {
        return "welcome to admin";
    })->name('admin');
    Route::prefix('/academic')->group(function () {
        Route::prefix('student')->group(function () {
            Route::get('/index', function(){return view('');})->name('student.index');
            Route::get('/create', 'StudentController@create')->name('student.create')->middleware('perm:addstudent');
            Route::post('/store', 'StudentController@store')->name('student.store')->middleware('perm:addstudent');
            Route::get('/edit/{id}', 'StudentController@edit')->name('student.edit');
            Route::put('/update/{id}', 'StudentController@update')->name('student.update');
            Route::delete('/delete/{id}', 'StudentController@delete')->name('student.delete');
        });
        Route::prefix('department')->group(function () {
            Route::get('/index', 'DepartmentController@index')->name('department.index');
            Route::get('/create', 'DepartmentController@create')->name('department.create')->middleware('perm:adddepartment');
            Route::post('/store', 'DepartmentController@store')->name('department.store')->middleware('perm:adddepartment');
            Route::get('/edit/{id}', 'DepartmentController@edit')->name('department.edit');
            Route::put('/update/{id}', 'DepartmentController@update')->name('department.update');
            Route::delete('/delete/{id}', 'DepartmentController@delete')->name('department.delete');
        });
        Route::prefix('level')->group(function () {
            Route::get('/index', 'LevelController@index')->name('level.index');
            Route::get('/create', 'LevelController@create')->name('level.create')->middleware('perm:addlevel');
            Route::post('/store', 'LevelController@store')->name('level.store')->middleware('perm:addlevel');
            Route::get('/edit/{id}', 'LevelController@edit')->name('level.edit');
            Route::put('/update/{id}', 'LevelController@update')->name('level.update');
            Route::delete('/delete/{id}', 'LevelController@delete')->name('level.delete');
        });
        Route::prefix('subject')->group(function () {
            Route::get('/index', 'SubjectController@index')->name('subject.index');
            Route::get('/create', 'SubjectController@create')->name('subject.create');
            Route::post('/store', 'SubjectController@store')->name('subject.store');
            Route::get('/edit/{id}', 'SubjectController@edit')->name('subject.edit');
            Route::put('/update/{id}', 'SubjectController@update')->name('subject.update');
            Route::delete('/delete/{id}', 'SubjectController@delete')->name('subject.delete');
        });
        Route::prefix('role')->group(function () {
            Route::get('/index', 'RoleController@index')->name('role.index');
            Route::get('/create', 'RoleController@create')->name('role.create');
            Route::post('/store', 'RoleController@store')->name('role.store');
            Route::get('/edit/{id}', 'RoleController@edit')->name('role.edit');
            Route::put('/update/{id}', 'RoleController@update')->name('role.update');
            Route::delete('/delete/{id}', 'RoleController@delete')->name('role.delete');
        });
        Route::prefix('Permission')->group(function () {
            Route::get('/index', 'PermissionController@index')->name('primmision.index');
            Route::get('/create', 'PermissionController@create')->name('primmision.create');
            Route::post('/store', 'PermissionController@store')->name('primmision.store');
            Route::get('/edit/{id}', 'PermissionController@edit')->name('primmision.edit');
            Route::put('/update/{id}', 'PermissionController@update')->name('primmision.update');
            Route::delete('/delete/{id}', 'PermissionController@delete')->name('primmision.delete');
        });

        Route::prefix('project')->group(function () {
            
        });

        Route::prefix('assignment')->group(function () {
            
        });
        Route::prefix('group')->group(function () {
            
        });
        Route::prefix('groupSubject')->group(function () {
            
        });
       
        Route::get('/create', 'AcademicController@create')->middleware('perm:addacademic')->name('academic.create');
        Route::post('/store', 'AcademicController@store')->middleware('perm:addacademic')->name('academic.store');
        
        Route::group(['middleware' => ['role:academic']], function () {
            route::get('/', 'AcademicController@index')->name('academic.home');
            Route::prefix("subject")->group(function(){
                Route::get("/",'SubjectController@index')->name("subject.index");
            });
            Route::prefix("project")->group(function(){
                Route::get("/","ProjectController@index")->name("projects");
            });
        });
    })->middleware('auth');

Route::get('/', function () {
    return redirect()->route('login');
});