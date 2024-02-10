@extends('layouts.home')
@section('nav')

@endsection
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
        
        
        <div id="myModalchangepassword" class="fixed inset-0 z-50 overflow-y-auto"  role="dialog">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
              <div class="relative w-full max-w-md p-6 my-8 shadow-2xl rounded-2xl bg-white sm:p-10">
                <div class="absolute top-0 right-0 pt-4 pr-4">
                  <button type="button" class="bg-transparent text-2xl font-bold leading-none outline-none focus:outline-none" aria-label="Close" onclick="closeModal()">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <h3 class="text-lg leading-6 font-medium text-gray-900" >
                  Modal Title
                </h3>
                <div class="mt-2">
                  <p>This is the content of the modal.</p>
                </div>
                <div class="mt-6">
                  <button type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Action
                  </button>
                </div>
              </div>
            </div>
          </div>
    </div>


    <table id="profile-table" dir="rtl">
        <tr>
            <th colspan="2 " style="font-size: 18px;height: 50px;padding-left: 100px;"> البيانات الشخصية</th>
        </tr>
        <tr>
            <th id="table-th" style="padding-right: 0px" >الاسم</th>
            <td id="table-td" style="padding-left:100px;">Jackson</td>
        </tr>
        <tr>
            <th id="table-th" style="padding-right: 0px">تاريخ الميلاد</th>
            <td id="table-td" style="padding-left:100px;"> ********</td>
        </tr>
        <tr>
            <th id="table-th" style="padding-right: 0px"> رقم الهاتف</th>
            <td id="table-td" style="padding-left:100px;">********</td>
        </tr>
        <tr>
            <th id="table-th" style="padding-right: 0px"> البريد الألكتروتي</th>
            <td id="table-td" style="padding-left:100px;">********</td>
        </tr>
        <tr>
            <th colspan="2 " style="font-size: 18px ; height: 50px;padding-left: 100px; "> البيانات الجامعية</th>
        </tr>
        <tr>
            <th id="table-th" style="padding-right: 0px">الكلية</th>
            <td id="table-td" style="padding-left:100px;">********</td>
        </tr>
        <tr>
            <th id="table-th" style="padding-right: 0px"> القسم</th>
            <td id="table-td" style="padding-left:100px;">********</td>
        </tr>

        <tr>
            <th id="table-th" style="padding-right: 0px">الدرجة العلمية</th>
            <td id="table-td" style="padding-left:100px;">********</td>
        </tr>
        <tr>
            <th  id="table-th"style="padding-right: 0px">المستوى </th>
            <td  id="table-td"style="padding-left:100px;">********</td>
        </tr>
        <th  id="table-th" style="padding-right: 0px"> المقرر الدراسي</th>
        <td id="table-td" style="padding-left:100px;">********</td>
    </tr>

        <tr>
            <th id="table-th" style="padding-right: 0px"> المجموعات</th>
            <td id="table-td" style="padding-left:100px;">********</td>
        </tr>

    </table>
</div>


</div>

  


<!-- the Modal changepassword -->

<div class="modal fade" id="y">
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

