<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Academic;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;

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
}
