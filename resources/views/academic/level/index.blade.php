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
            <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  الإحصائيات</a>

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
<div dir="rtl">
@forelse ($department->levels as $level)
    <a href="{{ route('group', $level->id) }}" style="text-decoration: none; color: black;" >
        <div class="card  cards-departments" id="{{ $loop->index }}">
            {{-- <img src="{{ Vite::image('it.png') }}" class="" width="150px"> --}}
            <div with="150px">{{ $loop->index +1 }}</div>
            <div class="card-departments-child"> {{ $level->name }}</div>
        </div>
    </a>
@empty

@endforelse
</div>

@endsection
