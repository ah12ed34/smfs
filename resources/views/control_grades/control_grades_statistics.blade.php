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

<div class="hr3">
<button id="spacesbtn" onclick="window.location='{{ route('control_grades_main') }}'" class="spaces"> <img src="{{ Vite::image('left-arrow.png')}}" id="spaces1"  width="30px"></button>

</div>
@endsection

    {{-- Stop trying to control. --}}
@section('content')
        <div class="container" style="padding-top: 30px;">

            <div class="cards-child-stastics" onclick="location.href='{{route('control_final_reasults_students')}}'">
                <label class="cards-child-title">  الطلاب الراسبين
            </label>
                <div class="cards-child-numbers">0</div>
                <img src="{{Vite::image("students.png")}}" class="image-stastic" width="50px">
            </div>

            <div class="cards-child-stastics" onclick="location.href='{{route('control_final_reasults_students')}}'">
                <label class="cards-child-title">  الطلاب الناجحين
            </label>
                <div class="cards-child-numbers">0</div>
                <img src="{{Vite::image("students.png")}}" class="image-stastic" width="50px">
            </div>

            <div class="cards-child-stastics" onclick="location.href='{{route('control_final_reasults_students')}}'">
                <label class="cards-child-title">    الطلاب الأوئل  </label>
                <div class="cards-child-numbers">0</div>
                <img src="{{Vite::image("students.png")}}" class="image-stastic" width="50px">
            </div>

            <div class="cards-child-stastics" onclick="location.href='{{route('control_final_reasults_students')}}'">
                <label class="cards-child-title">  إجمالي عدد الطلاب
            </label>
                <div class="cards-child-numbers">0</div>
                <img src="{{Vite::image("students.png")}}" class="image-stastic" width="50px">
            </div>

        </div>

@endsection
