@extends('layouts.home')

@section('nav')@endsection

@section('content')
    @livewire('add-students-group', ['group' => $group])

@endsection
