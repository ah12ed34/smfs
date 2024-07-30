<div class="hdr2" style=" box-shadow: 10px;">
    <button class=" spaces"> <label class="subjectname" style="margin-left: -10px;"> الصفحة الرئيسية </label><img
            src="{{ Vite::image('dashboard (1).png') }}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
    </button>


    <div class="dropdown">
        <button type="button" class="btn btn-light departmentNavbar_dropdown  dropdown-toggle" data-toggle="dropdown"
            dir="rtl">
            <div class="textdropdown"> المستويات</div>
        </button>
        <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">

            <!-- <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   الصلاحيات</a> -->
            <a id="" class="dropdown-item" href="#" style="padding-left:30px; "> الأكاديميين</a>
            <a id="" class="dropdown-item" href="#"style="padding-left:30px; "> الإشعارات</a>
            <a id="" class="dropdown-item" href="{{ route('department.statistics', $department->id) }}"
                style="padding-left:30px; "> الإحصائيات</a>

        </div>
    </div>

    <div class="btn-group btn_group_nav_manageDepart" id="">
        <button class="btn-manageDepart-Navbar"
            onclick="window.location='{{ route('department.statistics', $department->id) }}'"><label
                class="proNavbartext">الإحصائيات </label></button>
        <button class="btn-manageDepart-Navbar"><label class="proNavbartext"> الإشعارات</label></button>
        <button class="btn-manageDepart-Navbar"
            onclick="window.location='{{ route('department.academics', $department->id) }}'"><label
                class="proNavbartext"> الأكاديميين</label></button>
        <button class="btn-manageDepart-Navbar"><label class="proNavbartext"
                onclick="window.location='{{ route('department.levels', $department->id) }}'">
                المستويات</label></button>
    </div>
    <div class="dep-name">{{ $department->name }}</div>

</div>
