<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces"> <label  class="subjectname" style="margin-left: -10px;">  الصفحة الرئيسية </label><img src="{{Vite::image("dashboard (1).png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
        </button>



            <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->

            <div  class="btn-group btn_group_nav_manageDepart-level" id="">
                <button class="btn-manageDepart-level-Navbar" onclick="location.href='{{route('depart_level_studentsFinalTearmStatistics')}}'"><label class="proNavbartext">الإحصائيات </label></button>
                <button class="btn-manageDepart-level-Navbar" onclick="location.href='{{route('depart_level_allsechedules')}}'"><label class="proNavbartext">  الجدول الدراسي</label></button>
                <button class="btn-manageDepart-level-Navbar" onclick="location.href='{{route('depart_level_Books')}}'"><label class="proNavbartext">  المقرر الدراسي </label></button>
                <button class="btn-manageDepart-level-Navbar" onclick="location.href='{{route('depart_level_academic')}}'"><label class="proNavbartext"> الأكادمين</label></button>
                <button class="btn-manageDepart-level-Navbar" onclick="location.href='{{route('depart_level_Group_mainPage')}}'"><label class="proNavbartext"> المجموعات</label></button>
        </div>



    <div class="dropdown">
        <button type="button"  class="btn btn-light manageDepartlevelNavbar_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                <div class="textdropdown">    الإحصائيات</div>
            </button>
            <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                <a id="" class="dropdown-item" href='{{route('depart_level_Group_mainPage')}}' style="padding-left:30px; ">المجموعات  </a>
                <a id="" class="dropdown-item" href='{{route('depart_level_academic')}}' style="padding-left:30px; ">  الأكادمين</a>
                <a id="" class="dropdown-item" href='{{route('depart_level_Books')}}' style="padding-left:30px; ">   المقرر الدراسي</a>
                <a id="" class="dropdown-item" href='{{route('depart_level_allsechedules')}}'style="padding-left:30px; ">   الجدول الدراسي</a>
                {{-- <a id="" class="dropdown-item" href='{{route('depart_level_studentsFinalTearmStatistics')}}' style="padding-left:30px; ">  الإحصائيات</a> --}}

            </div>
        </div>


                <div class="dep-name">تقنية معلومات</div>

                <div class="dropdown">
                    <button type="button"  class="btn btn-light MnageDepart_studentsFinalWorks_Statistics_TypeTerm_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                    <div class="textdropdown"> الترم الاول</div>
                </button>
                <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                    <a id="" class="dropdown-item" href="#" style="padding-left:30px; "> الترم الثاني</a>
                </div>
            </div>

            <div class="dropdown">
            <button type="button"  class="btn btn-light MnageDepart_studentsGroupsFinalWorks_Statistics_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                    <div class="textdropdown">    كل المجموعات</div>
                </button>
                <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">

                    <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   مجموعة(1)</a>
                    <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  مجموعة(2)</a>
                    <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  مجموعة(3)</a>

                </div>
            </div>

            <div class="dropdown">
                <button type="button"  class="btn btn-light MnageDepart_studentsFinalWorks_Statistics_Subjec_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                        <div class="textdropdown">    جميع المقرر   </div>
                    </button>
                    <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">

                        <a id="" class="dropdown-item" href="#" style="padding-left:30px; "> نظم موزعة</a>
                        <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  التحقيق الرقمي </a>
                        <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   التجارة الالكترونية </a>


                    </div>
                </div>
{{--
        <div id="" class="input-group input_search_manageDepart_students">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}"id="spaces2"  width="20px" ></button>
            </div>
        </div> --}}


        <!-- <td><button type="submit" class="btn btn-primary btn-sm  manageDepart-addAcademic" id="" data-toggle="modal" data-target="#addacademic"> اضافة اكاديمي<img src="../../images/plus.png"  width="20px" style="float: left;"></button> </td> -->


    </div>

    <div class="hr3">
        <button id="spacesbtn" class="spaces" onclick="location.href='{{route('managerDepartment')}}'"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px"></button>

        <!-- <div id="input-groupstudyingbooks" class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"><img src="../images/magnifying-glass (2).png" id="spaces2"  width="20px" ></button>
            </div>
        </div>
        <td><button type="submit" class="btn btn-primary btn-sm" id="btn-uploade-grades" data-toggle="modal" data-target="#myModal"> رفع ملف<img src="../images/plus.png"  width="20px" style="float: left;"></button> </td> -->

    </div>
</div>
