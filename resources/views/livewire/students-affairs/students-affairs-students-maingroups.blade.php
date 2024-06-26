@section('nav')
@livewire('components.nav.students-affairs.students-affairs-students-maingroups-header')
@endsection
<div>
    {{-- Success is as dangerous as failure. --}}

        <div class="container" style="padding-top: 20px;" >

            <div class="table-responsive-xl">
                <table class="table" style=" width:100%;">
                    <thead class="table-header" style="font-size: 12px;">
                        <tr class="table-light" id="modldetials">
                            <th>تعديل</th>
                            <th>عرض الطلاب</th>
                            <th>طلاب\طالبات</th>
                            <th> النظام </th>
                            <th> عدد الطلاب</th>
                            <th>  اسم المجموعة</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#EditeaStudenGroupModal">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModal2" onclick="location.href='{{route('studentsInformation_InGroup')}}'">عرض</button> </td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                        </tr>
                        <tr class="table-light">
                            <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#EditeaStudenGroupModal">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModal2" onclick="location.href='{{route('studentsInformation_InGroup')}}'">عرض</button> </td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                        </tr>
                        <tr class="table-light">
                            <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#EditeaStudenGroupModal">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModal2" onclick="location.href='{{route('studentsInformation_InGroup')}}'">عرض</button> </td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                        </tr>
                        <tr class="table-light">
                            <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#EditeaStudenGroupModal">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModal2" onclick="location.href='{{route('studentsInformation_InGroup')}}'">عرض</button> </td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>



    <!-- The ModalAddaStudenGroup -->
<div class="modal fade" id="AddaStudenGroupModal">
    <div class="modal-dialog">
        <div class="modal-content addacademic" id="modal-content" style="background-color: #F6F7FA; height: 330px;">

            <!-- Modal Header -->
            <div class="modal-header addacademic" id="modheader">
                إضافة مجموعة
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="/action_page.php" style="display: block;">
                    <div class="form-group">

                        <!-- <img src="{{Vite::image("profile.png")}}"  width="" class="user_profile_modal" > -->

                        <!-- <label for="usr">Name:</label> -->
                        <input type="text" class="form-control" id="inputtext" name="projectname" placeholder=" اسم المجموعة " style="height: 30px; margin-top:8px">
                        <input type="data" class="form-control" id="inputtext" name="data" placeholder=" عددالطلاب" style="height: 30px; margin-top:8px">
                        <div class="dropdown">
                            <button type="button" class="btn btn-light gendar_studentsGroup dropdown-toggle"  data-toggle="dropdown">
                                <div class="textdropdown">  نوع الجندر</div>
                            </button>
                            <div  class="dropdown-menu" style=" color: #0E70F2; ">
                                <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   طلاب </a>
                                <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   طالبات</a>
                            </div>
                        </div>

                        <div class="dropdown">
                            <button type="button" class="btn btn-light TypeSystem_studying_StudentsGroups_dropdown dropdown-toggle"  data-toggle="dropdown">
                                <div class="textdropdown">  النظام</div>
                            </button>
                            <div  class="dropdown-menu" style=" color: #0E70F2; ">
                                <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   عام </a>
                                <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   موازي</a>
                                <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   عام وموازي</a>

                            </div>
                        </div>

                        <div class="dropdown">
                            <button type="button" class="btn btn-light TypeGroups_in_modalAdd_dropdown dropdown-toggle"  data-toggle="dropdown">
                                <div class="textdropdown">  نوع المجموعة</div>
                            </button>
                            <div  class="dropdown-menu" style=" color: #0E70F2; ">
                                <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">    نظري</a>
                                <a id="" class="dropdown-item" href="#"style="padding-left:30px; "> عملي  </a>
                            </div>
                        </div>


                        <!-- <input type="file" class="form-control-file border" id="file" name="uploadefile" style="height: 30px; margin-top:8px">
                        <input type="text" class="form-control" id="inputtext" name="note" placeholder="ملاحظة" style="height: 30px; margin-top:8px"> -->
                    </div>

                </form>
            </div>

            <!-- Modal footer -->

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="">حفظ</button>
                <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>
            </div>
        </div>
    </div>
</div>


<!-- The ModalEditeStudenGroup -->
<div class="modal fade" id="EditeaStudenGroupModal">
    <div class="modal-dialog">
        <div class="modal-content addacademic" id="modal-content" style="background-color: #F6F7FA; height: 300px;">

            <!-- Modal Header -->
            <div class="modal-header addacademic" id="modheader">
                تعديل مجموعة
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="/action_page.php" style="display: block;">
                    <div class="form-group">

                        <!-- <img src="{{Vite::image("profile.png")}}"  width="" class="user_profile_modal" > -->

                        <!-- <label for="usr">Name:</label> -->
                        <input type="text" class="form-control" id="inputtext" name="projectname" placeholder=" اسم المجموعة " style="height: 30px; margin-top:8px">
                        <input type="data" class="form-control" id="inputtext" name="data" placeholder=" عددالطلاب" style="height: 30px; margin-top:8px">
                        <div class="dropdown">
                            <button type="button" class="btn btn-light gendar_studentsGroup dropdown-toggle"  data-toggle="dropdown">
                                <div class="textdropdown">  نوع الجندر</div>
                            </button>
                            <div  class="dropdown-menu" style=" color: #0E70F2; ">
                                <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   طلاب </a>
                                <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   طالبات</a>
                            </div>
                        </div>

                        <div class="dropdown">
                            <button type="button" class="btn btn-light TypeSystem_studying_StudentsGroups_dropdown dropdown-toggle"  data-toggle="dropdown">
                                <div class="textdropdown">  النظام</div>
                            </button>
                            <div  class="dropdown-menu" style=" color: #0E70F2; ">
                                <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   عام </a>
                                <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   موازي</a>
                                <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   عام وموازي</a>

                            </div>
                        </div>

                        <div class="dropdown">
                            <button type="button" class="btn btn-light TypeGroups_in_modalAdd_dropdown dropdown-toggle"  data-toggle="dropdown">
                                <div class="textdropdown">  نوع المجموعة</div>
                            </button>
                            <div  class="dropdown-menu" style=" color: #0E70F2; ">
                                <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">    نظري</a>
                                <a id="" class="dropdown-item" href="#"style="padding-left:30px; "> عملي  </a>
                            </div>
                        </div>

                        <!-- <input type="file" class="form-control-file border" id="file" name="uploadefile" style="height: 30px; margin-top:8px">
                        <input type="text" class="form-control" id="inputtext" name="note" placeholder="ملاحظة" style="height: 30px; margin-top:8px"> -->
                    </div>

                </form>
            </div>

            <!-- Modal footer -->

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="">حفظ</button>
                <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>
            </div>
        </div>
    </div>
</div>
</div>
