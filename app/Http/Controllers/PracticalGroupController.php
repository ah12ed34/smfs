<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class PracticalGroupController extends Controller
{
    //
    public function index(Group $group)
    {

        $sup_group = Group::where('group_id',$group->id)->get();
        return view('global.practical_group.index',compact('group','sup_group'));
    }

    public function create(Group $group)
    {
        $group->max = $group->max_students - (Group::where('group_id',$group->id)->sum('max_students')??0);
        return view('global.practical_group.create',compact('group'));
    }

    public function store(Request $request,Group $group)
    {
        $max = $group->max_students - (Group::where('group_id',$group->id)->sum('max_students')??0);
        $request->validate([
            'practical_group_name' => 'required',
            'max_students' => 'required|numeric|max:'.$max,
        ]);

        $request->merge(['level_id' => $group->level_id,'group_id' => $group->id,
        'name' => $request->practical_group_name]);
        // $request->except('practical_group_name');
        $group = Group::create($request->all());



        // $group = Group::create([
        //     'name' => $request->name,
        //     'max_students' => $request->max_students,
        //     'level_id' => $group->level_id,
        //     'group_id' => $group->id,
        //     'schedule' => $request->schedule,

        // ]);

        return redirect()->route('practical_group',[$group->group_id]);
    }



}
