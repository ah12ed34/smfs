@extends('layouts.home')
@section('nav')

{{-- <button class="spaces"> <label  class="subjectname" style="margin-left: -20px;"> الصفحة الرئيسية </label><img src="../../images/dashboard (1).png" id="subject-icon-hdr2" width="40px"style="margin-left: -165px;"></button> --}}
<div class="hdr2" style=" box-shadow: 10px;">
    <button class="spaces"> <label  class="subjectname" > التكاليف </label><img src="{{Vite::image("homework (3).png")}}" id="subject-icon-hdr2" width="40px">
    </button>
    <div class="dep-name">تقنة معلومات</div>

    <div id="btn-group-assignementsStudents">
        <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->

        <a href="{{route("student-DoneAssignements")}}">   <button id="btn-assignementsStudentsksNavbar" class="btn btn-light" style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"><label class="">   مرسلة</label></button></a>
        <button id="btn-assignementsStudentsksNavbar" class="btn btn-light"><label class="">  غير مرسلة </label></button>
        <a href="{{route("student-assignements")}}"><button id="btn-assignementsStudentsksNavbar" class="btn btn-light" ><label class="">  القائمة </label></button></a>
    </div>
    <button id="btn-assignementsStudentsdropdown" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
        <div class="textstudentsdrop">     مرسلة</div>
       </button> 
    <div id="dropdown-menulist" class="dropdown-menu" style="width:100px;">
        <a id="dropdown-students-itemlist" class="dropdown-item" href="{{route("student-assignements")}}"  style="padding-left:40px;"> القائمة</a>
        <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">  غير مرسلة </a>
    </div>
    <!-- <td><button type="submit" class="btn btn-primary btn-sm" id="btn-addHW" data-toggle="modal" data-target="#myModal">إضافة تكليف<img src="../../images/plus.png"  width="20px" style="float: left;"></button> </td> -->
    <div class="dropdwon">
        <button id="btn-assignementsStudentsdropdown-HW-mobile" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
        <div class="textstudentsdrop">     جميع التكاليف</div>
       </button>
        <div id="dropdown-menulist" class="dropdown-menu" style="width:100px;">
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> *****</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> ****</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> *****</a>
        </div>
    </div>
</div>




<div class="hr3">
    <a href="{{route("student")}}">  <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px" ></button></a>

    <div class="dropdwon">
        <button id="btn-assignementsStudentsdropdown-HW" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
        <div class="textstudentsdrop"> جميع التكاليف</div>
        </button>
        <div id="dropdown-menulist" class="dropdown-menu" style="width:100px;">
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> *****</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> ****</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> *****</a>
        </div>
    </div>
    <div id="input-group-studentSearch" class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-append">
            <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
        </div>
    </div>

    <div class="dropdwon">
        <button id="btn-Type-assignementsdropdown" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
        <div class="textstudentsdrop">  نظري/عملي</div>
        </button>
        <div id="dropdown-menulist" class="dropdown-menu" style="width:100px;">
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> نظري</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> عملي</a>
        </div>
    </div>

</div>
</div>

@endsection

@section("content")

<div class="container"  style="padding-top:30px;">

    <div id="card-done-assignments" class="card bg-light text-dark" style=" color: #0E70F2;">
        <div class="card-body">
            <!-- <div id="input-send-HW" class="container">
                <input type="file" class="form-control" id="file-assignment" name="file">
                <textarea type="text" class="form-control" rows="5" id="commit-sendassigne" name="commit"></textarea>
                <button type="submit" class="btn btn-primary" id="btn-send-hw">تسليم </button>
            </div> -->
            <table id="table-details-doneAssignements" dir="rtl">
                <tr>
                    <th id="table-header">اسم المادة</th>
                    <td id="text-done-table">*******</td>
                </tr>
                <tr>
                    <th id="table-header">اسم التكاليف</th>
                    <td id="text-done-table">*******</td>
                </tr>
                <tr>
                    <th id="table-header">الدرجة</th>
                    <td id="text-done-table">*******</td>
                </tr>
                <tr>
                    <th id="table-header">الوصف</th>
                    <td id="text-done-table">*******</td>
                </tr>

                <tr>
                    <th id="table-header">الملف</th>
                    <td id="text-done-table">*******</td>
                </tr>
                <tr>
                    <th id="table-header">تاريخ التسليم</th>
                    <td id="text-done-table">*******</td>
                </tr>


            </table>
            {{-- <div id="input-send-HW" class="container">
                <input type="file" class="form-control" id="file-assignment" name="file">
                <textarea type="text" class="form-control" rows="5" id="commit-sendassigne" name="commit"></textarea>
                <button type="submit" class="btn btn-primary" id="btn-send-hw">تسليم </button>
            </div> --}}
        </div>


    </div>
@endsection