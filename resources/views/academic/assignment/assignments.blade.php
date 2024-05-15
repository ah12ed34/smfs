@extends('layouts.home')
@section('nav')
<div class="hdr2" style=" box-shadow: 10px;">
    <button class="spaces"> <label  class="subjectname"> التكاليف </label><img src="{{Vite::image("homework (3).png")}}" id="subject-icon-hdr2" width="40px">
    </button>
    <div class="dep-sub-name">نظم موزعة </div>
    <div class="container">
        <button id="btn-groups-assigne" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown">
        <div class="textdrop2">  جميع المجموعات</div>
       </button>
        <div id="dropdown-menulist" class="dropdown-menu" style="width:130px; color: #0E70F2; ">
            <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">(1)المجموعة</a>
            <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> المجموعة(2)</a>
            <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> المجموعة(3)</a>
        </div>
        <td><button type="submit" class="btn btn-primary btn-sm" id="btn-addHW" data-toggle="modal" data-target="#myModal">إضافة تكليف<img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button> </td>
    </div>
</div>
@endsection

@section("content")


    {{-- <div class="hr3">
        <a href="{{route("subject.index")}}">  <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px" ></button></a>
        <div id="input-group-assign" class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
            </div>
        </div>
    </div> --}}
    <div class="responsive"></div>
    <div class="container">

        <div id="card-HW" class="card bg-light text-dark" style=" color: #0E70F2;">
            <div class="card-body">
                {{-- <div class="btn-HW">
                    <a href="{{route("recive-assignments")}}">        <button type="submit" class="btn btn-primary " id="btn-recive-hw" data-toggle="" data-target="#">الواردة </button></a>
                    <button type="submit" class="btn btn-primary" id="btn-recive-hw" data-toggle="modal" data-target="#myModalediteAssign" style="background-color: #ffffff;box-shadow: 0px 0px 2px 0px rgb(67, 111, 206);color: #0E70F2;border: none;height:30px;">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button>
                    <button type="submit" class="btn btn-danger" id="btn-recive-hw" data-toggle="modal" data-target="#myModalstop">إيقاف </button>
                </div> --}}
                {{-- <div class="text-hw">
                    <label for="" style="margin-right: 30px;">  الفصل الأول من المشروع </label> <label for="">اسم التكاليف</label><br>
                    <label for="" style="margin-right: 77px;">10</label> <label for="">الدرجة</label><br>
                    <label for="" style="margin-right: 66px;">المقدمة والاهداف والمشاكل وتنظيم التقرير</label> <label for="">الوصف</label><br>
                    <label for="" style="margin-right: 73px;">pdf. الفصل الأول من المشروع </label> <label for="">الملف</label> <br>
                    <label for="" style="margin-right: 35px;"> 2023/11/2</label> <label for="">تاريخ التسليم</label>
                </div> --}}
                <div class="btn-HW">
                    <a href="{{route("recive-assignments",[$group_subject->subject_id,$group_subject->group_id])}}"> <button type="submit" class="btn btn-primary " id="btn-recive-hw" data-toggle="" data-target="#">الواردة </button></a>
                    {{-- <button type="submit" class="btn btn-primary " id="btn-recive-hw" data-toggle="" data-target="#">الواردة </button> --}}
                    <button type="submit" class="btn btn-light " id="btn-recive-edte-hw" data-toggle="modal" data-target="#myModalediteAssign">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button>
                    <button type="submit" class="btn btn-danger " id="btn-recive-hw" data-toggle="modal" data-target="#myModalstop">إيقاف </button>
                </div>

                <table id="table-details-assignements-teacher" dir="rtl">
                    <tr>
                        <th id="table-header-assigne-teacher">اسم التكاليف</th>
                        <td id="text-table-teacher">*******</td>
                    </tr>
                    <tr>
                        <th id="table-header-assigne-teacher">الدرجة</th>
                        <td id="text-table-assigne-teacher">*******</td>
                    </tr>
                    <tr>
                        <th id="table-header-assigne-teacher">الوصف</th>
                        <td id="text-table-assigne-teacher">*******</td>
                    </tr>

                    <tr>
                        <th id="table-header-assigne-teacher">الملف</th>
                        <td id="text-table-assigne-teacher">*******</td>
                    </tr>
                    <tr>
                        <th id="table-header-assigne-teacher">تاريخ التسليم</th>
                        <td id="text-table-assigne-teacher">*******</td>
                    </tr>


                </table>


            </div>
        </div>
    </div>


    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content" style="background-color: #F6F7FA;">

                <!-- Modal Header -->
                <div class="modal-header" id="modheader" style="padding-left: 40%;">
                      إضافة تكليف جديد
                    <button type="button" class="close" data-dismiss="modal"><img src="{{Vite::image("cancelbtn.png")}}"   width="20px" style="position: static;" ></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" style="display: block;">
                        <div class="form-group">
                            <!-- <label for="usr">Name:</label> -->
                            <input type="text" class="form-control" id="inputtext" name="username" placeholder="اسم التكليف " style="height: 30px; margin-top:-6px">
                            <input type="text" class="form-control" id="inputtext" name="username" placeholder="الدرجة " style="height: 30px; margin-top:8px">
                            <textarea style="height: 100px;" class="form-control" rows="5" id="comment" placeholder=" وصف التكليف" style=" margin-top:8px"></textarea>
                            <input type="file" class="form-control-file border" id="file" name="file" style="height: 30px; margin-top:8px" placeholder="ارفق ملف">
                            <input type="date" class="form-control" id="inputtext" name="date" placeholder="تاريخ التسليم" style="height: 30px; margin-top:8px">
                            <input type="text" class="form-control" id="inputtext" name="username" placeholder="ملاحظة " style="height: 30px; margin-top:8px">
                        </div>
                        <!-- <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
                    </form>
                </div>

                <!-- Modal footer -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btnsave" style="float: left;">حفظ</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel">إلغاء</button>

                </div>
            </div>
        </div>
    </div>




    <!-- the Modal edite -->

    <div class="modal fade" id="myModalediteAssign">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content" style="background-color: #F6F7FA;">

                <!-- Modal Header -->
                <div class="modal-header" id="modheader" style="padding-left: 45%;">
                    تعديل
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/action_page.php" style="display: block;">
                        <div class="form-group">
                            <!-- <label for="usr">Name:</label> -->
                            <input type="text" class="form-control" id="inputtext" name="assignName" placeholder="اسم التكليف " style="height: 30px; margin-top:-6px">
                            <input type="text" class="form-control" id="inputtext" name="grades" placeholder="الدرجة " style="height: 30px; margin-top:8px">
                            <textarea style="height: 100px;" class="form-control" rows="5" id="comment" placeholder=" وصف التكليف" style=" margin-top:8px"></textarea>
                            <input type="file" class="form-control-file border" id="file" name="file" style="height: 30px; margin-top:8px" placeholder="ارفق ملف">
                            <input type="date" class="form-control" id="inputtext" name="sendingdate" placeholder=" تاريخ التسليم " style="height: 30px; margin-top:8px">
                            <input type="text" class="form-control" id="inputtext" name="note" placeholder="ملاحظة " style="height: 30px; margin-top:8px">
                        </div>
                        <!-- <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
                    </form>
                </div>

                <!-- Modal footer -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btnsave" style="float: left;">حفظ</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel">إلغاء</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="myModalstop">
        <div class="modal-dialog ">
            <div class="modal-content" style="height: 150px;">

                <!-- Modal Header -->
                <div class="modal-header" style="padding-left:50%; height: 40px; padding-top:6px;">
                    تنبيه!
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="text-align:center ;">
                    <form action="" style="display: block;">

                        هل تريد بالفعل إيقاف التكليف؟


                        <!-- <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div> -->
                    </form>
                </div>

                <!-- Modal footer -->

                <div class="modal-footer" style="height: 40px;">
                    <button type="submit" class="btn btn-primary" id="btnOkYes">نعم</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnNO">لا</button>
                </div>
            </div>
        </div>
    </div>


</div>


<div class="bottomNavbar">
    <button class="btn-bottomNavbar"><img src="{{Vite::image("setting (2).png")}}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">الإعدادات</label></button>
    <button class="btn-bottomNavbar"><img src="{{Vite::image("portfolio (2).png")}}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">الأرشيف</label></button>
    <button class="btn-bottomNavbar"><img src="{{Vite::image("calendar (3).png")}}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">الجدول </label></button>
    <a href="{{route("academic.home")}}"> <button class="btn-bottomNavbar"><img src="{{Vite::image("home (1).png")}}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">القائمة</label></button></a>

    <!-- <button class="btn-bottomNavbar"><i id="bottombaricon" class="bi bi-house-fill custom-width-icon" width="30px" height="30px"></i><br>
    <label class="bottomNavbartext">القائمة</label>
    </button> -->
</div>
@endsection
