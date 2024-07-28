<?php

namespace App\Http\Controllers;

use App\Models\GroupSubject;
use App\Traits\Academic\studentAT;

class StudentsworksStasticsController extends Controller
{
    use studentAT;
    public function __construct()
    {
        $this->initializeStudentAT();
    }
    //
    public function index(GroupSubject $group_subject){
        $group_subject = $group_subject;
        $stastistics =(
            $this->getStastistics($group_subject)
        );
        return view('academic.student.studentsworksStastics',compact('group_subject','stastistics'));
    }
}
