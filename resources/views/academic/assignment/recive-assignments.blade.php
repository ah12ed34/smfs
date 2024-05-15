@extends('layouts.home')
@section('nav')
<div class="hdr2" style=" box-shadow: 10px;">
    <button class="spaces"> <label  class="subjectname"> التكاليف </label><img src="{{Vite::image("homework (3).png")}}" id="subject-icon-hdr2" width="40px">
    </button>
    <div class="dep-sub-name">نظم موزعة </div>
    <div class="container">
        <button id="btn-groups-hw" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown">
        <div class="textdrop2">  جميع المجموعات</div>
       </button>
        <div id="dropdown-menulist" class="dropdown-menu" style="width:130px; color: #0E70F2; ">
            <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">(1)المجموعة</a>
            <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> المجموعة(2)</a>
            <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> المجموعة(3)</a>
        </div>



        <div class="dropdown">
            <button id="btn-navbar-hw" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown">
            <div class="textdrop2">   قائمة الواردة</div>
           </button>
            <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px; ">تسليم مبكر</a>
                <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:30px; "> تسليم متأخر</a>
                <a id="dropdown-itemlist" class="dropdown-item" href="#"> لم يتم التسليم</a>
            </div>
        </div>



        <div class="btn-group">
            <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->
            <button class="btn-projctsNavbar-reciv-assigne"><label class="proNavbartext">لم يتم التسليم</label></button>
            <button class="btn-projctsNavbar-reciv-assigne"><label class="proNavbartext"> تسليم متأخر</label></button>
            <button class="btn-projctsNavbar-reciv-assigne"><label class="proNavbartext"> تسليم مبكر </label></button>
            <button class="btn-projctsNavbar-reciv-assigne"><label class="proNavbartext"> الواردة</label></button>
        </div>


    </div>

</div>
 <div class="hr3">
        <a href="{{route("assignment")}}">     <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px" ></button></a>
        {{-- <div id="input-group-reciv-assign" class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
            </div>
        </div> --}}

        <div id="input-group-assign" class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
            </div>
        </div>
        
    </div>
@endsection

@section("content")


   
    <div class="responsive"></div>
    <div class="container" id="container-project" style="  padding-top: 30px;" >
   
   
        <div class="table-responsive-xl">
            <table class="table" id="table" style=" margin-right: -30px; " >
                <thead class="table-header" style="font-size: 12px;">
                    <tr class="table-light" id="modldetials">
                        <th>ملاحظة </th>
                        <th>الدرجة</th>
                        <th>الملف</th>
                        <th> حالة التسليم</th>
                        <th>تاريخ التسليم</th>
                        <th> اسم الطالب</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-light" id="modldetials" style="margin-top:7px;">

                        <td>*******</td>
                        <td>10</td>
                        <td> ***</td>
                        <td>*******</td>
                        <td>***** </td>
                        <td>SFMS</td>
                    </tr>
                    <tr class="table-light">
                        <td>*******</td>
                        <td>10</td>
                        <td> ***</td>
                        <td>*******</td>
                        <td>***** </td>
                        <td>SFMS</td>
                    </tr>
                    <tr class="table-light">
                        <td>*******</td>
                        <td>10</td>
                        <td> ***</td>
                        <td>*******</td>
                        <td>***** </td>
                        <td>SFMS</td>
                    </tr>
                    <tr class="table-light">
                        <td>*******</td>
                        <td>10</td>
                        <td> ***</td>
                        <td>*******</td>
                        <td>***** </td>
                        <td>SFMS</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>


@endsection