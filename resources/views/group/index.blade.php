@extends('layouts.home')

@section('nav')
<div class="hdr2" style=" box-shadow: 10px;">
    <button class=" spaces"> <label  class="subjectname" style="margin-left: -10px;">  الصفحة الرئيسية </label><img src="{{ Vite::image("dashboard (1).png") }}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
    </button>



        <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->

    <div  class="btn-group btn_group_nav_manageDepart-level" id="">
        <button class="btn-manageDepart-level-Navbar"><label class="proNavbartext">الإحصائيات </label></button>
        <button class="btn-manageDepart-level-Navbar"><label class="proNavbartext">  الجدول الدراسي</label></button>
        <button class="btn-manageDepart-level-Navbar"><label class="proNavbartext">  المقرر الدراسي </label></button>
        <button class="btn-manageDepart-level-Navbar"><label class="proNavbartext"> الأكادمين</label></button>
        <button class="btn-manageDepart-level-Navbar"><label class="proNavbartext"> المجموعات</label></button>
</div>


<div class="dropdown">
    <button type="button"  class="btn btn-light manageDepartlevelNavbar_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
            <div class="textdropdown">    الممجموعات</div>
        </button>
        <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
            <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  الأكادمين</a>
             <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   المقرر الدراسي</a>
            <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   الجدول الدراسي</a>
            <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  الإحصائيات</a>

        </div>
    </div>

            <div class="dep-name">تقنية معلومات</div>

    <div id="" class="input-group input-search-manageDepart">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-append">
            <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
        </div>
    </div>


    <!-- <td><button type="submit" class="btn btn-primary btn-sm  manageDepart-addAcademic" id="" data-toggle="modal" data-target="#addacademic"> اضافة اكاديمي<img src="../../images/plus.png"  width="20px" style="float: left;"></button> </td> -->


</div>

<div class="hr3">

    <button id="spacesbtn" class="spaces" onclick="window.location='{{ route('department.levels',$id->department->id) }}'"> <img src="{{ Vite::image("left-arrow.png") }}" id="spaces1"  width="30px"></button>

    <!-- <div id="input-groupstudyingbooks" class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-append">
            <button id="form-control" class="btn btn-light" type="submit"><img src="../images/magnifying-glass (2).png" id="spaces2"  width="20px" ></button>
        </div>
    </div>
    <td><button type="submit" class="btn btn-primary btn-sm" id="btn-uploade-grades" data-toggle="modal" data-target="#myModal"> رفع ملف<img src="../images/plus.png"  width="20px" style="float: left;"></button> </td> -->

</div>

@endsection

@section('content')



        <div class="container" id="container-project" style="  padding-top: 30px;">
        <div class="table-responsive-xl">
            <table class="table" style=" width:100%;">
                <thead class="table-header" style="font-size: 12px;">
                    <tr class="table-light" id="modldetials">
                        <th>طلاب\طالبات</th>
                        <th> النظام </th>
                        <th> عدد الطلاب</th>
                        <th>  اسم المجموعة</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($groups as $group)

                            <tr class="table-light"@if($loop->first) id="modldetials" style="margin-top:7px;cursor: pointer;" @else style="cursor: pointer" @endif onclick="window.location='{{ route('group.add-student',$group->id) }}'" >
                                <td>***********</td>
                                <td>***********</td>
                                <td>{{ $group->students->count() }}</td>
                                <td>{{ $group->name }}</td>
                                {{-- <td>{{ $group->name }}</td>
                                <td>{{ $group->level->department->name }}</td>
                                <td>{{ $group->level->name }}</td>
                                <td>{{ $group->group->name??__("general.no_groups") }}</td>
                                <td>{{ $group->max_students }}</td>
                                <td>{{ $group->created_at }}</td>
                                <td><a href="{{ route('groupsubject', $group->id) }}" class="btn btn-primary">{{ __("general.subject_group") }}</a>
                                <a href="{{ route('practical_group', $group->id) }}" class="btn btn-primary">{{ __("general.practical_group") }}</a>
                                <a href="{{ route('group.add-student', $group->id) }}" class="btn btn-primary">{{ __("general.add_student") }}</a></td> --}}
                            </tr>
                    @empty
                            <tr>
                                <td colspan="4">{{ __("general.no_groups") }}</td>
                            </tr>
                    @endforelse
                    {{-- <tr class="table-light" id="modldetials" style="margin-top:7px;">
                        <!-- <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" data-toggle="modal" data-target="#myModalEdite">تعديل  <img src="../../images/edit.png" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModal2">التفاصيل</button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal1" id="btn-chat-edit">الدردشة <img src="../../images/conversation (3).png" id=""  width="25px" ></button> </td> -->
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                    </tr> --}}


                </tbody>
            </table>
        </div>
    </div>


@endsection
