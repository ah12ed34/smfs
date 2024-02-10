<?php

use App\Mail\MyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Models\group;
use Faker\Guesser\Name;
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
    Route::group(['prefix'=>'/student','middleware' => ['role:student']], function () {

        route::get("/",'students\HomeController@index')->name("student");

        // Route::get('/', 'StudentController@index')->name('student.index');
        Route::prefix('/subject')->group(function () {

        });
        Route::prefix('/studProjects')->group(function(){
           route::get("/",'students\StudProjectsController@index')->name("student-projects");
        });
        Route::prefix('/studProjectsStastics')->group(function(){
            route::get("/",'students\StudProjectsController@Stastistcex')->name("student-projectsStastics");
         });
        Route::prefix('/studAssignments')->group(function () {
           route::get("/",'students\StudAssignementsController@index')->name('student-assignements');
        });
        Route::prefix('/studDoneAssignments')->group(function () {
            route::get("/",'students\StudAssignementsController@indexDoneAssigne')->name('student-DoneAssignements');
         });
         Route::prefix('/studChattingGroup')->group(function(){
            route::get("/", 'students\StudChattingGroupController@index')->name('student-chattingGroup');
         });
         Route::prefix('/studStudyingbooks')->group(function(){
            route::get("/", 'students\StudStudyingbooksController@indexbooks')->name('student-studyingbooks');
         });
         Route::prefix('/studBooksChapters')->group(function(){
         route::get("/", 'students\StudStudyingbooksController@indexChapters')->name('student-booksChapters');
            });
         Route::prefix('/studFormQuiz')->group(function(){
            route::get("/", 'students\StudStudyingbooksController@indexFormQuiz')->name('student-formQuiz');
         });
         Route::prefix('/studChaptersSummaries')->group(function(){
            route::get("/", 'students\StudStudyingbooksController@indexChaptersSummaries')->name('student-ChaptersSummaries');
         });
         Route::prefix('/studStastistics')->group(function(){
            route::get("/",'students\StudStastisticsController@index')->name('student-stastistics');
         });
         Route::prefix('/studArchieve')->group(function(){
            route::get("/", 'students\StudArchieveController@indexArchieve')->name('student-archieve');
         });
         route::prefix('/studArchieveProjects')->group(function(){
        route::get("/", 'students\StudArchieveController@indexArchieveProjects')->name('student-archieveProjects');
         });
         route::prefix('/studArchieveAssignements')->group(function(){
            route::get("/", 'students\StudArchieveController@indexArchieveAssignements')->name('student-archieveAssignements');
         });
         route::prefix('/studGrades')->group(function(){
            route::get("/", 'students\StudArchieveController@indexArchieveGrades')->name('student-grades');
         });
         route::prefix('/studstudyingScheule')->group(function(){
            route::get("/", 'students\StudStudyingScheuleController@index')->name('student-studyingScheule');
         });
     })->middleware('auth');
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin')->middleware('role:admin');
    Route::prefix('/academic')->group(function () {
        Route::prefix('student')->group(function () {
            Route::get('/index', function(){return view('');})->name('student.index');
            Route::get('/create', 'StudentController@create')->name('student.create')->middleware('perm:addstudent');
            Route::post('/store', 'StudentController@store')->name('student.store')->middleware('perm:addstudent');
            Route::get('create-excel', 'StudentController@createExcel')->name('student.create-excel')->middleware('perm:addstudent');
            Route::post('store-excel', 'StudentController@storeExcel')->name('student.store-excel')->middleware('perm:addstudent');
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
            Route::prefix('assignment')->group(function(){
                Route::get("/",'AssignmentController@index')->name("assignment");
            });
            route::prefix("recive-assignments")->group(function(){
                route::get("/",'ReciveAssignmentController@index')->name("recive-assignments");
            });
            route::prefix('students')->group(function(){
                route::get("/",'StudentsController@index')->name("students");
            });
            route::prefix("students-persents")->group(function(){
                route::get("/",'StudentspersentsController@index')->name("students-persents");
            });
            route::prefix("projectsgrades-stu")->group(function(){
                route::get("/",'ProjectssGrdesStuController@index')->name("projectsgrades-stu");
            });
            route::prefix("midexam")->group(function(){
                route::get("/",'MidexamController@index')->name("midexam");
            });
            route::prefix("assignmentsgrdes-stu")->group(function (){
                route::get("/",'AssignmentsGrdesStuController@index')->name("assignmentsgrdes-stu");
            });
            route::prefix("studyingbooks")->group(function(){
                route::get("/",'StudyingbooksController@index')->name("studyingbooks");
            });
            route::prefix("forms-quiz")->group(function(){
                route::get("/",'FormsquizController@index')->name("forms-quiz");
            });
            route::prefix("sendnotification")->group(function(){
                route::get("/",'SendnotificationController@index')->name("sendnotification");
            });
            route::prefix("studyingschedule")->group(function(){
                route::get("/",'StudyingScheduleController@index')->name("studyingschedule");
            });
            route::prefix(("projectsStastics"))->group(function(){
                route::get("/",'ProjectsStasticsController@index')->name("projectsStastics");
            });
            route::prefix("studentsworksStastics")->group(function(){
                route::get("/",'StudentsworksStasticsController@index')->name("studentsworksStastics");
            });
            route::prefix("stasticsallsubject")->group(function(){
                route::get("/",'StasticsallsubjectController@index')->name("stasticsallsubject");
            });
            route::prefix("permissions")->group(function(){
                route::get("/",'PermissionController@index')->name("permissions");
            });
            route::prefix("permissionsSubject")->group(function(){
                route::get("/", 'PermissionController@indexpermissSubject')->name("permissionsSubject");
            });
            route::prefix("worksStasticsStudentsSuccess")->group(function(){
                route::get("/",'WorksStasticsStudentsSuccessController@index')->name("worksStasticsStudentsSuccess");
            });
            route::prefix("worksStasticsAssignements")->group(function(){
                route::get("/",'WorksStasticsAssignementsController@index')->name("worksStasticsAssignements");
            });
            route::prefix("worksStasticsProjects")->group(function(){
                route::get("/",'WorksStasticsProjectsController@index')->name("worksStasticsProjects");
            });
            route::prefix("archieve")->group(function(){
                route::get("/",'ArchieveController@index')->name("archieve");
            });
            route::prefix("archieveAssiginFolder")->group(function(){
                route::get("/",'ArchieveAssiginFolderController@index')->name("archieveAssiginFolder");
            });
            route::prefix("archieveDisplayfilescoming")->group(function(){
                route::get("/",'ArchieveDisplayfilescomingController@index')->name("archieveDisplayfilescoming");
            });
            route::prefix("profile")->group(function(){
                route::get("/",'ProfileController@index')->name("profile");
            });

        });

    })->middleware('auth');

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/test', function () {
    return view("test");
});
