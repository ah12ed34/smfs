<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
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
    /**
     * Display a listing of the resource.
     */
    public function index(Department $id)
    {
        return view('academic.level.index', ['department' => $id]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $dep = Department::all();
        if($dep->isEmpty())return redirect()->route('department.create')->with('error',trans('sysmass.create_department_first'));
        $request = request(['error', 'dep_id']);
        if (isset($request))
        session()->put($request);
        return view('academic.level.create', compact('dep'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'level_id' => 'unique:levels,id',
            'level_name' => 'required|unique:levels,name',
            'department_id' => 'required|exists:departments,id',
        ]);
        $request->replace($request->except('level_id','level_name') + ['id' => $request->level_id, 'name' => $request->level_name]);
        Level::create($request->all());
        return redirect()->route('level.create')->with('success', trans('sysmass.success_add'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Level $level)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Level $level)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level)
    {
        //
    }

}
