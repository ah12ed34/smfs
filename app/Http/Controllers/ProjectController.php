<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\GroupSubject;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // public $group_subject;
    // public function __construct($subject_id,$group_id)
    // {
    //     $this->middleware('auth');
    //     $this->group_subject = GroupSubject::where('subject_id',$subject_id)->where('group_id',$group_id)->first();
    // }
    /**
     * Display a listing of the resource.
     */
    public function index($group_subject)
    {
        $group_subject = GroupSubject::where('id',$group_subject)->where('teacher_id',auth()->user()->academic->user_id)->firstOrFail();
        return view("academic.project.project",compact('group_subject'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(project $project)
    {
        //
    }
}
