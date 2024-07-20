@extends('layouts.home')
@section('nav')


<div class="hdr2" style=" box-shadow: 10px;">
    <button class="spaces"> <label  class="subjectname" style="margin-left: -10px;"> الجدول الدراسي </label><img src="{{Vite::image("calendar (4).png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
    </button>
    <div class="dep-sub-name">{{ auth()->user()->academic->department->name }} </div>
</div>
<div class="hr3">
    <button id="spacesbtn" onclick="window.location='{{ route('main_academic_sechedules') }}'" class="spaces"> <img src="{{ Vite::image('left-arrow.png')}}" id="spaces1"  width="30px"></button>

    </div>
@endsection
@section("content")


<div class="container" style=" padding-top: 10px;">


    <div  class="card card-light card_studyingbooks_student" id="">
                <div id="card-studyingbooks-child">
                    <img src="{{icon::getIcon($schedule,true)}}" class="chapters-image" width="180px">

                    <!-- <div id="card-studyingbooks-child-2"> -->
                    <label class="texttitlechapter">جدول القاعات</label>

                </div>

                    <div id="card-studyingbooks-child-three" class="card">

                    <button type="submit" class="btn btn-primary" id="btn-download" data-toggle="modal" data-target="#myModal3"
                    onclick="window.location='{{ route('download_schedule') }}'"
                    ><img src="{{Vite::image("download-file.png")}}" id="image-download"  width="15px" ></button>
                    <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModal3" style="margin-left: 30px;">  <img src="../images/delete (1).png")}}" id=""  width="15px" ></button>
                <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModal3" style="margin-left: 50px;">تعديل  <img src="../images/edit.png")}}" id=""  width="15px" ></button> -->

                </div>
            </div>



</div>




</div>


@endsection

