<?php

use Illuminate\Support\Facades\Auth;
use App\Livewire\Global\User\Profile;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\LevelController;
use App\Livewire\Student\StudStastistics;
use App\Livewire\Academic\Student\Midexam;
use App\Livewire\Student\StudAssignements;
use App\Livewire\Academic\Student\Students;
use App\Livewire\Global\GroupSubject\Index;
use App\Livewire\Academic\Subject\FormsQuiz;
use App\Livewire\Quality\DepartLevelsQuality;
use App\Livewire\Academic\Subject\Assignments;
use App\Livewire\Academic\Subject\ProjectGroups;
use App\Livewire\Academic\Subject\Studyingbooks;
use App\Livewire\Student\Project\StudentProjects;
use App\Livewire\Academic\Student\StudentsPersents;
use App\Livewire\Academic\Student\ProjectsGradesStu;
use App\Livewire\Academic\Subject\ReciveAssignments;
use App\Livewire\Academic\Student\AssignmentsgrdesStu;
use App\Livewire\Student\StudStudyingBooks\StudBooksChapters;
use App\Livewire\Student\StudStudyingBooks\StudStudyingBooks;
use App\Livewire\Academic\Student\WorksStasticsStudentsSuccess;
use App\Livewire\Student\StudStudyingBooks\FormQuiz as StudFormQuiz;
// use Illuminate\Support\Facades\App;


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


// Route::group(['prefix' => '{language?}', 'middleware' => ['setDefaultLanguage']],
$optionalLanguageRoutes = function () {


    Auth::routes(['register' => false]);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')
        ->middleware('auth');
    Route::middleware(['auth'])->group(function () {
        Route::prefix('subject')->group(function () {
        });
        // Route::prefix('level')->group(function () {
        //     Route::get(
        //         '/addSubject/{level}',
        //         '\\'
        //             . AddSubject::class
        //     )->name('level.addsubject');
        //     Route::get('/', 'SubjectLevelController@index')->name('level.index');
        // });
        Route::prefix('groupsubject')->group(function () {
            Route::get('/{group}', '\\' . Index::class)->name('groupsubject');
        });
        Route::get('profile', '\\' . Profile::class)->name('profile');
        // Route::get('/profile',Profile::class )->name('profile');
    });
    Route::group(['prefix' => '/student', 'middleware' => ['role:student']], function () {

        route::get("/", 'students\HomeController@index')->name("student");

        // Route::get('/', 'StudentController@index')->name('student.index');
        Route::prefix('/subject')->group(function () {
        });
        Route::prefix('/studProjects')->group(function () {
            route::get("/", '\\' . StudentProjects::class)->name("student-projects");
        });
        Route::prefix('/studProjectsStastics')->group(function () {
            route::get("/", 'students\StudProjectsController@Stastistcex')->name("student-projectsStastics");
        });
        Route::prefix('/studAssignments')->group(function () {
            route::get("/", '\\' . StudAssignements::class)->name('student-assignements');
        });
        Route::prefix('/studDoneAssignments')->group(function () {
            route::get("/", 'students\StudAssignementsController@indexDoneAssigne')->name('student-DoneAssignements');
        });
        Route::prefix('/studChattingGroup')->group(function () {
            route::get("/", 'students\StudChattingGroupController@index')->name('student-chattingGroup');
        });
        Route::prefix('/studStudyingbooks')->group(function () {
            route::get("/", '\\' . StudStudyingBooks::class)->name('student-studyingbooks');
        });
        Route::prefix('/studBooksChapters/{id}')->group(function () {
            route::get("/", '\\' . StudBooksChapters::class)->name('student-booksChapters');
            route::get(
                "studFormQuiz",
                '\\' . StudFormQuiz::class
            )->name('student-formQuiz');
        });
        Route::prefix('/studChaptersSummaries')->group(function () {
            route::get("/", 'students\StudStudyingbooksController@indexChaptersSummaries')->name('student-ChaptersSummaries');
        });
        Route::prefix('/studStastistics')->group(function () {
            route::get("/", '\\' . StudStastistics::class)->name('student-stastistics');
        });
        Route::prefix('/studArchieve')->group(function () {
            route::get("/", 'students\StudArchieveController@indexArchieve')->name('student-archieve');
        });
        route::prefix('/studArchieveProjects')->group(function () {
            route::get("/", 'students\StudArchieveController@indexArchieveProjects')->name('student-archieveProjects');
        });
        route::prefix('/studArchieveAssignements')->group(function () {
            route::get("/", 'students\StudArchieveController@indexArchieveAssignements')->name('student-archieveAssignements');
        });
        route::prefix('/studGrades')->group(function () {
            route::get("/", 'students\StudArchieveController@indexArchieveGrades')->name('student-grades');
        });
        route::prefix('/studStudyingSchedule')->group(function () {
            route::get("/", 'students\StudstudyingScheduleController@indexSchedule')->name('student-studyingSchedule');
        });
    })->middleware('auth');
    Route::prefix('/')->group(function () {
        Route::get('vision_of_system', 'MainDetalisOFSystemLoginController@vision_of_system')->name('vision_of_system');
        Route::get('targets_of_system', 'MainDetalisOFSystemLoginController@targets_of_system')->name('targets_of_system');
        Route::get('messageOFsystem', 'MainDetalisOFSystemLoginController@messageOFsystem')->name('messageOFsystem');
    });
    Route::get('admin/dashboard', 'AdminController@statistics')->name('admin')->middleware('role:admin');
    Route::group(['middleware' => ['perm:admin'], 'prefix' => 'admin'], function () {
        Route::get('statistics', 'AdminController@statistics')->name('admin.statistics');
        Route::get('academic/{department}', 'AdminController@academic')->name('admin.academic');
        Route::get('department', 'AdminController@department')->name('admin.department');
        Route::get('employees', 'AdminController@employees')->name('admin.employees');
        Route::get('permissions', 'AdminController@permissions')->name('admin.permissions');
        Route::get('notifications', '\\' . App\Livewire\Admin\Notifications::class)->name('admin.notifications');
        Route::get('{department}/levelsOfDepartments', 'AdminController@levelsOfDepartments')->name('admin.levelsOfDepartments');
        Route::get('{level}/students_data', 'AdminController@students_data')->name('admin.students_data');
        Route::get('{level}/students_groups', 'AdminController@students_groups')->name('admin.students_groups');
        Route::get('academic_departments', 'AdminController@academic_mobile')->name('admin.academic_departments');
    });
    Route::group([
        'prefix' => 'managers_information', 'middleware' => ['auth', 'role:admin']
    ], function () {
        route::get('/', '\\' . App\Livewire\Admin\ManagersInformation::class)->name('managers_information');
        route::get('/{roleName}/employees_information', '\\' . App\Livewire\Admin\EmployeesInformation::class)->name('employees_information');
        route::get('employee_information', '\\' . App\Livewire\Admin\EmployeesInformation::class)->name('employee_information');
        route::get('allEmolpyees_Information', '\\' . App\Livewire\Admin\AllEmolpyeesInformation::class)->name('allEmolpyees_Information');
        route::get('sendNotifications_students', '\\' . App\Livewire\Admin\SendNotificationsstidents::class)->name('sendNotifications_students');
        route::get('sendNotifications_academics', '\\' . App\Livewire\Admin\SendNotificttionsacademic::class)->name('sendNotifications_academics');
        route::get('sendNotifications_managers', '\\' . App\Livewire\Admin\SendNotificationbossdepartment::class)->name('sendNotifications_managers');
        route::get('permissions_pages', '\\' . App\Livewire\Admin\PermissionPages::class)->name('permissions_pages');
        route::get('addUsers_permissions', '\\' . App\Livewire\Admin\AddPremissionUser::class)->name('addUsers_permissions');
        // route::get('students_data','\\'.App\Livewire\Admin\StudentsData::class)->name('students_data');
        route::get('admin/{level}/students_information', '\\' . App\Livewire\Admin\LevelStudentsInformation::class)->name('students_information');
        route::get('{LId}/students_main_groups', '\\' . App\Livewire\Admin\StudentsMainGroups::class)->name('students_main_groups');
        route::get('{LId}/show_student_inGroups/{group}', '\\' . App\Livewire\Admin\StudentsInformationInGroups::class)->name('show_student_inGroups');
        route::get('students_grades', '\\' . App\Livewire\Admin\StudentsGrades::class)->name('students_grades');
        // route::group(['prefix'=>'{level}'],function(){
        //     route::get('students_schedule','\\'.App\Livewire\Admin\StudentsSchedule::class)->name('students_schedule');
        // });
        route::get('students_schedule/{level}', '\\' . App\Livewire\Admin\StudentsSchedule::class)->name('students_schedule');
    });

    Route::prefix('/academic')->group(function () {
        // Route::prefix('student')->group(function () {
        //     Route::get('/index', function () {
        //         return view('');
        //     })->name('student.index');
        //     Route::get('/create', 'StudentController@create')->name('student.create')->middleware('perm:addstudent');
        //     Route::post('/store', 'StudentController@store')->name('student.store')->middleware('perm:addstudent');
        //     Route::get('create-excel', 'StudentController@createExcel')->name('student.create-excel')->middleware('perm:addstudent');
        //     Route::post('store-excel', 'StudentController@storeExcel')->name('student.store-excel')->middleware('perm:addstudent');
        //     Route::get('/edit/{id}', 'StudentController@edit')->name('student.edit');
        //     Route::put('/update/{id}', 'StudentController@update')->name('student.update');
        //     Route::delete('/delete/{id}', 'StudentController@delete')->name('student.delete');
        // });
        // Route::prefix('department')->group(function () {
        //     Route::get('/', 'DepartmentController@index')->name('department.index');
        //     Route::get('/create', 'DepartmentController@create')->name('department.create')->middleware('perm:adddepartment');
        //     Route::post('/store', 'DepartmentController@store')->name('department.store')->middleware('perm:adddepartment');
        //     Route::get('/edit/{id}', 'DepartmentController@edit')->name('department.edit');
        //     Route::get('/{id}', 'DepartmentController@show')->name('department.show');
        //     Route::put('/update/{id}', 'DepartmentController@update')->name('department.update');
        //     Route::delete('/delete/{id}', 'DepartmentController@delete')->name('department.delete');
        //     Route::get('/{department}/levels', 'DepartmentController@levels')->name('department.levels');
        //     Route::get('/{department}/statistics', 'DepartmentController@statistics')->name('department.statistics');
        //     Route::get('/{department}/academics', 'DepartmentController@academics')->name('department.academics');
        // });
        // Route::prefix('level')->group(function () {
        //     Route::get('/{id}', 'LevelController@index')->name('level');
        //     Route::get('/create', 'LevelController@create')->name('level.create')->middleware('perm:addlevel');
        //     Route::post('/store', 'LevelController@store')->name('level.store')->middleware('perm:addlevel');
        //     Route::get('/edit/{id}', 'LevelController@edit')->name('level.edit');
        //     Route::put('/update/{id}', 'LevelController@update')->name('level.update');
        //     Route::delete('/delete/{id}', 'LevelController@delete')->name('level.delete');
        // });
        // Route::prefix('subject')->group(function () {
        //     Route::get('/index', 'SubjectController@index')->name('subject.index');
        //     Route::get('/create', 'SubjectController@create')->name('subject.create');
        //     Route::post('/store', 'SubjectController@store')->name('subject.store');
        //     Route::get('/edit/{id}', 'SubjectController@edit')->name('subject.edit');
        //     Route::put('/update/{id}', 'SubjectController@update')->name('subject.update');
        //     Route::delete('/delete/{id}', 'SubjectController@delete')->name('subject.delete');
        // });
        // Route::prefix('role')->group(function () {
        //     Route::get('/index', 'RoleController@index')->name('role.index');
        //     Route::get('/create', 'RoleController@create')->name('role.create');
        //     Route::post('/store', 'RoleController@store')->name('role.store');
        //     Route::get('/edit/{id}', 'RoleController@edit')->name('role.edit');
        //     Route::put('/update/{id}', 'RoleController@update')->name('role.update');
        //     Route::delete('/delete/{id}', 'RoleController@delete')->name('role.delete');
        // });
        // Route::prefix('Permission')->group(function () {
        //     Route::get('/index', 'PermissionController@index')->name('primmision.index');
        //     Route::get('/create', 'PermissionController@create')->name('primmision.create');
        //     Route::post('/store', 'PermissionController@store')->name('primmision.store');
        //     Route::get('/edit/{id}', 'PermissionController@edit')->name('primmision.edit');
        //     Route::put('/update/{id}', 'PermissionController@update')->name('primmision.update');
        //     Route::delete('/delete/{id}', 'PermissionController@delete')->name('primmision.delete');
        // });


        // Route::prefix('group')->group(function () {
        //     Route::get('/{id}', 'GroupController@index')->name('group');
        //     Route::get('/create', 'GroupController@create')->name('group.create')->middleware('perm:addgroup');
        //     Route::post('/store', 'GroupController@store')->name('group.store')->middleware('perm:addgroup');
        //     Route::get('/add-student/{group}', 'GroupController@addStudent')->name('group.add-student');
        //     Route::post('/add-student/{group}', 'GroupController@storeStudent')->name('group.store-student');
        // });
        // Route::prefix('practical_group')->group(function () {
        //     Route::get('/{group}', 'PracticalGroupController@index')->name('practical_group');
        //     Route::get('/{group}/create', 'PracticalGroupController@create')->name('practical_group.create')->middleware('perm:addpractical_group');
        //     Route::post('/{group}/store', 'PracticalGroupController@store')->name('practical_group.store')->middleware('perm:addpractical_group');
        //     Route::get('/{group}/add-student/{practical_group}', '\\' . AddStudents::class)->name('practical_group.add-student');
        //     Route::post('/{group}/add-student/{practical_group}', 'PracticalGroupController@storeStudent')->name('practical_group.store-student');
        // });
        // Route::prefix('groupSubject')->group(function () {
        // });

        // Route::get('/create', 'AcademicController@create')->middleware('perm:addacademic')->name('academic.create');
        // Route::post('/store', 'AcademicController@store')->middleware('perm:addacademic')->name('academic.store');

        Route::group(['middleware' => ['role:academic']], function () {
            route::get('/', 'AcademicController@index')->name('academic.home');
            Route::prefix("subject")->group(function () {
                Route::get("/{group_subject}", 'SubjectController@index')->name("subject.index");
            });


            Route::prefix("students")->group(function () {
                Route::get("/", '\\' . App\Livewire\Students\Chat::class)->name("homeANDchat");
            });

            //     Route::group(['prefix'=>'homeANDchat','middleware' => 'auth'
            // ], function () {
            //         route::get('/', '\\'.App\Livewire\Students\HomeWithChat::class)->name('homeANDchat');

            //     });
            // Route::get('/homeANDchat','\\'.App\Livewire\Students\Chat::class);


            route::prefix("{group_subject}")->group(function () {
                route::get('students', '\\' . Students::class)->name("students");
                route::get('students-persents', '\\' . StudentsPersents::class)->name("students-persents");
                route::get('midexam', '\\' . Midexam::class)->name("midexam");
                route::get(
                    'assignmentsgrdes-stu',
                    '\\' . AssignmentsgrdesStu::class
                )->name("assignmentsgrdes-stu");
                route::get('projectsgrades-stu', '\\' . ProjectsGradesStu::class)->name("projectsgrades-stu");
                route::get('studentsworksStastics', 'StudentsworksStasticsController@index')->name("studentsworksStastics");
                route::get("worksStasticsStudents/{s}", '\\' . WorksStasticsStudentsSuccess::class)->name("worksStasticsStudentsSuccess");
                route::get("studyingbooks", '\\' . Studyingbooks::class)->name("studyingbooks");
                route::get("forms-quiz", '\\' . FormsQuiz::class)->name("forms-quiz");

                // route::prefix("midexam")->group(function(){
                // route::get("/",'MidexamController@index')->name("midexam");
                // });
                // route::prefix("assignmentsgrdes-stu")->group(function (){
                //     route::get("/",'AssignmentsGrdesStuController@index')->name("assignmentsgrdes-stu");
                // });
                // route::prefix("projectsgrades-stu")->group(function(){
                //     route::get("/",'ProjectssGrdesStuController@index')->name("projectsgrades-stu");
                // });

                Route::prefix("project")->group(function () {
                    Route::get("/", "ProjectController@index")->name("projects");
                    route::group(['prefix' => '{project_id}'], function () {
                        route::get("", '\\' . ProjectGroups::class)->name("project");
                        route::get("projectsStastics", 'ProjectsStasticsController@index')->name("projectsStastics");
                    });

                    Route::get(
                        '{project_id}/add-student/{pg_id}',
                        '\\' . App\Livewire\Components\Academic\AddStudents::class
                    )->name('project.add-student');
                });

                Route::get(
                    "assignment",
                    '\\' . Assignments::class
                )->name("assignment");

                route::get(
                    "recive-assignments/{id}",
                    '\\' . ReciveAssignments::class
                )->name("recive-assignments");

                // route::prefix("")->group(function(){
                // });

                // route::prefix("forms-quiz")->group(function(){
                // route::get("forms-quiz",'\\'.FormsQuiz::class)->name("forms-quiz");
                // });
                // route::prefix("studentsworksStastics")->group(function(){
                //     route::get("/",'StudentsworksStasticsController@index')->name("studentsworksStastics");
                // });

            });






            route::prefix("sendnotification")->group(function () {
                route::get("/", 'SendnotificationController@index')->name("sendnotification");
            });
            route::prefix('main_academic_sechedules')->group(function () {
                route::get("/", 'StudyingScheduleController@main_academic_sechedules')->name("main_academic_sechedules");
            });
            route::prefix("mySchedule_studying")->group(function () {
                route::get("/", 'StudyingScheduleController@academic_schedule')->name("mySchedule_studying");
            });
            // route::prefix('students_Schedule_studying')->group(function(){
            //     route::get("/",'StudyingScheduleController@students_Schedule_studying')->name("students_Schedule_studying");
            // });
            route::get('students_Schedule_studying', '\\' . App\Livewire\Academic\StudyingSchedule\StudentsScheduleStudying::class)->name('students_Schedule_studying');
            route::prefix('classes_Schedules_studying')->group(function () {
                route::get("/", 'StudyingScheduleController@classes_Schedules_studying')->name("classes_Schedules_studying");
            });
            route::get('download_schedule', 'StudyingScheduleController@download_schedule')->name('download_schedule');


            route::prefix("stasticsallsubject")->group(function () {
                route::get("/", 'StasticsallsubjectController@index')->name("stasticsallsubject");
            });
            route::prefix("permissions")->group(function () {
                route::get("/", 'PermissionController@index')->name("permissions");
            });
            route::prefix("permissionsSubject")->group(function () {
                route::get("/", 'PermissionController@indexpermissSubject')->name("permissionsSubject");
            });
            route::prefix("worksStasticsAssignements")->group(function () {
                route::get("/", 'WorksStasticsAssignementsController@index')->name("worksStasticsAssignements");
            });
            route::prefix("worksStasticsProjects")->group(function () {
                route::get("/", 'WorksStasticsProjectsController@index')->name("worksStasticsProjects");
            });
            route::prefix("archieve")->group(function () {
                route::get("/", 'ArchieveController@index')->name("archieve");
            });
            route::prefix("archieveAssiginFolder")->group(function () {
                route::get("/", 'ArchieveAssiginFolderController@index')->name("archieveAssiginFolder");
            });
            route::prefix("archieveDisplayfilescoming")->group(function () {
                route::get("/", 'ArchieveDisplayfilescomingController@index')->name("archieveDisplayfilescoming");
            });
            // route::prefix("profile")->group(function(){
            //     route::get("/",'ProfileController@index')->name("profile");
            // });

        });
    })->middleware('auth');

    Route::group([
        'prefix' => 'qualityMain', 'middleware' => ['auth', 'role:QualityManagement']
    ], function () {
        route::get('/', '\\' . App\Livewire\Quality\QualityDepartments::class)->name('quality_departments');
        route::get('{department}/departlevelquality', '\\' . DepartLevelsQuality::class)->name('departlevelquality');
        Route::group(['prefix' => '{level}'], function () {
            Route::get('qualityBoardMain', '\\' . App\Livewire\Quality\QualityBoardMain::class)->name('quality_board_main');
            Route::get('create_subject', '\\' . App\Livewire\Quality\CreateSubjectsQuality::class)->name('create_subject');
            Route::get('subjectsData_forTeacher', '\\' . App\Livewire\Quality\SubjectsDataForTeacher::class)->name('subjectsData_forTeacher');
        });
        // route::get('quality_board_main','\\'.App\Livewire\Quality\QualityBoardMain::class)->name('quality_board_main');
        // route::get('create_subject','\\'.App\Livewire\Quality\CreateSubjectsQuality::class)->name('create_subject');
        // route::get('subjectsData_forTeacher','\\'.App\Livewire\Quality\SubjectsDataForTeacher::class)->name('subjectsData_forTeacher');

    });


    Route::group([
        'prefix' => 'managerDepartment', 'middleware' => ['auth', 'role:HeadOfDepartment']
    ], function () {
        route::get('/', '\\' . App\Livewire\ManagerOfDepart\ManagDepartMain::class)->name('managerDepartment');
        route::get('managerDepartAcademics', '\\' . App\Livewire\ManagerOfDepart\ManageAcademicDepart::class)->name('managerDepartAcademics');
        route::get('notifications_manageDrpart', '\\' . App\Livewire\ManagerOfDepart\NotificationManageDrpart::class)->name('notifications_manageDrpart');
        route::get('sendnotification_managerdepart_academic', '\\' . App\Livewire\ManagerOfDepart\SendNotificationmanageDepartAcademic::class)->name('sendnotification_managerdepart_academic');
        route::get('sendnotification_managerdepart_student', '\\' . App\Livewire\ManagerOfDepart\SendNotificationmanageDepartStudent::class)->name('sendnotification_managerdepart_student');
        route::get('managerdepart_Stastistic', '\\' . App\Livewire\ManagerOfDepart\ManageDepartStastistic::class)->name('managerdepart_Stastistic');
        route::get('main_departManager_sechedules', '\\' . App\Livewire\ManagerOfDepart\MainSechedules::class)->name('main_departManager_sechedules');
        route::get('teachers_Schedules_studying', '\\' . App\Livewire\ManagerOfDepart\AcademicsSchedules::class)->name('teachers_Schedules_studying');

        // يتم استخدام البرنامج الوسيط للتحقق من ملكية المستوى هنا للتحقق مما إذا كان المستخدم هو رئيس القسم  الخاص بالمستوى
        Route::group(['prefix' => '{level}', 'middleware' => "verifyLevelOwnership"], function () {
            Route::get('depart_level_Group_mainPage', '\\' . App\Livewire\ManagerOfDepart\ManageDepartLevel\DepartLevelMainPage::class)->name('depart_level_Group_mainPage');
            Route::get('practical_groups', '\\' . App\Livewire\ManagerOfDepart\ManageDepartLevel\Practicalgroups::class)->name('practical_groups');
            Route::get('depart_level_academic', '\\' . App\Livewire\ManagerOfDepart\ManageDepartLevel\DepartLevelAcademicl::class)->name('depart_level_academic');
            Route::get('depart_level_Books', '\\' . App\Livewire\ManagerOfDepart\ManageDepartLevel\BooksOfdepartLevel::class)->name('depart_level_Books');
            Route::get('depart_level_booksChapters/{level_subject}', '\\' . App\Livewire\ManagerOfDepart\ManageDepartLevel\BooksChapters::class)->name('depart_level_booksChapters');
            Route::get('depart_level_allsechedules', '\\' . App\Livewire\ManagerOfDepart\ManageDepartLevel\AllSechedulesStudyinhg::class)->name('depart_level_allsechedules');
            Route::get('depart_level_studentsFinalTearmStatistics', '\\' . App\Livewire\ManagerOfDepart\ManageDepartLevel\ManageDepartStudentsFinalTearmStatistics::class)->name('depart_level_studentsFinalTearmStatistics');
            Route::get('depart_level_studentsFinalWorkStatistics', '\\' . App\Livewire\ManagerOfDepart\ManageDepartLevel\ManageDepartStudentsFinalWorksStatistics::class)->name('depart_level_studentsFinalWorkStatistics');
            // Route::get('students_group_information','\\'.App\Livewire\ManagerOfDepart\ManageDepartLevel\StudentsGroupsInformation::class)->name('students_group_information');
            Route::get('final_results_students', '\\' . App\Livewire\ManagerOfDepart\ManageDepartLevel\FinalReasultsStudents::class)->name('final_results_students');
            route::prefix('{group}')
                ->group(function () {
                    route::get('studentsInformationInGroup', '\\' . App\Livewire\ManagerOfDepart\ManageDepartLevel\StudentsGroupsInformation::class)->name('students_group_information');
                });
        });
    });

    Route::group([
        'prefix' => 'StudentSaffairs', 'middleware' => ['auth', 'role:StudentAffairs']
    ], function () {
        route::get('/', '\\' . App\Livewire\StudentsAffairs\DepatmentsStudentsAffairs::class)->name('StudentSaffairs');
        route::get('{DId}/depart_levels_studentsAffairs', '\\' . App\Livewire\StudentsAffairs\DepartLevelsStudentsAffairs::class)->name('depart_levels_studentsAffairs');
        route::get('{LId}/main_studentsAffairs', '\\' . App\Livewire\StudentsAffairs\MainStudentsAffairs::class)->name('main_studentsAffairs');
        route::get('{LId}/studentsAffairs_main_studentsInformation', '\\' . App\Livewire\StudentsAffairs\StudentsAffairsMainStudentsInformation::class)->name('studentsAffairs_main_studentsInformation');
        route::get('{LId}/studentsAffairs_main_studentsGroups', '\\' . App\Livewire\StudentsAffairs\StudentsAffairsStudentsMaingroups::class)->name('studentsAffairs_main_studentsGroups');
        route::get('{LId}/studentsAffairs_practicalGroups', '\\' . App\Livewire\StudentsAffairs\StudentsAffairsStudentPracticalgroups::class)->name('studentsAffairs_practicalGroups');
        route::get('{LId}/studentsInformation_InGroup/{group}', '\\' . App\Livewire\StudentsAffairs\StudentsInformationInGroups::class)->name('studentsInformation_InGroup');
    });

    Route::group([
        'prefix' => 'control_grades', 'middleware' => ['auth', 'role:Control']
    ], function () {
        route::get("/", 'ControlGradesMainController@ControlGradesDepartments')->name("control_grades_departments");

        route::get("{department}/control_grades_levels", 'ControlGradesMainController@ControlGradeslevels')->name("control_grades_levels");
        route::prefix('{level}')
            ->group(function () {
                route::get('control_grades_main', 'ControlGradesMainController@ControlGradesMain')->name("control_grades_main");
                route::get('control_grades_statistics', 'ControlGradesMainController@ControlGradesStatistics')->name("control_grades_statistics");
                route::get('control_students_grade', '\\' . App\Livewire\ControlGrades\ControlStudentsGrade::class)->name('control_students_grade');
                route::get('control_final_reasults_students', '\\' . App\Livewire\ControlGrades\ControlFinalReasultsStudents::class)->name('control_final_reasults_students');
            });
        // route::get("/control_grades_main", 'ControlGradesMainController@ControlGradesMain')->name("control_grades_main");
        // route::get("/control_grades_statistics", 'ControlGradesMainController@ControlGradesStatistics')->name("control_grades_statistics");

        // route::get('control_students_grade', '\\' . App\Livewire\ControlGrades\ControlStudentsGrade::class)->name('control_students_grade');
        // route::get('control_final_reasults_students', '\\' . App\Livewire\ControlGrades\ControlFinalReasultsStudents::class)->name('control_final_reasults_students');
    });

    Route::group([
        'prefix' => 'departments_sechedules', 'middleware' => ['auth', 'role:SechadulesManagement']
    ], function () {
        route::get('/', '\\' . App\Livewire\ManagementOFSechedules\DepartmentsSechedules::class)->name('departments_sechedules');
        route::group(['prefix' => '{department}'], function () {
            route::get('main_sechedules', '\\' . App\Livewire\ManagementOFSechedules\MainSechedules::class)->name('main_sechedules');
            route::get('academics_sechedules', '\\' . App\Livewire\ManagementOFSechedules\AcademicsSechedules::class)->name('academics_sechedules');
            route::get('levels_sechedules', '\\' . App\Livewire\ManagementOFSechedules\LevelsSechedules::class)->name('levels_sechedules');
            route::group(['prefix' => '{level}'], function () {
                route::get('students_sechedules', '\\' . App\Livewire\ManagementOFSechedules\StudentsSechedules::class)->name('students_sechedules');
            });
        });
        // route::get('levels_sechedules','\\'.App\Livewire\ManagementOFSechedules\LevelsSechedules::class)->name('levels_sechedules');
        // route::get('main_sechedules','\\'.App\Livewire\ManagementOFSechedules\MainSechedules::class)->name('main_sechedules');
        route::get('classes_sechedules', '\\' . App\Livewire\ManagementOFSechedules\ClassesSechedules::class)->name('classes_sechedules');
        // route::get('academics_sechedules', '\\'.App\Livewire\ManagementOFSechedules\AcademicsSechedules::class)->name('academics_sechedules');


    });
    // Route::prefix('managerOFdepart')->group(function () {
    //     route::get('/', '\\'.ManagDepartMain::class)->name('managerDepartMain');
    // });



    // Route::prefix('quality-')->group(function () {
    //    route::get('/','\\'.DepartLevelsQuality::class)->name('departlevelquality');

    // });
};
// Route::group(
//     ['prefix' => '/', 'middleware' => ['web', 'setDefaultLanguage']],
//     $optionalLanguageRoutes
// );
// $languageList = 'ar|en';
// if ($languageList) {
//     Route::group(
//         ['prefix' => '/{language?}', 'where' => ['language' => $languageList], 'middleware' => ['web']],
//         $optionalLanguageRoutes
//     );
// }
$optionalLanguageRoutes();
Route::get('/greeting/{locale}', function (string $locale) {
    if (!in_array($locale, ['en', 'ar'])) {
        abort(400);
    }

    session()->put('language', $locale);
    return redirect()->route('login');
    // ...
});

// Add routes without prefix


Route::get('storage/{path}', function ($path) {
    // $filePath = storage_path('app/public/' . $path);

    // if (!File::exists($filePath)) {
    //     abort(404);
    // }

    // $file = File::get($filePath);
    // $type = File::mimeType($filePath);

    // $response = Response::make($file, 200);

    // check if the file is exist and if file not path
    if (!Storage::exists($path)) {
        abort(404);
    }
    if (strpos($path, '.') === false) {
        abort(404);
    } elseif (!auth()->check() && in_array(pathinfo($path, PATHINFO_EXTENSION), ['txt', 'pdf', 'powerpoint', 'excel', 'zip', 'rar', '7z'])) {
        abort(404);
    }
    $file = Storage::get($path);
    $type = Storage::mimeType($path);
    $response = response($file, 200);
    $response->header("Content-Type", $type);

    return $response;





    // $response->header("Content-Type", $type);

    // return $response;
})->where('path', '.*');
Route::get('/', function () {
    return redirect()->route('login');
});
// Route::filter('before', function () {
//     // Do stuff before every request to your application...

//     // Default language ($lang) & current uri language ($lang_uri)
//     $lang = 'ar';
//     $lang_uri = URI::segment(1);

//     // Set default session language if none is set
//     if (!Session::has('language')) {
//         Session::put('language', $lang);
//     }

//     // Route language path if needed
//     if ($lang_uri !== 'en' && $lang_uri !== 'ar') {
//         return Redirect::to($lang . '/' . URI::current());
//     }
//     // Set session language to uri
//     elseif ($lang_uri !== Session::get('language')) {
//         Session::put('language', $lang_uri);
//     }
// });
Route::get('/test', '\\' . App\Livewire\Test::class)->name('test');
