@extends('layouts.home')
@section('nav')

<div class="hdr2" style=" box-shadow: 10px;">
    <button class="spaces"> <label  class="subjectname">  الارشيف </label><img src="{{Vite::image("folder (1).png")}}" id="subject-icon-hdr2" width="40px" >
    </button>
    <div class="dep-name">تقنة معلومات</div>

    <div class="dropdwon">
        <button id="btn-studybookStudentsdropdown-levels" style="margin-top:-30px;" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
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
</div>

<div class="hr3">
    <button id="spacesbtn" class="spaces" onclick="location.href='{{route('student-archieve')}}'"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px" ></button>
    <div id="input-group-students-search" class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-append">
            <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
        </div>
    </div>
</div>



@endsection
@section("content")

<div class="container" style=" padding-top: 30px;">


    <div class="table-responsive-xl">
        <table class="table" style=" width:100%;">
            <thead class="table-header" style="font-size: 12px;">
                <tr class="table-light" id="modldetials">
                    <th>ملاحظة </th>
                    <th> الدرجة</th> 
                     <th>الملف</th>
                     <th>تاريخ التسليم</th>
                    <th> اسم التكليف</th>
                    <th>مدرس المادة</th>
                    <th> المادة</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-light" id="modldetials" style="margin-top:7px;">
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                </tr>
                <tr class="table-light">
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                </tr>
                <tr class="table-light">
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                </tr>

            </tbody>
        </table>
    </div>

</div>


@endsection