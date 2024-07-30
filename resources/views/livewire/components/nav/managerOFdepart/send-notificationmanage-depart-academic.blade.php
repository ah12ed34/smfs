<div>
    {{-- Do your work, then step back. --}}

    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces" onclick="location.href='{{ route('managerDepartment') }}'"> <label class="subjectname"
                style="margin-left: -10px;"> {{ auth()->user()?->academic?->department?->name }} </label><img
                src="{{ Vite::image('it.png') }}" id="subject-icon-hdr2" width="40px" style="">
        </button>


        <div class="dropdown">
            <button type="button" class="btn btn-light departmentNavbar_dropdown  dropdown-toggle"
                data-toggle="dropdown" dir="rtl">
                <div class="textdropdown"> الإشعارات </div>
            </button>
            <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">

                <!-- <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   الصلاحيات</a> -->
                <a id="" class="dropdown-item"
                    href='{{ route('managerDepartment') }}'style="padding-left:30px; "> المستويات</a>
                <a id="" class="dropdown-item"
                    href='{{ route('managerDepartAcademics') }}'style="padding-left:30px; "> الأكاديميين</a>
                {{-- <a id="" class="dropdown-item" href='{{route('notifications_manageDrpart')}}'style="padding-left:30px; ">   الإشعارات</a> --}}
                <a id="" class="dropdown-item" href='{{ route('managerdepart_Stastistic') }}'
                    style="padding-left:30px; "> الإحصائيات</a>

            </div>
        </div>

        <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->

        <div class="btn-group btn_group_nav_manageDepart" id="">
            <button class="btn-manageDepart-Navbar"
                onclick="location.href='{{ route('managerdepart_Stastistic') }}'"><label
                    class="proNavbartext">الإحصائيات </label></button>
            <button class="btn-manageDepart-Navbar"
                onclick="location.href='{{ route('notifications_manageDrpart') }}'"><label class="proNavbartext">
                    الإشعارات</label></button>
            <!-- <button class="btn-departments-Navbar"><label class="proNavbartext">  الصلاحيات </label></button> -->
            <button class="btn-manageDepart-Navbar"
                onclick="location.href='{{ route('managerDepartAcademics') }}'"><label class="proNavbartext">
                    الأكاديميين</label></button>
            <button class="btn-manageDepart-Navbar" onclick="location.href='{{ route('managerDepartment') }}'"><label
                    class="proNavbartext"> المستويات</label></button>


            <!-- <div class="dep-name">تقنية معلومات</div> -->
        </div>


        <div class="dep-name">تقنية معلومات</div>

        <div class="dropdown">

            <button id="" type="button" class="btn btn-light manageDepart-sentnotifications dropdown-toggle"
                data-toggle="dropdown" dir="rtl">
                <!-- <div class="textdropdown"> -->
                تحديد الأكاديميين
            </button>
            <div id="dropdown-menulist" class="dropdown-menu">
                <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">
                    *****</a>
                <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;">
                    *****</a>

            </div>

        </div>

    </div>

    <div class="hr3">
        <button id="spacesbtn" class="spaces" onclick="location.href='{{ route('notifications_manageDrpart') }}'"> <img
                src="{{ Vite::image('left-arrow.png') }}" id="spaces1" width="30px"></button>


        <!-- <td><button type="submit" class="btn btn-primary btn-sm" id="btn-uploade-grades" data-toggle="modal" data-target="#myModal"> رفع ملف<img src="../images/plus.png"  width="20px" style="float: left;"></button> </td> -->

    </div>




</div>
