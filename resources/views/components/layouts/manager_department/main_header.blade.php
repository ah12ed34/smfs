<?php
    if(!isset($active['tab'])){
        $active['tab'] = null ;
    }
?>
<style>
/* .btn-manageDepart-Navbar.active {
            background-color: #a9cbf7;
            text-decoration: none;
            border-bottom: 4px solid #2f81ec;
        } */


</style>

<div class="dropdown">
    <button type="button"  class="btn btn-light departmentNavbar_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
            <div class="textdropdown">@switch($active ['tab'])
                @case('departmentLevels')
                المستويات
                @break
                @case('departmentAcademic')
                    الأكادميين
                    @break
                @case('departmentNotifications')
                الإشعارات
                @break
                {{-- @case('schedules')
                الجدول الدراسي
                    @break --}}

                @case('departmentStatistics')
                    الإحصائيات
                    @break

                @default

            @endswitch</div>
        </button>
        <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
            @if ($active['tab'] != 'departmentLevels')
            <a id="" class="dropdown-item" href='{{route('managerDepartment')}}'style="padding-left:30px; ">  المستويات</a>
            @endif
            @if ($active['tab'] != 'departmentAcademic')
            <a id="" class="dropdown-item" href='{{route('managerDepartAcademics')}}'style="padding-left:30px; ">  الأكادمين</a>
            @endif
            {{-- @if ($active['tab'] != 'books')
            <a id="" class="dropdown-item" href='{{route('depart_level_Books',$parameter)}}' style="padding-left:30px; ">   المقرر الدراسي</a>
            @endif --}}

            @if ($active['tab'] != 'departmentNotifications')
            <a id="" class="dropdown-item" href='{{route('notifications_manageDrpart')}}'style="padding-left:30px; ">   الإشعارات</a>
            @endif
            @if($active['tab'] !='departmentStatistics')
            <a id="" class="dropdown-item" href='{{route('managerdepart_Stastistic')}}' style="padding-left:30px; ">  الإحصائيات</a>
            @endif
        </div>
    </div>



{{-- <div class="dropdown">
    <button type="button"  class="btn btn-light departmentNavbar_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
            <div class="textdropdown">    المستويات</div>
        </button>
        <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">

            <!-- <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   الصلاحيات</a> -->
            <a id="" class="dropdown-item" href='{{route('managerDepartment')}}'style="padding-left:30px; ">  المستويات</a>
            <a id="" class="dropdown-item" href='{{route('managerDepartAcademics')}}'style="padding-left:30px; ">  الأكادمين</a>
            <a id="" class="dropdown-item" href='{{route('notifications_manageDrpart')}}'style="padding-left:30px; ">   الإشعارات</a>
            <a id="" class="dropdown-item" href='{{route('managerdepart_Stastistic')}}' style="padding-left:30px; ">  الإحصائيات</a>

        </div>
    </div> --}}

        <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->

    <div  class="btn-group btn_group_nav_manageDepart" id="" >

        <button
         @if ($active['tab'] == 'departmentStatistics')
        style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"
        @endif
        class="btn-manageDepart-Navbar    " onclick="location.href='{{route('managerdepart_Stastistic')}}'" >
            <label class="proNavbartext">الإحصائيات </label></button>
        {{-- @if ($active['tab'] == 'departmentNotifications')     --}}
        <button
        @if ($active['tab'] == 'departmentNotifications')
        style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"
        @endif
         class="btn-manageDepart-Navbar   " onclick="location.href='{{route('notifications_manageDrpart')}}'">
            <label class="proNavbartext">  الإشعارات</label></button>
        <!-- <button class="btn-departments-Navbar"><label class="proNavbartext">  الصلاحيات </label></button> -->
        {{-- @if ($active['tab'] == 'academics') --}}
        <button
        @if ($active['tab'] == 'departmentAcademic')
        style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"
        @endif
         class="btn-manageDepart-Navbar    " onclick="location.href='{{route('managerDepartAcademics')}}'" >
            <label class="proNavbartext"> الأكادمين</label></button>
            {{-- @if ($active['tab'] == 'levels') --}}

        <button
        @if ($active['tab'] == 'departmentLevels')
        style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"
        @endif
         class="btn-manageDepart-Navbar    " onclick="location.href='{{route('managerDepartment')}}'" >
            <label class="proNavbartext"> المستويات</label></button>
    <!-- <div class="dep-name">تقنية معلومات</div> -->
</div>
