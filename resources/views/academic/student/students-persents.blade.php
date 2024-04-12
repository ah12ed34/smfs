@extends('layouts.home')
@section('nav')
{{--
<div  class="hdr2" style=" box-shadow: 10px;">
    <button class="spaces"> <label  class="subjectname"> الطلاب </label><img src="{{Vite::image("students.png")}}" id="subject-icon-hdr2" width="40px">
    </button>
    <div class="dep-sub-name"> نظم موزعة </div>

    <div id="btn-group-students" class="btn-group">
        <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->
          <button id="btn-studentsNavbar" class="btn btn-light"  onclick="location.href='{{route('studentsworksStastics')}}'"><label class="proNavbartext">الإحصائيات</label></button>
           <button id="btn-studentsNavbar" class="btn btn-light" onclick="location.href='{{route('projectsgrades-stu')}}'"><label class="proNavbartext">   المشاريع</label></button>
               <button id="btn-studentsNavbar" class="btn btn-light" onclick="location.href='{{route('assignmentsgrdes-stu')}}'"><label class="proNavbartext">   التكاليف</label></button>
                 <button id="btn-studentsNavbar" class="btn btn-light" onclick="location.href='{{route('midexam')}}'"><label class="proNavbartext">   النصفي</label></button>
                     <button id="btn-studentsNavbar" class="btn btn-light" style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"onclick="location.href='{{route('students-persents')}}'"><label class="proNavbartext"> الحضور والغياب </label></button>
                        <button id="btn-studentsNavbar" class="btn btn-light" onclick="location.href='{{route('students')}}'"><label class="proNavbartext"> قائمة الطلاب</label></button>
    </div>
    <!-- <button class="btn-bottomNavbar"><i id="bottombaricon" class="bi bi-house-fill custom-width-icon" width="30px" height="30px"></i><br>
        <label class="bottomNavbartext">القائمة</label>
        </button> -->

    <button id="btn-studentsdropdown" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown">
             <div class="textstudentsdrop">  الحضور والغياب  </div>
            </button>
    <div id="dropdown-menulist" class="dropdown-menu" style="width:100px;  ">
        <a  href="{{route("students")}}" id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px; ">  قائمة الطلاب</a>
        <a  href="{{route("midexam")}}" id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px; ">  الاختبار النصفي</a>
        <a   href="{{route("assignmentsgrdes-stu")}}" id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:47px; ">التكاليف</a>
        <a   href="{{route("projectsgrades-stu")}}" id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:47px; "> المشاريع</a>
        <a   href="{{route("studentsworksStastics")}}"   id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:45px; "> الإحصائيات</a>
    </div>

    <div class="dropdown">
    <button id="btn-groups-student2" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown">
        <div class="textdrop2">  جميع المجموعات</div>
       </button>
    <div id="dropdown-menulist" class="dropdown-menu">
        <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">(1)المجموعة</a>
        <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> المجموعة(2)</a>
        <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> المجموعة(3)</a>
    </div>
</div>
</div>


</div>


<div  class="hr3-students">
    <a href="{{route("subject.index")}}">    <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px" ></button></a>
    <button id="btn-groups-students" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown">
        <div class="textdrop2">  جميع المجموعات</div>
       </button>
    <div id="dropdown-menulist" class="dropdown-menu">
        <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px; ">(1)المجموعة</a>
        <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px; "> المجموعة(2)</a>
        <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> المجموعة(3)</a>
    </div>
    <div id="input-groupstudent" class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-append">
            <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
        </div>
    </div>
    <td><button type="submit" class="btn btn-primary btn-sm" id="btn-uploade-grades" data-toggle="modal" data-target="#myModal"> رفع الدرجات<img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button> </td>

</div> --}}
    @livewire('components.nav.academic.students', ['group_subject' => $group_subject, 'active' => 'students-persents'])

@endsection
@section("content")


@livewire('academic.student.students-persents', ['group_subject' => $group_subject])

@endsection
