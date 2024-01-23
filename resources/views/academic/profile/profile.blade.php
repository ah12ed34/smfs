@extends('layouts.home')

{{-- @section('title', 'profile') --}}

@section("content")
<div class="container" >

<div class="card" id="profile-card">
    <div class="card" id="profile-card-header1">
        <div> <img class="img-fluid" src="{{Vite::image("profile.png")}}" id="profile-image"></div>
    </div>
    <div class="card card-light" id="profile-card-header2">
        <div>
            <label class="profile-user-name"> احمد الوجيه </label>
        </div>
        <button type="submit" class="btn btn-primary " id="btn-edit-profie" data-toggle="modal" data-target="#myModalEditeProfile">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button>
        <button type="submit" class="btn btn-primary " id="btn-change-password" data-toggle="modal" data-target="#myModalchangepassword">تغير كلمة السر</button>
    </div>


    <table id="profile-table" dir="rtl">
        <tr>
            <th colspan="2 " style="font-size: 18px;height: 50px;"> البيانات الشخصية</th>
        </tr>
        <tr>
            <th>الاسم</th>
            <td>Jackson</td>
        </tr>
        <tr>
            <th>تاريخ الميلاد</th>
            <td>********</td>
        </tr>
        <tr>
            <th> رقم الهاتف</th>
            <td>Jackson</td>
        </tr>
        <tr>
            <th> البريد الألكتروتي</th>
            <td>********</td>
        </tr>
        <tr>
            <th colspan="2 " style="font-size: 18px ; height: 50px; "> البيانات الجامعية</th>
        </tr>
        <tr>
            <th>الكلية</th>
            <td>******8</td>
        </tr>
        <tr>
            <th> القسم</th>
            <td>********</td>
        </tr>

        <tr>
            <th>الدرجة العلمية</th>
            <td>******8</td>
        </tr>
        <tr>
            <th>المستوى </th>
            <td>********</td>
        </tr>
        <th> المقرر الدراسي</th>
        <td>********</td>
        </tr>

        <tr>
            <th> المجموعات</th>
            <td>******8</td>
        </tr>

    </table>
</div>


</div>



<!-- the Modal changepassword -->

<div class="modal fade" id="myModalchangepassword">
<div class="modal-dialog">
    <div class="modal-content" id="modal-content" style="height:250px;">

        <!-- Modal Header -->
        <div class="modal-header" id="modheader">
            تغير كلمة السر
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="/action_page.php" style="display: block;">
                <div class="form-group">
                    <!-- <label for="usr">Name:</label> -->
                    <input type="text" class="form-control" id="inputtext" name="" placeholder="......كلمة السر الحالية  " style="height: 30px; margin-top:-6px">
                    <input type="text" class="form-control" id="inputtext" name="username" placeholder="......كلمة السر الجديدة " style="height: 30px; margin-top:8px">
                    <input type="text" class="form-control" id="inputtext" name="username" placeholder="......تأكيد كلمة السر الجديدة" style="height: 30px; margin-top:8px">
                </div>
                <!-- <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div> -->
            </form>
        </div>

        <!-- Modal footer -->

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btnsave" style="float: left; margin-left:30px;">حفظ</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel">إلغاء</button>
        </div>
    </div>
</div>
</div>





<!-- the Modal editeprofile -->

<div class="modal fade" id="myModalEditeProfile">
<div class="modal-dialog">
    <div class="modal-content" id="modal-content" style="height:350px;">

        <!-- Modal Header -->
        <div class="modal-header" id="modheader" style="padding-left:45%;">
            تعديل
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="/action_page.php" style="display: block;">
                <div class="form-group">
                    <!-- <label for="usr">:</label> -->
                    <input type="text" class="form-control" id="inputtext" name="username" placeholder=" الاسم " style="height: 30px; margin-top:-6px">
                    <input type="date" class="form-control" id="inputtext" name="brithdate" placeholder="تاريخ الميلاد " style="height: 30px; margin-top:8px">
                    <input type="text" class="form-control" id="inputtext" name="phoneNumber" placeholder="  رقم التلفون " style="height: 30px; margin-top:8px">
                    <div class="dropdown">
                        <button id="profile-edite-button-dropdow-gender" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown" style=" width:130px;">
                        <div class="textdrop"> الجندر</div>
                        </button>
                        <div id="dropdown-menulist" class="dropdown-menu" style="width:130px; color: #0E70F2;">
                            <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">ذكر</a>
                            <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">انثى </a>

                        </div>
                    </div>
                    <div class="dropdown">
                        <button id="profile-edite-button-dropdow-gradeSeice" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown" style=" width:130px;">
                        <div class="textdrop"> الدرجة العلمية</div>
                        </button>
                        <div id="dropdown-menulist" class="dropdown-menu" style="width:130px; color: #0E70F2;">
                            <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">استاذ مشارك</a>
                            <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">دكتور </a>
                            <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">مدرس </a>
                            <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">معيد </a>
                        </div>
                    </div>
                    <input type="text" class="form-control" id="inputtext" name="phoneNumber" placeholder="   الايمل الجامعي " style="height: 30px; margin-top:8px">
                </div>
                <!-- <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div> -->
            </form>
        </div>

        <!-- Modal footer -->

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btnsave" style="float: left; margin-left:30px;">حفظ</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel">إلغاء</button>
        </div>
    </div>
</div>
</div>




@endsection