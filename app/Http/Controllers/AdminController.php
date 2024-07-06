<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Middleware\RoleMiddleware;
use App\Models\Department;
use App\Models\Academic;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use app\Models\permissions;
use app\Models\notifications;
use app\Models\levelsOfDepartments;
use app\Models\students_data;
use app\Models\academic_mobile;
use App\Tools\MyApp;
use App\Models\Level;
use App\Models\Role as ModelsRole;
use App\Models\Role ;


class AdminController extends Controller
{
    public $perPage = MyApp::perPageLists;

    public $department;

    public function mount($DId){
        $this->department = Department::findOrFail($DId);
    }
    //
    public function statistics()
    {
        $totleStudents = Student::all()->count();
        $totleUsers = User::all()->count();
        $totleTeachers = Academic::all()->count();
        $totalEmployees = User::WhereDoesntHave('student') ->count();
        $totalQualityManagement = Role::where('name','QualityManagement')->first()->Users()->count();
        $totalStudentAffairs = Role::where('name','StudentAffairs')->first()->Users()->count();
        $totalControl = Role::where('name','Control')->first()->Users()->count();
        $totalSechadulesManagement = Role::where('name','SechadulesManagement')->first()->Users()->count();
        $totalManagers = Role::whereIn('name', [
            'Dean',
            'SuperAdmin',
            'admin',
            'ViceDeanForAcademics',
            'ViceDeanForStudentAffairs',
            'ViceDeanForQualityAffairs',
            'HeadOfDepartment'
        ])->first()->users()->count();
        return view('admin.statistics', compact('totleStudents', 'totleUsers', 'totleTeachers', 'totalEmployees',"totalQualityManagement",
        'totalStudentAffairs','totalControl','totalSechadulesManagement','totalManagers'));
    }

    public function academic(Department $department)
    {
        return view('admin.academic', ['depa'=>$department]);
    }

    public function department()
    {
        $departments = Department::all();
        return view('admin.department', compact('departments'));
    }
    public function employees()
    {
        return view('admin.employees');
    }
    public function permissions()
    {
        return view('admin.permissions');
    }
    public function notifications()
    {
        return view('admin.notifications');
    }

    public function getLevelsByDepartment($departmentId)
    {
        // استرجاع المستويات التي تنتمي إلى القسم المحدد
        $levels = Level::where('department_id', $departmentId)->get();
        if ($levels->isEmpty()) {
            // return redirect()->route('level.create')->with('error', __('sysmass.create_level_first'));
            return response()->json(['error' => __('sysmass.create_level_first')]);

        }
        return response()->json($levels);
    }
    public function levelsOfDepartments(Department $department)
    {
        $levels = $department->levels()->get();
        return view('admin.levelsOfDepartments',compact('levels'));
    }

    public function students_data(Level $level)
    {
        // $levels = $levels->levels()->get();

        return view('admin.students_data',compact('level'));
    }

    public function academic_mobile()
    {
        return view('admin.academic_mobile');
    }
}
