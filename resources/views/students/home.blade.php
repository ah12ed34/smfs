@extends('layouts.home')
@section('nav')

{{-- <button class="spaces"> <label  class="subjectname" style="margin-left: -20px;"> الصفحة الرئيسية </label><img src="../../images/dashboard (1).png" id="subject-icon-hdr2" width="40px"style="margin-left: -165px;"></button> --}}
<div class="hdr2" style=" box-shadow: 10px;">
    <button class="spaces"> <label  class="subjectname" style="margin-left: -10px;">الصفحة الرئيسية </label><img src="{{Vite::image("dashboard (1).png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -155px;">
    </button>
    <div class="dep-name">{{ auth()->user()->student->department->name }}</div>
</div>

@endsection

@section("content")

<div  style="padding-bottom:30px; padding-left:-5px;padding-left:-5px;">


{{--
        <div class="card" id="cards-child-subject" onclick="location.href='{{route('sendnotification')}}'"><img src="{{Vite::image("paper-plane.png")}}" class="imgs-boards" width="100px" style="margin-left: -6px; margin-top:10px;">
            <div class="cards-child-child">الإشعارات
            </div>
        </div>

            <div class="card" id="cards-child-subject" onclick="location.href='{{route('studyingbooks')}}'"><img src="{{Vite::image("open-book.png")}}" class="imgs-boards" width="100px" style="margin-left: -6px; margin-top:10px;" >
            <div class="cards-child-child">المقرر الدراسي
            </div>
        </div>

        <div class="card" id="cards-child-subject" onclick="location.href='{{route('students')}}'"><img src="{{Vite::image("students.png")}}" class="imgs-boards" width="100px" style="margin-left: -6px; margin-top:10px;" >
            <div class="cards-child-child">الطلاب
            </div>
        </div>


        <div class="card" id="cards-child-subject" onclick="location.href='{{route('assignment')}}'"><img src="{{Vite::image("homework (3).png")}}" class="imgs-boards" width="100px" style="margin-left: -6px; margin-top:10px;" >
            <div class="cards-child-child">التكاليف
            </div>
        </div>

        <div class="card" id="cards-child-subject" onclick="location.href='{{route('projects')}}'"><img src="{{Vite::image("project-management.png")}}" class="imgs-boards" width="100px" style="margin-left: -18px; margin-top:10px;" >
            <div class="cards-child-child">المشاريع</div>
        </div> --}}

        <div class="card" id="cards-child-subject" onclick="location.href='{{route('student-stastistics')}}'" ><img src="{{Vite::image("bar-chart (4).png")}}" class="imgs-boards" width="100px" style="margin-left: -6px; margin-top:10px;" >
            <div class="cards-child-child">الإحصائيات</div>
        </div>
        <div class="card" id="cards-child-subject"  onclick="location.href='{{route('student-chattingGroup')}}'"  ><img src="{{Vite::image("conversation (3).png")}}" class="imgs-boards" width="100px" style="margin-left: -6px; margin-top:10px;" >
            <div class="cards-child-child">مجموعة الدردشة</div>
        </div>

        <div class="card" id="cards-child-subject" onclick="location.href='{{route('student-studyingbooks')}}'" ><img src="{{Vite::image("open-book.png")}}" class="imgs-boards" width="100px" style="margin-left: -6px; margin-top:10px;" >
            <div class="cards-child-child">المقرر الدراسي
            </div>
        </div>

        <div class="card" id="cards-child-subject" onclick="location.href='{{route('student-assignements')}}'" ><img src="{{Vite::image("homework (3).png")}}" class="imgs-boards" width="100px" style="margin-left: -6px; margin-top:10px;" >
            <div class="cards-child-child">التكاليف
            </div>
        </div>

        <div class="card" id="cards-child-subject" onclick="location.href='{{route('student-projects')}}'"  ><img src="{{Vite::image("project-management.png")}}" class="imgs-boards" width="100px" style="margin-left: -18px; margin-top:10px;" >
            <div class="cards-child-child">المشاريع</div>
        </div>
{{-- onclick="location.href='{{route('#')}}'" --}}

</div>

{{-- <div class="bottomNavbar">
    <button class="btn-bottomNavbar"><img src="{{Vite::image("setting (2).png")}}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">الإعدادات</label></button>
    <button class="btn-bottomNavbar"><img src="{{Vite::image("portfolio (2).png")}}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">الأرشيف</label></button>
    <button class="btn-bottomNavbar"><img src="{{Vite::image("calendar (3).png")}}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">الجدول </label></button>
<button class="btn-bottomNavbar" onclick="location.href='{{route('home')}}'"><img src="{{Vite::image("home (1).png")}}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">القائمة</label></button>


</div> --}}
@endsection
