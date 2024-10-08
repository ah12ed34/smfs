@section('style')
    <style>
        .hdr2 .active {
            background-color: #a9cbf7;
            text-decoration: none;
            border-bottom: 4px solid #2f81ec;
        }

        .btn_group_nav_departments {
            z-index: 100;
        }
    </style>
@endsection
<div>
    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces"> <label class="subjectname" style="margin-left: -10px;"> الصفحة الرئيسية </label><img
                src="{{ Vite::image('dashboard (1).png') }}" id="subject-icon-hdr2" width="40px"
                style="margin-left: -165px;">
        </button>


        <div class="dropdown">
            <button type="button" class="btn btn-light departmentNavbar_dropdown  dropdown-toggle"
                data-toggle="dropdown" dir="rtl">
                <div class="textdropdown">
                    @switch($active)
                        @case('department')
                            الأقسام
                        @break

                        @case('statistics')
                            الإحصائيات
                        @break

                        @default
                    @endswitch
                </div>
            </button>
            <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                @if ($active != 'department')
                    <a id="" class="dropdown-item" href="{{ route('departments_admin') }}"
                        style="padding-left:30px; ">الأقسام</a>
                @endif
                @if ($active != 'permission')
                    <a id="" class="dropdown-item" href="#" style="padding-left:30px; "> الصلاحيات</a>
                @endif
                @if ($active != 'notification')
                    <a id="" class="dropdown-item" href="#"style="padding-left:30px; "> الإشعارات</a>
                @endif
                @if ($active != 'usrs_employers')
                    <a id="" class="dropdown-item" href="#"style="padding-left:30px; "> الموظفين</a>
                @endif
                @if ($active != 'statistics')
                    <a id="" class="dropdown-item" href="{{ route('admin_statistics') }}"
                        style="padding-left:30px; "> الإحصائيات</a>
                @endif
                @if ($active != 'acdemic')
                    <a style="padding-left:20px;"> <button type="button" class="btn  dropdown-toggle "
                            data-toggle="dropdown" dir="rtl" style="background-color:white;"></a>
                    الأكاديميين
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">تقنية المعلومات</a>
                        <a class="dropdown-item" href="#">نظم المعلومات</a>
                        <a class="dropdown-item" href="#"> علوم الحاسوب</a>
                        <a class="dropdown-item" href="#">الأمن السيبراني </a>

                    </div>
                @endif



            </div>
        </div>

        <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->

        <div class="btn-group btn_group_nav_departments" id="">
            <button class="btn-departments-Navbar @if ($active == 'statistics') active @endif"
                onclick="window.location='{{ route('admin_statistics') }}'"><label class="proNavbartext">الإحصائيات
                </label></button>
            <button class="btn-departments-Navbar"><label class="proNavbartext"
                    onclick="window.location='{{ route('admin_notifications') }}'"> الإشعارات</label></button>
            <button class="btn-departments-Navbar"><label class="proNavbartext"
                    onclick="window.location='{{ route('permissions_Admin') }}'"> الصلاحيات </label></button>
            <button class="btn-departments-Navbar"><label class="proNavbartext"
                    onclick="window.location='{{ route('employee_admin') }}'"> الموظفين </label></button>
            @if ($departments->count() > 0)
                <div class="dropdown">
                    <button type="button"
                        class="btn btn-light dropdown-toggle btn-departments-Navbar  @if ($active == 'academic') active @endif"
                        data-toggle="dropdown" dir="rtl">
                        الأكادميين
                    </button>
                    <div class="dropdown-menu">
                        @foreach ($departments as $department)
                            <a class="dropdown-item"
                                href="{{ route('admin.academic', $department->id) }}">{{ $department->name }}</a>
                        @endforeach
                        {{-- <a class="dropdown-item" href="#">تقنية المعلومات   </a>
                <a class="dropdown-item" href="#">نظم المعلومات</a>
                <a class="dropdown-item" href="#"> علوم الحاسوب</a>
                <a class="dropdown-item" href="#">الأمن السيبراني </a> --}}
                    </div>
                </div>
            @endif
            <button class="btn-departments-Navbar @if ($active == 'department') active @endif"
                onclick="window.location='{{ route('departments_admin') }}'"><label class="proNavbartext">
                    الأقسام</label></button>




        </div>

        @if ($active == 'academic')
            <div class="dropdown">
                <button type="button" class="btn btn-light departmentAcademic_dropdown  dropdown-toggle"
                    data-toggle="dropdown" dir="rtl">
                    <div class="textdropdown"> جميع الأكادميين</div>
                </button>
                <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">

                    <a id="" class="dropdown-item" href="#" style="padding-left:30px; "> الصلاحيات</a>
                    <a id="" class="dropdown-item" href="#"style="padding-left:30px; "> الإشعارات</a>
                    <a id="" class="dropdown-item" href="#" style="padding-left:30px; "> الإحصائيات</a>

                </div>
            </div>

            <div id="" class="input-group input-search-admin">
                <input type="text" class="form-control" wire:model='search_model' placeholder="Search"
                    wire:keydown.enter='search()'>
                <div class="input-group-append">
                    <button id="form-control" class="btn btn-light" type="submit" wire:click='search()'><img
                            src="{{ Vite::image('magnifying-glass (2).png') }}" id="spaces2"
                            width="20px"></button>
                </div>
            </div>


            <td><button type="submit" class="btn btn-primary btn-sm  btn-addAcademic" id=""
                    wire:click='addacademic' data-toggle="modal" data-target="#addacademic"> اضافة اكاديمي<img
                        src="{{ Vite::image('plus.png') }}" width="20px" style="float: left;"></button> </td>
        @endif

    </div>

    @if ($active == 'academic')
        <div class="hr3">

        </div>
    @endif

</div>
