<div>
    {{-- The whole world belongs to you. --}}
    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces"> <label  class="subjectname" style="margin-left: -10px;">  الصفحة الرئيسية </label><img src="{{Vite::image("dashboard (1).png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
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

            <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->

        <div  class="btn-group btn_group_nav_manageDepart" id="">
            <button class="btn-manageDepart-Navbar"><label class="proNavbartext">الإحصائيات </label></button>
            <button class="btn-manageDepart-Navbar"><label class="proNavbartext">  الإشعارات</label></button>
            <!-- <button class="btn-departments-Navbar"><label class="proNavbartext">  الصلاحيات </label></button> -->
            <button class="btn-manageDepart-Navbar"><label class="proNavbartext"> الأكادمين</label></button>
            <button class="btn-manageDepart-Navbar"><label class="proNavbartext"> المستويات</label></button>



        <!-- <div class="dep-name">تقنية معلومات</div> -->
    </div>


    <div class="dep-name">تقنية معلومات</div>

    <div class="dropdown">

        <button id="" type="button" class="btn btn-light manageDepart-sentnotifications dropdown-toggle" data-toggle="dropdown" dir="rtl">
            <!-- <div class="textdropdown"> -->
                جميع المستويات
           </button>
        <div id="dropdown-menulist" class="dropdown-menu">
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> مستوى اول</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;">مستوى ثاني</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;"> مستوى ثالث</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;">  مستوى رابع</a>
        </div>

        </div>
        <!-- <div class="dropdowngroups"> -->

        <button id="" type="button" class="btn btn-light manageDepart-groups-sentnotifications dropdown-toggle" data-toggle="dropdown"  dir="rtl">
              جميع المجموعات
           </button>
        <div id="dropdown-menulist" class="dropdown-menu">
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">(1)المجموعة</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;"> المجموعة(2)</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#"> المجموعة(3)</a>
        </div>

        <!-- </div> -->
        <div class="dropdown">

            <button id="" type="button" class="btn btn-light manageDepart-spacific-studentsdropdown dropdown-toggle" data-toggle="dropdown" aria-placeholder=" تحديد طلاب" dir="rtl">
               تحديد طلاب
                </button>
            <div id="dropdown-menulist" class="dropdown-menu" style="width:100px;">

            </div>
        </div>

    </div>

    <div class="hr3">
        <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px"></button>


        <!-- <td><button type="submit" class="btn btn-primary btn-sm" id="btn-uploade-grades" data-toggle="modal" data-target="#myModal"> رفع ملف<img src="../images/plus.png"  width="20px" style="float: left;"></button> </td> -->

    </div>
</div>
