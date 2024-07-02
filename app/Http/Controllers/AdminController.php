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






class AdminController extends Controller
{
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
    public function levelsOfDepartments()
    {
        return view('admin.levelsOfDepartments');
    }
    public function students_data()
    {
        return view('admin.students_data');
    }
}
