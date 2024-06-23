<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Livewire\Academic\Subject\Assignments;
use App\Livewire\Academic\Subject\FormsQuiz;
use App\Livewire\Academic\Subject\ProjectGroups;
use App\Livewire\Academic\Subject\ReciveAssignments;
use App\Livewire\Academic\Subject\Studyingbooks;
use App\Livewire\Global\GroupSubject\Index;
use App\Livewire\Global\PracticalGroup\AddStudents;
use App\Livewire\Global\User\Profile;
use App\Livewire\Student\StudAssignements;
use App\Livewire\Student\StudStastistics;
use App\Livewire\Student\StudStudyingBooks\StudBooksChapters;
use App\Livewire\Student\StudStudyingBooks\StudStudyingBooks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Livewire\Quality\DepartLevelsQuality;
use App\Livewire\Student\Project\StudentProjects;
use GuzzleHttp\Middleware;

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
    Route::middleware(['auth'])->group(function () {
            Route::prefix('subject')->group(function () {

            });
            Route::prefix('level')->group(function () {
                Route::get('/addSubject/{level}','SubjectLevelController@addSubjectLevel')->name('level.addsubject');
                Route::get('/','SubjectLevelController@index')->name('level.index');

            });
            Route::prefix('groupsubject')->group(function () {
                Route::get('/{group}','\\'.Index::class)->name('groupsubject');

            });
            Route::get('profile','\\'.Profile::class )->name('profile');
            // Route::get('/profile',Profile::class )->name('profile');
    });
    Route::group(['prefix'=>'/student','middleware' => ['role:student']], function () {

        route::get("/",'students\HomeController@index')->name("student");

        // Route::get('/', 'StudentController@index')->name('student.index');
        Route::prefix('/subject')->group(function () {

        });
        Route::prefix('/studProjects')->group(function(){
           route::get("/",'\\'.StudentProjects::class)->name("student-projects");
        });
        Route::prefix('/studProjectsStastics')->group(function(){
            route::get("/",'students\StudProjectsController@Stastistcex')->name("student-projectsStastics");
         });
        Route::prefix('/studAssignments')->group(function () {
           route::get("/",'\\'.StudAssignements::class)->name('student-assignements');
        });
        Route::prefix('/studDoneAssignments')->group(function () {
            route::get("/",'students\StudAssignementsController@indexDoneAssigne')->name('student-DoneAssignements');
         });
         Route::prefix('/studChattingGroup')->group(function(){
            route::get("/", 'students\StudChattingGroupController@index')->name('student-chattingGroup');
         });
         Route::prefix('/studStudyingbooks')->group(function(){
            route::get("/", '\\'.StudStudyingBooks::class)->name('student-studyingbooks');
         });
         Route::prefix('/studBooksChapters/{id}')->group(function(){
         route::get("/", '\\'.StudBooksChapters::class)->name('student-booksChapters');
            });
         Route::prefix('/studFormQuiz')->group(function(){
            route::get("/", 'students\StudStudyingbooksController@indexFormQuiz')->name('student-formQuiz');
         });
         Route::prefix('/studChaptersSummaries')->group(function(){
            route::get("/", 'students\StudStudyingbooksController@indexChaptersSummaries')->name('student-ChaptersSummaries');
         });
         Route::prefix('/studStastistics')->group(function(){
            route::get("/",'\\'.StudStastistics::class)->name('student-stastistics');
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
         route::prefix('/studStudyingSchedule')->group(function(){
            route::get("/", 'students\StudstudyingScheduleController@indexSchedule')->name('student-studyingSchedule');
         });
     })->middleware('auth');
    Route::get('admin/dashboard', 'AdminController@statistics')->name('admin')->middleware('role:admin');
    Route::group(['middleware' => ['perm:admin'], 'prefix' => 'admin'], function () {
        Route::get('statistics', 'AdminController@statistics')->name('admin.statistics');
        Route::get('academic/{department}','AdminController@academic')->name('admin.academic');
        Route::get('department', 'AdminController@department')->name('admin.department');
        Route::get('employees', 'AdminController@employees')->name('admin.employees');
        Route::get('permissions', 'AdminController@permissions')->name('admin.permissions');
        Route::get('notifications', 'AdminController@notifications')->name('admin.notifications');
        // route::get('employee_information', '\\'.App\livewire\Admin\EmployeesInformation::class)->name('admin.employee_information');
        // route::get('managers_information', '\\'.App\livewire\Admin\ManagersInformation::class)->name('admin.managers_information');
        // route::get('sendNotifications_students','\\'.App\livewire\Admin\SendNotificationsstidents::class)->name('admin.sendNotifications_students');
        // route::get('sendNotifications_academics','\\'.App\livewire\admin\SendNotificttionsacademic::class)->name('admin.sendNotifications_academics');
        // route::get('sendNotifications_managers', '\\'.App\livewire\admin\SendNotificationbossdepartment::class)->name('admin.sendNotifications_managers');
        // route::get('permissions_pages','\\'.App\livewire\admin\PermissionPages::class)->name('admin.permissions_ pages');
        // route::get('addUsers_permissions', '\\'.App\livewire\admin\AddPremissionUser::class)->name('admin.addUsers_permissions');
        // Route::get('levels-departments', 'LevelsDepartmentsAdminController@level')->name('admin.levels-departments');
    });
    Route::group(['prefix'=>'managers_information','middleware'=>'auth'
], function(){
    route::get('/', '\\'. App\livewire\Admin\ManagersInformation::class)->name('managers_information');
    route::get('employee_information', '\\'.App\livewire\Admin\EmployeesInformation::class)->name('employee_information');
    route::get('sendNotifications_students','\\'.App\livewire\Admin\SendNotificationsstidents::class)->name('sendNotifications_students');
    route::get('sendNotifications_academics','\\'.App\livewire\admin\SendNotificttionsacademic::class)->name('sendNotifications_academics');
    route::get('sendNotifications_managers', '\\'.App\livewire\admin\SendNotificationbossdepartment::class)->name('sendNotifications_managers');
    route::get('permissions_pages','\\'.App\livewire\admin\PermissionPages::class)->name('permissions_pages');
    route::get('addUsers_permissions', '\\'.App\livewire\admin\AddPremissionUser::class)->name('addUsers_permissions');

});

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
            Route::get('/', 'DepartmentController@index')->name('department.index');
            Route::get('/create', 'DepartmentController@create')->name('department.create')->middleware('perm:adddepartment');
            Route::post('/store', 'DepartmentController@store')->name('department.store')->middleware('perm:adddepartment');
            Route::get('/edit/{id}', 'DepartmentController@edit')->name('department.edit');
            Route::get('/{id}', 'DepartmentController@show')->name('department.show');
            Route::put('/update/{id}', 'DepartmentController@update')->name('department.update');
            Route::delete('/delete/{id}', 'DepartmentController@delete')->name('department.delete');
            Route::get('/{department}/levels', 'DepartmentController@levels')->name('department.levels');
            Route::get('/{department}/statistics', 'DepartmentController@statistics')->name('department.statistics');
            Route::get('/{department}/academics', 'DepartmentController@academics')->name('department.academics');
        });
        Route::prefix('level')->group(function () {
            Route::get('/{id}', 'LevelController@index')->name('level');
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
            Route::get('/{id}', 'GroupController@index')->name('group');
            Route::get('/create', 'GroupController@create')->name('group.create')->middleware('perm:addgroup');
            Route::post('/store', 'GroupController@store')->name('group.store')->middleware('perm:addgroup');
            Route::get('/add-student/{group}', 'GroupController@addStudent')->name('group.add-student');
            Route::post('/add-student/{group}', 'GroupController@storeStudent')->name('group.store-student');

        });
        Route::prefix('practical_group')->group(function () {
            Route::get('/{group}', 'PracticalGroupController@index')->name('practical_group');
            Route::get('/{group}/create', 'PracticalGroupController@create')->name('practical_group.create')->middleware('perm:addpractical_group');
            Route::post('/{group}/store', 'PracticalGroupController@store')->name('practical_group.store')->middleware('perm:addpractical_group');
            Route::get('/{group}/add-student/{practical_group}', '\\'.AddStudents::class)->name('practical_group.add-student');
            Route::post('/{group}/add-student/{practical_group}', 'PracticalGroupController@storeStudent')->name('practical_group.store-student');
        });
        Route::prefix('groupSubject')->group(function () {

        });

        Route::get('/create', 'AcademicController@create')->middleware('perm:addacademic')->name('academic.create');
        Route::post('/store', 'AcademicController@store')->middleware('perm:addacademic')->name('academic.store');

        Route::group(['middleware' => ['role:academic']], function () {
            route::get('/', 'AcademicController@index')->name('academic.home');
            Route::prefix("subject")->group(function(){
                Route::get("/{subject_id}{group_id}",'SubjectController@index')->name("subject.index");
            });


            route::prefix("{subject_id}{group_id}")->group(function(){
                   route::prefix('students')->group(function(){
                    route::get("/",'StudentsController@index')->name("students");
                });
                route::prefix("students-persents")->group(function(){
                    route::get("/",'StudentspersentsController@index')->name("students-persents");
                });
                route::prefix("midexam")->group(function(){
                route::get("/",'MidexamController@index')->name("midexam");
                });
                route::prefix("assignmentsgrdes-stu")->group(function (){
                    route::get("/",'AssignmentsGrdesStuController@index')->name("assignmentsgrdes-stu");
                });
                route::prefix("projectsgrades-stu")->group(function(){
                    route::get("/",'ProjectssGrdesStuController@index')->name("projectsgrades-stu");
                });

                Route::prefix("project")->group(function(){
                    Route::get("/","ProjectController@index")->name("projects");
                    route::get("{project_id}",'\\'.ProjectGroups::class)->name("project");
                });

                Route::prefix('assignment')->group(function(){
                    Route::get("/",'\\'.Assignments::class
                    )->name("assignment");
                });

                route::get("recive-assignments/{id}",'\\'.ReciveAssignments::class
                )->name("recive-assignments");

                route::prefix("studyingbooks")->group(function(){
                route::get("/",'\\'.Studyingbooks::class)->name("studyingbooks");
                });

                route::prefix("forms-quiz")->group(function(){
                route::get("/",'\\'.FormsQuiz::class)->name("forms-quiz");
                });
                route::prefix("studentsworksStastics")->group(function(){
                    route::get("/",'StudentsworksStasticsController@index')->name("studentsworksStastics");
                });

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
            // route::prefix("profile")->group(function(){
            //     route::get("/",'ProfileController@index')->name("profile");
            // });



        });



    })->middleware('auth');

    Route::group(['prefix'=>'qualityMain','middleware' => 'auth'
], function () {
        route::get('/', '\\'.App\Livewire\Quality\QualityMain::class)->name('qualityMain');
        route::get('departlevelquality','\\'.DepartLevelsQuality::class)->name('departlevelquality');


    });


    Route::group(['prefix'=>'managerDepartment','middleware' => 'auth'
    ], function () {
        route::get('/', '\\'.App\Livewire\ManagerOfDepart\ManagDepartMain::class)->name('managerDepartment');
        route::get('managerDepartAcademics','\\'.App\Livewire\ManagerOfDepart\ManageAcademicDepart::class)->name('managerDepartAcademics');
        route::get('notifications_manageDrpart','\\'.App\Livewire\ManagerOfDepart\NotificationManageDrpart::class)->name('notifications_manageDrpart');
        route::get('sendnotification_managerdepart_academic','\\'.App\Livewire\ManagerOfDepart\SendNotificationmanageDepartAcademic::class)->name('sendnotification_managerdepart_academic');
        route::get('sendnotification_managerdepart_student', '\\'.App\Livewire\ManagerOfDepart\SendNotificationmanageDepartStudent::class)->name('sendnotification_managerdepart_student');
        route::get('managerdepart_Stastistic','\\'.App\Livewire\ManagerOfDepart\ManageDepartStastistic::class)->name('managerdepart_Stastistic');
        Route::get('depart_level_Group_mainPage','\\'.App\Livewire\ManagerOfDepart\ManageDepartLevel\DepartLevelMainPage::class)->name('depart_level_Group_mainPage');
        Route::get('practical_groups','\\'.App\Livewire\ManagerOfDepart\ManageDepartLevel\Practicalgroups::class)->name('practical_groups');
        Route::get('depart_level_academic','\\'.App\Livewire\ManagerOfDepart\ManageDepartLevel\DepartLevelAcademicl::class)->name('depart_level_academic');
        Route::get('depart_level_Books','\\'.App\Livewire\ManagerOfDepart\ManageDepartLevel\BooksOfdepartLevel::class)->name('depart_level_Books');
        Route::get('depart_level_booksChapters','\\'.App\Livewire\ManagerOfDepart\ManageDepartLevel\BooksChapters::class)->name('depart_level_booksChapters');
        Route::get('depart_level_allsechedules','\\'.App\Livewire\ManagerOfDepart\ManageDepartLevel\AllSechedulesStudyinhg::class)->name('depart_level_allsechedules');
        Route::get('depart_level_studentsFinalTearmStatistics','\\'.App\Livewire\ManagerOfDepart\ManageDepartLevel\ManageDepartStudentsFinalTearmStatistics::class)->name('depart_level_studentsFinalTearmStatistics');
        Route::get('depart_level_studentsFinalWorkStatistics','\\'.App\Livewire\ManagerOfDepart\ManageDepartLevel\ManageDepartStudentsFinalWorksStatistics::class)->name('depart_level_studentsFinalWorkStatistics');
        Route::get('students_group_information','\\'.App\Livewire\ManagerOfDepart\ManageDepartLevel\StudentsGroupsInformation::class)->name('students_group_information');
        Route::get('final_results_students','\\'.App\Livewire\ManagerOfDepart\ManageDepartLevel\FinalReasultsStudents::class)->name('final_results_students');


    });

    Route::group(['prefix'=>'StudentSaffairs','middleware' => 'auth'
    ], function () {
        route::get('/', '\\'.App\Livewire\StudentsAffairs\DepatmentsStudentsAffairs::class)->name('StudentSaffairs');
        route::get('depart_levels_studentsAffairs','\\'.App\Livewire\StudentsAffairs\DepartLevelsStudentsAffairs::class)->name('depart_levels_studentsAffairs');
        route::get('main_studentsAffairs','\\'.App\Livewire\StudentsAffairs\MainStudentsAffairs::class)->name('main_studentsAffairs');
        route::get('studentsAffairs_main_studentsInformation','\\'.App\Livewire\StudentsAffairs\StudentsAffairsMainStudentsInformation::class)->name('studentsAffairs_main_studentsInformation');
        route::get('studentsAffairs_main_studentsGroups','\\'.App\Livewire\StudentsAffairs\StudentsAffairsStudentsMaingroups::class)->name('studentsAffairs_main_studentsGroups');
        route::get('studentsAffairs_practicalGroups','\\'.App\Livewire\StudentsAffairs\StudentsAffairsStudentPracticalgroups::class)->name('studentsAffairs_practicalGroups');
        route::get('studentsInformation_InGroup','\\'.App\Livewire\StudentsAffairs\StudentsInformationInGroups::class)->name('studentsInformation_InGroup');

    });

//     Route::group(['prefix'=>'departments_admin','middleware'=>'auth'
// ], function(){
//     route::get('/', '\\'. App\livewire\Admin\Departments::class)->name('departments_admin');
//     route::get('admin_statistics','\\'.App\livewire\Admin\AdminStatistics::class)->name('admin_statistics');
//     route::get('employee_admin','\\'.App\livewire\Admin\EmployeesAdmin::class)->name('employee_admin');
//     route::get('employee_information', '\\'.App\livewire\Admin\EmployeesInformation::class)->name('employee_information');
//     route::get('managers_information', '\\'.App\livewire\Admin\ManagersInformation::class)->name('managers_information');
//     route::get('admin_notifications', '\\'.App\livewire\Admin\NotificationsAdmin::class)->name('admin_notifications');
//     route::get('sendNotifications_students','\\'.App\livewire\Admin\SendNotificationsstidents::class)->name('sendNotifications_students');
//     route::get('sendNotifications_academics','\\'.App\livewire\admin\SendNotificttionsacademic::class)->name('sendNotifications_academics');
//     route::get('sendNotifications_managers', '\\'.App\livewire\admin\SendNotificationbossdepartment::class)->name('sendNotifications_managers');
//     route::get('permissions_Admin','\\'.App\livewire\admin\Permissionsadmin::class)->name('permissions_Admin');
//     route::get('permissions_pages','\\'.App\livewire\admin\PermissionPages::class)->name('permissions_ pages');
//     route::get('addUsers_permissions', '\\'.App\livewire\admin\AddPremissionUser::class)->name('addUsers_permissions');

// });
    // Route::prefix('managerOFdepart')->group(function () {
    //     route::get('/', '\\'.ManagDepartMain::class)->name('managerDepartMain');
    // });



    // Route::prefix('quality-')->group(function () {
    //    route::get('/','\\'.DepartLevelsQuality::class)->name('departlevelquality');

    // });


    Route::get('storage/{path}', function ($path) {
        // $filePath = storage_path('app/public/' . $path);

        // if (!File::exists($filePath)) {
        //     abort(404);
        // }

        // $file = File::get($filePath);
        // $type = File::mimeType($filePath);

        // $response = Response::make($file, 200);

        // check if the file is exist and if file not path
        if (!Storage::exists( $path)) {
            abort(404);
        }
        if(strpos($path,'.') === false){
            abort(404);
        }
        $file = Storage::get( $path);
        $type = Storage::mimeType( $path);
        $response = response($file, 200);
        $response->header("Content-Type", $type);

        return $response;





        // $response->header("Content-Type", $type);

        // return $response;
    })->where('path', '.*');
Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/test', function () {
    return view("test");
});
