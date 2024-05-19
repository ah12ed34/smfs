@extends('layouts.home')
@section('nav')
<div class="hdr2" style=" box-shadow: 10px;">
    <button class=" spaces"> <label  class="subjectname" style="margin-left: -10px;">  الصفحة الرئيسية </label><img src="{{ Vite::image('dashboard (1).png') }}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
    </button>


<div class="dropdown">
    <button type="button"  class="btn btn-light departmentNavbar_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
            <div class="textdropdown">    المستويات</div>
        </button>
        <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">

             <!-- <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   الصلاحيات</a> -->
            <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  الأكادمين</a>
            <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   الإشعارات</a>
            <a id="" class="dropdown-item" href="{{ route('department.statistics',$department->id) }}" style="padding-left:30px; ">  الإحصائيات</a>

        </div>
    </div>

    <div  class="btn-group btn_group_nav_manageDepart" id="">
        <button class="btn-manageDepart-Navbar" onclick="window.location='{{ route('department.statistics',$department->id) }}'" ><label class="proNavbartext">الإحصائيات </label></button>
        <button class="btn-manageDepart-Navbar"><label class="proNavbartext">  الإشعارات</label></button>
        <button class="btn-manageDepart-Navbar"><label class="proNavbartext"> الأكادمين</label></button>
        <button class="btn-manageDepart-Navbar"><label class="proNavbartext"> المستويات</label></button>
</div>
<div class="dep-name">{{ $department->name }}</div>

</div>
@endsection

@section('content')


<div class="container" id="container-project" style="padding-top: 20px;">

    <div class="table-responsive-xl">
        <table class="table" style=" width:100%;">
            <thead class="table-header" style="font-size: 12px;">
                <tr class="table-light" id="modldetials">
                    <th>تعديل</th>
                    <th>التفاصيل</th>
                    <th>الصلاحية</th>
                    <th>التلفون</th>
                    <th> نوع الجندر</th>
                    <th>الإيمل الجامعي </th>
                    <th>المسمى الأكاديمي</th>
                    <th> الاسم</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($department->Academics as $academic)
                <tr class="table-light" @if($loop->first) id="modldetials" style="margin-top:7px;" @endif>
                    <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" data-toggle="modal" data-target="#myModalEdite">تعديل  <img src="{{ Vite::image('edit.png') }}" id=""  width="15px" ></button> </td>
                    <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModal2">التفاصيل</button> </td>
                    <!-- <td><button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal1" id="btn-chat-edit">الدردشة <img src="../../images/conversation (3).png" id=""  width="25px" ></button> </td> -->
                    <td>****</td>
                    <td>{{ $academic->user->phone }}</td>
                    <td>{{ $academic->user->gender_ar() }}</td>
                    <td>{{ $academic->user->email }}</td>
                    <td>{{ $academic->academic_name }}</td>
                    <td>{{ $academic->user->name }}</td>
                </tr>

                @empty

                @endforelse
                {{-- <tr class="table-light" id="modldetials" style="margin-top:7px;">
                    <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" data-toggle="modal" data-target="#myModalEdite">تعديل  <img src="../../images/edit.png" id=""  width="15px" ></button> </td>
                    <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModal2">التفاصيل</button> </td>
                    <!-- <td><button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal1" id="btn-chat-edit">الدردشة <img src="../../images/conversation (3).png" id=""  width="25px" ></button> </td> -->
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                </tr>
                <tr class="table-light">
                    <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" data-toggle="modal" data-target="#myModalEdite">تعديل  <img src="../../images/edit.png" id=""  width="15px" ></button> </td>
                    <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModal2">التفاصيل</button> </td>
                    <!-- <td><button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal1" id="btn-chat-edit">الدردشة <img src="../../images/conversation (3).png" id=""  width="25px" ></button> </td> -->
                    <td>*******</td>
                    <td>*******</td>
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
