@extends('layouts.home')

@section('nav')
@endsection

@section('content')
<div class="container" >
    @livewire('add-student', ['group' => $group])
</div>
@endsection
