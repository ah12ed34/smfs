<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\studying;
use App\Models\Department;
use App\Models\Level;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $departments = Department::all();
        if($departments->isEmpty())
            return redirect()->route('department.create')->with('error',trans('error.create_department_first'));
        $levels =  Level::where('department_id', $departments->first()->id)->get();
        if($levels->isEmpty())
            return redirect()->route('level.create')->with('error',trans('error.create_level_first'));
        return view('student.create', compact('departments', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
        $request->validate([
            'id'=>'required|numeric',
            'name' => 'required|string',
            'last_name' => 'required|string',
            'username' => 'nullable',
            'email' => 'nullable|email',
            'password' => 'required',
            'department_id' => 'required|numeric',
            'level_id' => 'required|numeric'
            ,]);
        try{
            if($request->hasFile('image'))
            $request['photo'] = $request->file('image')->store('images/profile', 'public');
            Student::create_student($request);

            return redirect()->route('student.create')->with('success', 'Student created successfully.');

        }catch(\Exception $e){
            echo($e->getMessage());
        }
            }
    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
