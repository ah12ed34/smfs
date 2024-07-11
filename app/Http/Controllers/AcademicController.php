<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Repositories\EmployeesRepository;

class AcademicController extends Controller
{
    protected $academicR;

    public function __construct()
    {
        $this->academicR = new EmployeesRepository();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $academic = Academic::findOrfail(auth()->user()->id);
        // dd(
        //     $this->academicR->getCoursesByAcademic($academic)->get(),
        // );
        return view('academic.home',['academic'=>$this->academicR->getCoursesByAcademic($academic)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $departments = Department::all();
        return view('academic.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'nullable|email',
            'password' => 'required',
            'department_id' => 'required|exists:departments,id',
        ]);
        Academic::create($request);
        return redirect()->route('academic.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Academic $academic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Academic $academic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Academic $academic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Academic $academic)
    {
        //
    }
}
