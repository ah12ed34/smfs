<?php

namespace App\Http\Controllers\students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\file;

class StudStudyingBooksController extends Controller
{
    //
    public function indexbooks(){
        return view('students.studStudyingbooks.studStudyingbooks');
    }
    public function indexChapters(){
        return view('students.studStudyingbooks.studBooksChapters');
    }
    public function indexFormQuiz($id){
        return view('students.studStudyingbooks.studFormQuiz', compact('id'));
    }
    public function indexChaptersSummaries(){
        return view('students.studStudyingbooks.studChaptersSummaries');
    }
}
