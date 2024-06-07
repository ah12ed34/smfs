<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces"> <label  class="subjectname" style="margin-left: -10px;">  الصفحة الرئيسية </label><img src="{{Vite::image("dashboard (1).png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
        </button>


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
            <button class="btn-manageDepart-Navbar" onclick="location.href='{{route('notifications_manageDrpart')}}'"><label class="proNavbartext">  الإشعارات</label></button>
            <!-- <button class="btn-departments-Navbar"><label class="proNavbartext">  الصلاحيات </label></button> -->
            <button class="btn-manageDepart-Navbar" onclick="location.href='{{route('managerDepartAcademics')}}'"><label class="proNavbartext"> الأكادمين</label></button>
            <button class="btn-manageDepart-Navbar" onclick="location.href='{{route('managerDepartment')}}'"><label class="proNavbartext"> المستويات</label></button>



        <!-- <div class="dep-name">تقنية معلومات</div> -->
    </div>

    <div class="dropdown">
        <button type="button"  class="btn btn-light departmentTypeAcademic_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                <div class="textdropdown">    النظري</div>
            </button>
            <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">

                <!-- <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   الصلاحيات</a> -->
                <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  العملي</a>
                <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  الكل</a>

            </div>
        </div>
    <div class="dep-name">تقنية معلومات</div>
    </div>
     <div class="hr3">
        {{-- <button id="spacesbtn" class="spaces"> <img src="../../images/left-arrow.png" id="spaces1"  width="30px"></button> --}}

       {{-- " <div id="input-groupstudyingbooks" class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"><img src="../images/magnifying-glass (2).png" id="spaces2"  width="20px" ></button>
            </div>
        </div>
        <td><button type="submit" class="btn btn-primary btn-sm" id="btn-uploade-grades" data-toggle="modal" data-target="#myModal"> رفع ملف<img src="../images/plus.png"  width="20px" style="float: left;"></button> </td>" --}}

    </div>

</div>
