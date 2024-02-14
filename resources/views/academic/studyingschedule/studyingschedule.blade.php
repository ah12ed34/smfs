@extends('layouts.home')
@section('nav')


<div class="hdr2" style=" box-shadow: 10px;">
    <button class="spaces"> <label  class="subjectname" style="margin-left: -10px;"> الجدول الدراسي </label><img src="{{Vite::image("calendar (4).png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
    </button>
    <div class="dep-sub-name"> نظم موزعة </div>
</div>

@endsection
@section("content")


<div class="container" style=" padding-top: 10px;">



<div   class="card w-100 h-100 right-6 left-0 top-2  " id="card-img-schedule" > 
    <div class="card  maxh-10 w-100 right-0 left-0 top-0  badge-primary text-bg-light text-center font-medium" id="card-title-schedule" >  جدول الأكادميين</div>
    <img class="img-fluid" src="{{Vite::image("studyingScheule.png")}}"  width="600px" height="350px">
</div>

<div   class="card w-100 h-100 right-6 left-0 top-2 " id="card-img-schedule"> 
    <div class="card h-10 w-100 right-0 left-0 top-0  badge-primary text-bg-light text-center font-medium" id="card-title-schedule" >  جدول الطلاب</div>
    <img class="img-fluid" src="{{Vite::image("studstudyingScheule.png")}}"  width="600px" height="350px" style="padding-top: 20px">
</div>

<div   class="card w-100 h-100 right-6 left-0 top-2 " id="card-img-schedule"> 
    <div class="card h-10 w-100 right-0 left-0 top-0  badge-primary text-bg-light text-center font-medium"  id="card-title-schedule" >  جدول القاعات</div>
    <img class="img-fluid" src="{{Vite::image("studstudyingScheule.png")}}"  width="600px" height="350px" style="padding-top: 20px">
</div>




</div>


@endsection

