@extends('layouts.home')
@section('nav')
<div class="hdr2" style=" box-shadow: 10px;">
    <button class=" spaces"> <label  class="subjectname">   الكنترول </label><img src="{{ Vite::image('controll.png')}}" id="subject-icon-hdr2" width="40px" >
    </button>

{{-- <div id="" class="input-group input-search-admin">
    <input type="text" class="form-control" placeholder="Search">
    <div class="input-group-append">
        <button id="form-control" class="btn btn-light" type="submit"><img src="{{ Vite::image('magnifying-glass (2).png')}}" id="spaces2"  width="20px" ></button>
    </div>
</div> --}}


{{-- <td><button type="submit" class="btn btn-primary btn-sm  btn-addAcademic" id="" data-toggle="modal" data-target="#addPermissions"> اضافة صلاحية<img src="{{ Vite::image('plus.png')}}"  width="20px" style="float: left;"></button> </td> --}}

</div>
@endsection
@section('content')

{{-- @forelse ($departments as $department)
<a href="{{ route('department.levels',$department->id) }}" style="text-decoration: none; color: black;" >
    <div class="card  cards-departments" id="{{ $loop->index }}">
        <img src="{{ Vite::image('it.png') }}" class="" width="150px">
        <div class="card-departments-child"> {{ $department->name }}</div>
    </div>
</a>

@empty

@endforelse --}}
<div class="container" style="padding-top: 30px;">

<div class="card  cards-departments" id="" onclick="window.location='{{ route('control_grades_levels') }}'" >
    <img src="{{Vite::image("it.png")}}" class="" width="150px">
    <div class="card-departments-child"> تقنية المعلومات
    </div>
</div>

<div class="card  cards-departments" id="" onclick="window.location='{{ route('control_grades_levels') }}'" >
    <img src="{{Vite::image("information-management (1).png")}}" class="" width="150px">
    <div class="card-departments-child">نظم المعلومات
    </div>
</div>

<div class="card  cards-departments" id="" onclick="window.location='{{ route('control_grades_levels') }}'" >
    <img src="{{Vite::image("computer-science.png")}}" class="" width="150px">
    <div class="card-departments-child">  علوم الحاسوب
    </div>
</div>

<div class="card  cards-departments" id="" onclick="window.location='{{ route('control_grades_levels') }}'" >
    <img src="{{Vite::image("security (3).png")}}" class="" width="150px">
    <div class="card-departments-child"> الأمن السيبراني
    </div>
</div>

</div>

@endsection
