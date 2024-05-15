@extends('layouts.home')
@section('nav')
<div class="hdr2" style=" box-shadow: 10px;">
    <button class=" spaces"> <label  class="subjectname" style="margin-left: -10px;">  الصفحة الرئيسية </label><img src="{{ Vite::image('dashboard (1).png') }}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
    </button>


<div class="dropdown">
    <button type="button"  class="btn btn-light departmentNavbar_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
            <div class="textdropdown">    المستويات</div>
        </button>
        <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">

             <!-- <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   الصلاحيات</a> -->
            <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  الأكادمين</a>
            <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   الإشعارات</a>
            <a  id="" class="dropdown-item" href="#" style="padding-left:30px; ">  الإحصائيات</a>

        </div>
    </div>

    <div  class="btn-group btn_group_nav_manageDepart" id="">
        <button class="btn-manageDepart-Navbar"><label class="proNavbartext">الإحصائيات </label></button>
        <button class="btn-manageDepart-Navbar"><label class="proNavbartext">  الإشعارات</label></button>
        <button class="btn-manageDepart-Navbar"><label class="proNavbartext"> الأكادمين</label></button>
        <button class="btn-manageDepart-Navbar"><label class="proNavbartext"> المستويات</label></button>
</div>
<div class="dep-name">{{ $department->name }}</div>

</div>
@endsection

@section('content')

<div class="cards-child-stastics">
    <label class="cards-child-title">   الطلاب
</label>
    <div class="cards-child-numbers">{{ $department->students()->count() }}</div>
    <img src="{{ Vite::image('students.png') }}" class="image-stastic" width="50px">
</div>

<div class="cards-child-stastics">
    <label class="cards-child-title">    أعضاء هيئة التدريس
</label>
    <div class="cards-child-numbers">{{ $department->Academics->count() }}</div>
    <img src="{{ Vite::image('presentation (2).png') }}" class="image-stastic" width="50px">
</div>

<div class="cards-child-stastics">
    <label class="cards-child-title">  مساعدين أعضاء هيئة التدريس
</label>
    <div class="cards-child-numbers">0</div>
    <img src="{{ Vite::image('presentation (2).png') }}" class="image-stastic" width="50px">
</div>

<div class="cards-child-stastics">
    <label class="cards-child-title">  مجموعات النظري </label>
    <div class="cards-child-numbers">{{ $department->groups('not_practical')->count() }}</div>
    <img src="{{ Vite::image('Groups.png') }}" class="image-stastic" width="50px">
</div>

<div class="cards-child-stastics">
    <label class="cards-child-title">  مجموعات العملي  </label>
    <div class="cards-child-numbers">{{ $department->groups('practical')->count() }}</div>
    <img src="{{ Vite::image('Groups.png') }}" class="image-stastic" width="50px">
</div>

<div class="cards-child-stastics">
    <label class="cards-child-title">   المواد المقررة  </label>
    <div class="cards-child-numbers">{{ $department->Subjects()->count() }}</div>
    <img src="{{ Vite::image('open-book.png') }}" class="image-stastic" width="50px">
</div>

@endsection
