<?php

namespace App\Http\Controllers;

use App\Http\Requests\subjectRequest;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Level;
use Illuminate\Support\Facades\Storage;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('academic.subject.subject');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $departments = Department::all();
        return view('academic.subject.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(subjectRequest $request)
    {
        //
        // $request->validated();
        // dd($request->all(),$request->file('image'));
        try{
            $directory = 'public/subject/image';
            Storage::makeDirectory($directory);
            $request['image'] = $request->file('image')->store($directory);
            $request['id'] = $request['code'];
            $request['name'] = $request['subjectname'];
            Subject::create($request->only(['id','name','level_id','image','description']));
            return redirect()->route("student.create") ->with('success',trans('general.success_subject_create'));
        }catch(\Exception $e){
            if(Storage::exists($request['image']))
            Storage::delete($request['image']);
            return redirect()->route("student.create") ->with('error',trans('general.error_subject_create'));
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        //
    }
    public function addSubjectToLevel(Level $level){
        return view('global.subject.level_subject',compact('level'));
    }
}
