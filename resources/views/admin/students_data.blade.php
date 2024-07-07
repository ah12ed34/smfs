@extends('layouts.home')
@section('nav')

<div class="hdr2" style=" box-shadow: 10px;">
    <button class=" spaces"> <label  class="subjectname">   الأدمن </label><img src="{{ Vite::image('admin.png')}}" id="subject-icon-hdr2" width="40px" >
    </button>

{{-- <div id="" class="input-group input-search-admin">
    <input type="text" class="form-control" placeholder="Search">
    <div class="input-group-append">
        <button id="form-control" class="btn btn-light" type="submit"><img src="{{ Vite::image('magnifying-glass (2).png')}}" id="spaces2"  width="20px" ></button>
    </div>
</div> --}}


{{-- <td><button type="submit" class="btn btn-primary btn-sm  btn-addAcademic" id="" data-toggle="modal" data-target="#addPermissions"> اضافة صلاحية<img src="{{ Vite::image('plus.png')}}"  width="20px" style="float: left;"></button> </td> --}}

</div>

<div class="hr3">
<button id="spacesbtn" onclick="window.location='{{ route('admin.levelsOfDepartments',[$level?->department?->id]) }}'" class="spaces"> <img src="{{ Vite::image('left-arrow.png')}}" id="spaces1"  width="30px"></button>

</div>
@endsection

    {{-- Stop trying to control. --}}
@section('content')
        <div class="container" style="padding-top: 30px;">

        <div class="card  cards-departments" id="">
            <img src="{{Vite::image("students.png")}}" class="" width="150px" onclick="location.href='{{route('students_information', $level->id)}}'">
            <div class="card-departments-child">    بيانات الطلاب
            </div>
        </div>

        <div class="card  cards-departments" id="">
            {{-- <img src="{{Vite::image("students.png")}}" class="" width="150px"   onclick="location.href='{{route('students_grades')}}'"> --}}
            <img src="{{Vite::image("students.png")}}" class="" width="150px"  >

            <div class="card-departments-child"> درجات الطلاب
            </div>
        </div>

        <div class="card  cards-departments" id="">
            <img src="{{Vite::image("Groups.png")}}" class="" width="150px" style="margin-top:18px;" onclick="location.href='{{route('students_main_groups', $level->id)}}'">
            <div class="card-departments-child"> المجموعات
            </div>
        </div>

        </div>

@endsection
