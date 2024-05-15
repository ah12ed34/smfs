@extends('layouts.home')
@section('nav')
    @livewire('components.nav.academic.students'
    ,['group_subject'=>$group_subject,'active'=>'projectsgrades-stu'])
@endsection
@section("content")
    @livewire('academic.student.projects-grades-stu',['group_subject'=>$group_subject])
@endsection
