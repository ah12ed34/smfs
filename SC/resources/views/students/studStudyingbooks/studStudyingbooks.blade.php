@extends('layouts.home')
@section('nav')

<div class="hdr2" style=" box-shadow: 10px;">
    <button class=" spaces"> <label  class="subjectname" style="margin-left: -10px;"> المقرر الدراسي </label><img src="{{Vite::image("open-book.png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
    </button>

    <div class="dropdwon">
        <button id="btn-studybookStudentsdropdown-levels" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
        <div class="textstudentsdrop">      مستوى رابع | ترم ثاني</div>
       </button>
        <div id="dropdown-menulist" class="dropdown-menu" style="width: 140px;">
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding:0%;text-align:center;"> مستوى رابع | ترم أول</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding:0%;text-align:center;"> مستوى ثالث | ترم اول</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding:0%;text-align:center;"> مستوى ثالث | ترم ثاني</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding:0%;text-align:center;"> مستوى ثاني | ترم أول</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding:0%;text-align:center;"> مستوى ثاني | ترم ثاني</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding:0%;text-align:center;"> مستوى أول | ترم أول</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding:0%;text-align:center;"> مستوى أول | ترم ثاني</a>

        </div>
    </div>


    <div class="dep-name">تقنية معلومات</div>
</div>

<div class="hr3">
    <a href="{{route("student")}}">  <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px" ></button></a>

    <!-- <div id="input-groupstudyingbooks" class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-append">
            <button id="form-control" class="btn btn-light" type="submit"><img src="../images/magnifying-glass (2).png" id="spaces2"  width="20px" ></button>
        </div>
    </div> -->
    <!-- <td><button type="submit" class="btn btn-primary btn-sm" id="btn-uploade-grades" data-toggle="modal" data-target="#myModal"> رفع ملف<img src="../images/plus.png"  width="20px" style="float: left;"></button> </td> -->

</div>

@endsection

@section("content")
<div class="container"  style="padding-top:30px;">

<div class="card" id="cards-subject-students" onclick="location.href='{{route('student-booksChapters')}}'">
    <img src="{{Vite::image("allocation (1).png")}}" class="" width="150px">
    <div class="card-subject-child"> Distributed System نظم تشغيل <br>أ.منال العريقي
    </div>
</div>

<div class="card" id="cards-subject-students">
    <img src="{{Vite::image("ecommerce-website.png")}}" class="" width="150px">
    <div class="card-subject-child"> E-Commerce التجارة الإلكترونية <br>د.اكرم عثمان
    </div>
</div>

<div class="card" id="cards-subject-students">
    <img src="{{Vite::image("digital.png")}}" class="" width="150px">
    <div class="card-subject-child"> Digital investigation التحقيق الرقمي <br>د. عبدالله المختار
    </div>
</div>


</div>
@endsection