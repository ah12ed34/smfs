@extends('layouts.home')
@section('nav')
{{--
<div  class="hdr2" style=" box-shadow: 10px;">
    <button class="spaces"> <label  class="subjectname"> الطلاب </label><img src="{{Vite::image("students.png")}}" id="subject-icon-hdr2" width="40px">
    </button>
    <div class="dep-sub-name"> نظم موزعة </div>

    <div id="btn-group-students" class="btn-group">
        <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->
        <button id="btn-studentsNavbar" class="btn btn-light"  onclick="location.href='{{route('studentsworksStastics')}}'" style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"><label class="proNavbartext">الإحصائيات</label></button>
        <button id="btn-studentsNavbar" class="btn btn-light" onclick="location.href='{{route('projectsgrades-stu')}}'"><label class="proNavbartext">   المشاريع</label></button>
            <button id="btn-studentsNavbar" class="btn btn-light" onclick="location.href='{{route('assignmentsgrdes-stu')}}'"><label class="proNavbartext">   التكاليف</label></button>
              <button id="btn-studentsNavbar" class="btn btn-light" onclick="location.href='{{route('midexam')}}'"><label class="proNavbartext">   النصفي</label></button>
                  <button id="btn-studentsNavbar" class="btn btn-light" onclick="location.href='{{route('students-persents')}}'"><label class="proNavbartext"> الحضور والغياب </label></button>
        <button id="btn-studentsNavbar" class="btn btn-light"  onclick="location.href='{{route('students')}}'"><label class="proNavbartext"> قائمة الطلاب</label></button>
    </div>
    <!-- <button class="btn-bottomNavbar"><i id="bottombaricon" class="bi bi-house-fill custom-width-icon" width="30px" height="30px"></i><br>
        <label class="bottomNavbartext">القائمة</label>
        </button> -->

    <button id="btn-studentsdropdown" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown">

        <div class="textstudentsdrop">     الإحصائيات</div>
    </button>
<div id="dropdown-menulist" class="dropdown-menu" style="width:100px;  ">
<a  href="{{route("students")}}" id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px; ">  قائمة الطلاب</a>
<a  href="{{route("students-persents")}}" id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px; ">  الحضور والغياب</a>
<a  href="{{route("midexam")}}" id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px; ">  الاختبار النصفي</a>
<a   href="{{route("assignmentsgrdes-stu")}}" id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:47px; ">التكاليف</a>
<a   href="{{route("projectsgrades-stu")}}" id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:47px; "> المشاريع</a>
</div>
    <div class="dropdown">
    <button id="btn-groups-student2" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown">
        <div class="textdrop2">  جميع المجموعات</div>
       </button>
    <div id="dropdown-menulist" class="dropdown-menu">
        <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px; ">(1)المجموعة</a>
        <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px; "> المجموعة(2)</a>
        <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> المجموعة(3)</a>
    </div>
</div>
</div>


<div  class="hr3-students">
    <a href="{{route("studentsworksStastics")}}">    <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px" ></button></a>
    <button id="btn-groups-students" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown">
        <div class="textdrop2">  جميع المجموعات</div>
       </button>
    <div id="dropdown-menulist" class="dropdown-menu">
        <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">(1)المجموعة</a>
        <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> المجموعة(2)</a>
        <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> المجموعة(3)</a>
    </div>
    <div id="input-groupstudent" class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-append">
            <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
        </div>
    </div>
    <td><button type="submit" class="btn btn-primary btn-sm" id="btn-uploade-grades" data-toggle="modal" data-target="#myModal"> رفع الدرجات<img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button> </td>

</div>
 --}}


@livewire('components.nav.academic.students')
@endsection
@section("content")


<div class="container" id="container-project" style="  padding-top: 30px;">



        <div class="table-responsive">
            <table class="table" style=" width:100%;">
                <thead class="table-header" style="font-size: 12px;">
                    <tr class="table-light" id="modldetials">
                        {{-- <th>ملاحظة</th> --}}
                        <th>التقدير </th>
                        <th>المجموع</th>
                        <th>الإختبار النهائي</th>
                        <th> محصلة العملي</th>
                        <th>محصلة النظري</th>
                        <th> المشروع</th>
                        <th>التكليف</th>
                        <th> الإختبار النصفي </th>
                        <th> درجة الحضور والغياب</th>
                        <th> اسم الطالب</th>
                        <th> الرقم الأكتديمي</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-light" id="modldetials" style="margin-top:7px;">
                        {{-- <td>*******</td> --}}
                        <td>*******</td>
                        <td>*******</td>
                        <td>***** </td>
                        <td>***** </td>
                        <td>***** </td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>***** </td>
                        <td>***** </td>
                        <td>***** </td>
                    </tr>
                    <tr class="table-light">
                        {{-- <td>*******</td> --}}
                        <td>*******</td>
                        <td>*******</td>
                        <td>***** </td>
                        <td>***** </td>
                        <td>***** </td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>***** </td>
                        <td>***** </td>
                        <td>***** </td>
                    </tr>
                    <tr class="table-light">
                        {{-- <td>*******</td> --}}
                        <td>*******</td>
                        <td>*******</td>
                        <td>***** </td>
                        <td>***** </td>
                        <td>***** </td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>***** </td>
                        <td>***** </td>
                        <td>***** </td>
                    </tr>
                </tbody>
            </table>
        </div>









    <!-- The Modal -->
    {{-- <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content2">

                <!-- Modal Header -->
                <div class="modal-header" id="modheader">
                    ارسال اشعار
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" style="display: block;">
                        <div class="form-group">
                            <!-- <label for="usr">Name:</label> -->

                            <textarea type="text" class="form-control-file border" id="comment" name="comment" style="height: 70px; margin-top:8px"></textarea>
                        </div>

                    </form>
                </div>

                <!-- Modal footer -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btnsave-file" style="float: left; margin-left:30px;">ارسال</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel-file">إلغاء</button>
                </div>
            </div>
        </div>
    </div>

</div> --}}
@endsection
