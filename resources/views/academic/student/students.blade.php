@extends('layouts.home')
@section('nav')

@livewire('components.nav.academic.students', ['group_subject' => $group_subject, 'active' => 'students'])

@endsection
@section("content")

@livewire('academic.student.students', ['group_subject' => $group_subject])
@endsection
