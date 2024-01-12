@extends('layouts.home')
@section('nav')

<div class="hdr2" style=" box-shadow: 10px;">
    <button class="spaces"> <label  class="subjectname"> الإشعارات </label><img src="{{Vite::image("paper-plane.png")}}" id="subject-icon-hdr2" width="40px">
    </button>
    <div class="dep-sub-name"> نظم موزعة </div>
</div>



<div class="hr3-academic">
    <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px"></button>
    <button id="btn-groups-sentnotifications" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
        <div class="textdrop2">  جميع المجموعات</div>
       </button>
    <div id="dropdown-menulist" class="dropdown-menu">
        <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">(1)المجموعة</a>
        <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;"> المجموعة(2)</a>
        <a id="dropdown-students-itemlist" class="dropdown-item" href="#"> المجموعة(3)</a>
    </div>

    <div class="selectstudenttxet">تحديد طلاب</div>
    <div class="dropdown">

        <button id="btn-spacific-studentsdropdown" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-placeholder=" تحديد طلاب">
            <div class="textstudentsdrop">select   </div>
            </button>
        <div id="dropdown-menulist" class="dropdown-menu" style="width:100px;">

        </div>
    </div>
</div>








@endsection

@section("content")

<div class="container" style=" padding-top: 10px; ">


    <div id="card-sentnotifications" class="card">


        <div id="card-sentnotifications-chating" class="card">


        </div>
        <div class="input-group mb-3">
            <input id="input-sentnotifications" type="text" class="form-control" placeholder="اكتب...">
            <div class="input-group-append">
                <button id="btn-send" class="btn btn-light" type="submit"><img src="{{Vite::image("send.png "   width="24px" ></button>
            </div>
        </div>
    </div>

</div>





@endsection