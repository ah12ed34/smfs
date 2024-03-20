@extends('layouts.home')

@section('title', 'لوحة التحكم')
@section('nav')
<div class="hdr2" style=" box-shadow: 10px;">

    <ul>
        <li><a class="active" href="#" style="text-decoration: none; float:right;">{{__('layout.home')}}</a></li>

    </ul>
</div>
@endsection
@section('content')

<div class="container">
    <div class="row">
        <a href="{{ route('group') }}" class="btn btn-primary">{{ __("general.group") }}</a>
        <a href="{{ route('level.index') }}" class="btn btn-primary">{{ __("general.level") }}</a>
        <a href="{{ route('department.index') }}" class="btn btn-primary">{{ __("general.department") }}</a>
        <a href="{{ route('student.index') }}" class="btn btn-primary">{{ __("general.student") }}</a>
    </div>
</div>
@endsection
