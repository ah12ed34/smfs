@extends('layouts.home')
@section('nav')


<div class="hdr2" style=" box-shadow: 10px;">
    <button class="spaces"> <label  class="subjectname" style="margin-left: -10px;"> الجدول الدراسي </label><img src="{{Vite::image("calendar (4).png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
    </button>
    <div class="dep-name">تقنة معلومات</div>
</div>

@endsection
@section("content")


<div class="container" style=" padding-top: 10px;">




    <img class="img-fluid" src="{{Vite::image("studstudyingScheule.png")}}"  width="600px" height="350px">







</div>


@endsection

