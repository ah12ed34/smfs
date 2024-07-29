
{{-- <style>
.active {
            background-color: #a9cbf7;
            text-decoration: none;
            border-bottom: 4px solid #2f81ec;
        }


</style> --}}
    </style>
<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces" onclick="location.href='{{route('managerDepartment')}}'"> <label  class="subjectname" style="margin-left: -10px;">   {{ auth()->user()?->academic?->department?->name }} </label><img src="{{Vite::image("it.png")}}" id="subject-icon-hdr2" width="40px" style="">
        </button>
        {{-- @include('components.layouts.manager_department.main_header') --}}


    <div class="dropdown">
        <button type="button"  class="btn btn-light departmentNavbar_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                <div class="textdropdown">    المستويات</div>
            </button>
            <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">

                <!-- <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   الصلاحيات</a> -->
                {{-- <a id="" class="dropdown-item" href='{{route('managerDepartment')}}'style="padding-left:30px; ">  المستويات</a> --}}
                <a id="" class="dropdown-item" href='{{route('managerDepartAcademics')}}'style="padding-left:30px; ">  الأكادمين</a>
                <a id="" class="dropdown-item" href='{{route('notifications_manageDrpart')}}'style="padding-left:30px; ">   الإشعارات</a>
                <a id="" class="dropdown-item" href='{{route('managerdepart_Stastistic')}}' style="padding-left:30px; ">  الإحصائيات</a>

            </div>
        </div>

            <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->

        <div  class="btn-group btn_group_nav_manageDepart" id="">
            <button class="btn-manageDepart-Navbar" onclick="location.href='{{route('managerdepart_Stastistic')}}'"><label class="proNavbartext">الإحصائيات </label></button>
            {{-- <button class="btn-manageDepart-Navbar" onclick="location.href='{{route('notifications_manageDrpart')}}'"><label class="proNavbartext">  الإشعارات</label></button> --}}
            <!-- <button class="btn-departments-Navbar"><label class="proNavbartext">  الصلاحيات </label></button> -->
            <button class="btn-manageDepart-Navbar" onclick="location.href='{{route('managerDepartAcademics')}}'"><label class="proNavbartext"> الأكادمين</label></button>
            <button class="btn-manageDepart-Navbar" onclick="location.href='{{route('managerDepartment')}}'" style="background-color: #a9cbf7;
            text-decoration: none;
            border-bottom: 4px solid #2f81ec;"><label class="proNavbartext"> المستويات</label></button>



        <!-- <div class="dep-name">تقنية معلومات</div> -->
    </div>

    {{-- <div class="dropdown">
        <button type="button"  class="btn btn-light departmentTypeAcademic_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                <div class="textdropdown">    النظري</div>
            </button>
            <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">

                <!-- <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   الصلاحيات</a> -->
                <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  العملي</a>
                <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  الكل</a>

            </div>
        </div> --}}
    {{-- <div class="dep-name">{{ auth()->user()?->academic?->department?->name }}</div> --}}
    </div>
     {{-- <div class="hr3">



    </div> --}}

</div>
