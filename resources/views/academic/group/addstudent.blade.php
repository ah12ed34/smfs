@extends('layouts.home')

@section('nav')@endsection

@section('content')
    @livewire('add-student', ['group' => $group])

@endsection
