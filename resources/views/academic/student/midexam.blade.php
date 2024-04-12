@extends('layouts.home')
@section('nav')
    @livewire('components.nav.academic.students',['group_subject'=>$group_subject,'active'=>'midexam'])
@endsection
@section("content")

    @livewire('academic.student.midexam',['group_subject'=>$group_subject])

@endsection
