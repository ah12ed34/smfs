@extends('layouts.home')
@section('nav')


    <div class="hdr2" style=" box-shadow: 10px;">
        <button class="spaces"> <label  class="subjectname">  الارشيف </label><img src="{{Vite::image("folder (1).png")}}" id="subject-icon-hdr2" width="40px" >
        </button>
        <div class="dep-name">تقنة معلومات</div>
    </div>


@endsection
@section("content")

<div class="container" style=" padding-top: 10px; ">



    <div class="card" id="cards-child"  onclick="location.href='{{route('student-archieveAssignements')}}'"><img src="{{Vite::image("folder (1).png")}}" class="" width="100px" style="margin-left: -6px; margin-top:0px;">
        <div id="cards-child-child">التكاليف</div>
    </div>
    <div class="card" id="cards-child"  onclick="location.href='{{route('student-archieveProjects')}}'"><img src="{{Vite::image("folder (1).png")}}" class="" width="100px" style="margin-left: -18px; margin-top:0px;">
        <div id="cards-child-child">المشاريع</div>
    </div>
    <div class="card" id="cards-child"  onclick="location.href='{{route('student-grades')}}'"><img src="{{Vite::image("degrees.png")}}" class="" width="100px" style="margin-left: -18px;">
        <div id="cards-child-child">الدرجات</div>
    </div>
</div>


@endsection