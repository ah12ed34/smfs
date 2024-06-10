@extends('layouts.home')
{{-- @section('nav')
    @livewire('components.nav.academic.subject.project',['group_subject'=>$group_subject])
@endsection --}}
@section("content")
    @livewire('academic.subject.project',['group_subject'=>$group_subject])
@endsection
