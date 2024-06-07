<?php

namespace App\Http\Controllers;

use App\Http\Requests\groupRQ;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Level;
use App\Models\Student;
use App\Rules\add_students;
use Illuminate\Support\Facades\Log;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Level $id)
    {
        //
        $groups = Group::where('level_id',$id->id)->where('group_id',null)->get();

        return view('group.index',compact('groups','id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $departments = Department::all();
        if($departments->count() == 0)
            return redirect()->route('department.create')->with('error',__('general.no_departments'));


        return view('group.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(groupRQ $request)
    {       $data = $request->validated();
        try {
            if($request->hasFile('table_file'))
            $data['schedule'] = $request->file('table_file')->store('groups/files/schedule','public');
            else
            $data['schedule'] = null;
            $data['name'] = $data['groupname'];
            $data['max_students'] = $data['maxstudent'];
            // $data['group_id'] = $data['parent_group'];
            $data['level_id'] = $data['level'];
            unset($data['groupname'],$data['maxstudent'],$data['parent_group'],$data['table_file'],$data['level']);
            Group::create($data);
            return redirect()->route('group.create')->with('success',__('general.successfully_added_group'));
        } catch (\Throwable $th) {
            if(file_exists($data['schedule']))
                unlink($data['schedule']);
            dd($th);
            Log::error($th->getMessage().' '.$th->getLine());
            return redirect()->route('group.create')->with('error',__('general.error_added_group'));
        }

    }

    public function addstudent(Group $group)
    {

        $students = Student::where('level_id',$group->level_id)->get();
        return view('group.addstudent',compact('group','students'));
    }

    public function storestudent(Request $request,Group $group)
    {
        // dd($request->all());
        $data = $request->validate([
            'students' => ['required','array',new add_students($group)],
        ]);
        dd($data);
        try {
            $group->students()->sync($data['students']);
            return redirect()->route('group.addstudent',$group->id)->with('success',__('general.successfully_added_student'));
        } catch (\Throwable $th) {
            Log::error($th->getMessage().' '.$th->getLine());
            return redirect()->route('group.addstudent',$group->id)->with('error',__('general.error_added_student'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        //
    }
}
