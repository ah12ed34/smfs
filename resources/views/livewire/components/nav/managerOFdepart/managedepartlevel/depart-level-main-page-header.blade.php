<div>
    {{-- Stop trying to control. --}}

    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces"> <label  class="subjectname" style="margin-left: -10px;">  الصفحة الرئيسية </label><img src="{{Vite::image("dashboard (1).png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
        </button>



            <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->

            <div  class="btn-group btn_group_nav_manageDepart-level" id="">
                <button class="btn-manageDepart-level-Navbar" onclick="location.href='{{route('depart_level_studentsFinalTearmStatistics',$parameter)}}'"><label class="proNavbartext">الإحصائيات </label></button>
                <button class="btn-manageDepart-level-Navbar" onclick="location.href='{{route('depart_level_allsechedules',$parameter)}}'"><label class="proNavbartext">  الجدول الدراسي</label></button>
                <button class="btn-manageDepart-level-Navbar" onclick="location.href='{{route('depart_level_Books',$parameter)}}'"><label class="proNavbartext">  المقرر الدراسي </label></button>
                <button class="btn-manageDepart-level-Navbar" onclick="location.href='{{route('depart_level_academic',$parameter)}}'"><label class="proNavbartext"> الأكادمين</label></button>
                <button class="btn-manageDepart-level-Navbar" onclick="location.href='{{route('depart_level_Group_mainPage',$parameter)}}'"><label class="proNavbartext"> المجموعات</label></button>
        </div>

    <div class="dropdown">
        <button type="button"  class="btn btn-light manageDepartNavbarMainforLevel_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                <div class="textdropdown">    الممجموعات</div>
            </button>
            <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                {{-- <a id="" class="dropdown-item" href='{{route('depart_level_Group_mainPage')}}' style="padding-left:30px; ">المجموعات  </a> --}}
                <a id="" class="dropdown-item" href='{{route('depart_level_academic',$parameter)}}' style="padding-left:30px; ">  الأكادمين</a>
                <a id="" class="dropdown-item" href='{{route('depart_level_Books',$parameter)}}' style="padding-left:30px; ">   المقرر الدراسي</a>
                <a id="" class="dropdown-item" href='{{route('depart_level_allsechedules',$parameter)}}'style="padding-left:30px; ">   الجدول الدراسي</a>
                <a id="" class="dropdown-item" href='{{route('depart_level_studentsFinalTearmStatistics',$parameter)}}' style="padding-left:30px; ">  الإحصائيات</a>

            </div>
        </div>


                @section('header')
                <div class="dropdown">
                    <button type="button"  class="btn btn-light departmentTypeStudentsGroups_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                        <div class="textdropdown">{{ $typeGroup == 'sub' ? 'العملي' : 'النظري' }} </div>
                    </button>
                    <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                        @if($typeGroup == 'sub')
                        <a id="" class="dropdown-item" href='{{route('depart_level_Group_mainPage',$parameter+['type' => 'main'])}}' style="padding-left:30px; ">النظري  </a>
                        @else
                        <a id="" class="dropdown-item" href='{{route('depart_level_Group_mainPage',$parameter+['type' => 'sub'])}}' style="padding-left:30px; ">العملي  </a>
                        @endif
                        {{-- <a  class="dropdown-item" href="#" style="padding-left:30px; ">  العملي</a> --}}
                    </div>
                </div>

                <div class="dep-name">{{ auth()->user()?->academic?->department?->name }}</div>
                    <div id="" class="input-group input_search_manageDepart_StudentsGroups">
                        <input type="text" class="form-control" placeholder="Search" wire:model="search" wire:keydown.enter='srch' >
                        <div class="input-group-append">
                            <button id="form-control" class="btn btn-light" type="submit" wire:click='srch'><img src="{{Vite::image("magnifying-glass (2).png")}}"id="spaces2"  width="20px" ></button>
                        </div>
                    </div>

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
                @show

</div>
