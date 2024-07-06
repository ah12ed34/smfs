<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Academic;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;
use app\Models\employees;
use app\Models\permissions;
use app\Models\notifications;
use app\Models\levelsOfDepartments;
use app\Models\students_data;
use App\Tools\MyApp;
use App\Models\Level;








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
        return view('admin.statistics', compact('totleStudents', 'totleUsers', 'totleTeachers'));
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

}
