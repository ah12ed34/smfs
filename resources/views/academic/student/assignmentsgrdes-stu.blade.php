@extends('layouts.home')
@section('nav')
    @livewire('components.nav.academic.students'
    ,['group_subject'=>$group_subject,'active'=>'assignmentsgrdes-stu'])
@endsection
@section("content")
    @livewire('academic.student.assignmentsgrdes-stu',['group_subject'=>$group_subject])
@endsection
