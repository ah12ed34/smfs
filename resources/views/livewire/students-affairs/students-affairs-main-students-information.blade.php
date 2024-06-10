@section('nav')
@livewire('components\nav\students-affairs.students-affairs-main-students-information-header')
@endsection
<div>
    {{-- In work, do what you enjoy. --}}

        <div class="container" style="padding-top: 20px;" >

            <div class="table-responsive-xl">
                <table class="table" style=" width:100%;">
                    <thead class="table-header" style="font-size: 12px;">
                        <tr class="table-light" id="modldetials">
                            <th> حذف </th>
                            <th> تعديل </th>
                            <th> التفاصيل </th>
                            <th> التلفون </th>
                            <th>   الأيمل</th>
                            <th>   الحالة </th>
                            <th> النظام </th>
                            <th> الجندر </th>
                            <th>  اسم الطالب</th>
                            <th>   الرقم الأكاديمي</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#MessageApprovementDeleteModal">حذف  <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#EditeStudentModal">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm btn_detials" id="" data-toggle="modal" data-target="#DetailsStudentsModal">التفاصيل</button> </td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                        </tr>
                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#MessageApprovementDeleteModal">حذف  <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#EditeStudentModal">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm btn_detials" id="" data-toggle="modal" data-target="#DetailsStudentsModal">التفاصيل</button> </td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                        </tr>
                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#MessageApprovementDeleteModal">حذف  <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#EditeStudentModal">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm btn_detials" id="" data-toggle="modal" data-target="#DetailsStudentsModal">التفاصيل</button> </td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>



    <!-- The ModalUploadeFile -->
<div class="modal fade" id="UploadeFileModal">
    <div class="modal-dialog">
        <div class="modal-content UploadeFileModal" id="modal-content2" style="height: 250px;">

            <!-- Modal Header -->
            <div class="modal-header UploadeFileModal" id="modheader">
                رفع الدرجات
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" style="display: block;">
                    <div class="form-group">
                        <!-- <label for="usr">Name:</label> -->

                        <input type="file" class="form-control-file border" id="file" name="file" style="height: 30px; margin-top:8px">
                    </div>
                    <!-- <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div> -->
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



<!-- The ModalddaStudents -->
<div class="modal fade" id="AddaStudentModal">
    <div class="modal-dialog">
        <div class="modal-content addacademic" id="modal-content" style="background-color: #F6F7FA; height: 550px;">

            <!-- Modal Header -->
            <div class="modal-header addacademic" id="modheader">
                إضافة طالب
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="/action_page.php" style="display: block;">
                    <div class="form-group">

                        <img src="{{Vite::image("profile.png")}}"   class="user_profile_modal" width="" >

                        <!-- <label for="usr">Name:</label> -->
                        <input type="text" class="form-control" id="inputtext" name="projectname" placeholder=" الاسم " style="height: 30px; margin-top:8px">
                        <input type="date" class="form-control" id="inputtext" name="date" placeholder="تاريخ الميلاد" style="height: 30px; margin-top:8px">
                        <!-- <textarea style="height: 100px;" class="form-control" rows="5" id="comment" placeholder="  التلفون" style=" margin-top:8px"></textarea> -->
                        <div class="dropdown">
                            <button type="button" class="btn btn-light gendar dropdown-toggle"  data-toggle="dropdown">
                                <div class="textdropdown">  الجندر</div>
                            </button>
                            <div  class="dropdown-menu" style=" color: #0E70F2; ">
                                <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   ذكر </a>
                                <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   انثى</a>
                            </div>
                        </div>

                        <div class="dropdown">
                                    <button type="button" class="btn btn-light deparment_names_dropdown dropdown-toggle"  data-toggle="dropdown" >
                                        <div class="textdropdown">   القسم</div>
                                    </button>
                                    <div  class="dropdown-menu" style=" color: #0E70F2; ">
                                        <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">    تكنولوجيا المعلومات </a>
                                        <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   نظم المعلومات </a>
                                        <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   علوم الحاسوب</a>
                                        <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   الامن السيبراني</a>
                                        <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">    الجرافيك</a>
                                        <!-- <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">    الذكاء الصناعي</a>
                                        <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">      تحليل البيانات</a> -->
                                    </div>
                                    </div>
                        <div class="dropdown">
                            <button type="button" class="btn btn-light typeSysrtem_studying_dropdown dropdown-toggle"  data-toggle="dropdown">
                                <div class="textdropdown">  النظام</div>
                            </button>
                            <div  class="dropdown-menu" style=" color: #0E70F2; ">
                                <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   عام </a>
                                <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   موازي</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button type="button" class="btn btn-light Students_typeStatus_dropdown dropdown-toggle"  data-toggle="dropdown">
                                <div class="textdropdown">  الحالة</div>
                            </button>
                            <div  class="dropdown-menu" style=" color: #0E70F2; ">
                                <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   مستجد </a>
                                <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   مستجد</a>
                            </div>
                        </div>
                        <input type="date" class="form-control" id="inputtext" name="phone" placeholder="تاريخ الإلتحاق  " style="height: 30px; margin-top:8px; color:black;">
                        <input type="text" class="form-control" id="inputtext" name="email" placeholder="الايمل الجامعي" style="height: 30px; margin-top:8px">
                        <input type="data" class="form-control" id="inputtext" name="phone" placeholder="التلفون  " style="height: 30px; margin-top:8px; color:black;">
                        <input type="password" class="form-control" id="inputtext" name="email" placeholder=" كلمة المرور " style="height: 30px; margin-top:8px">
                        <!-- <input type="password" class="form-control" id="inputtext" name="phone" placeholder="تأكيد كلمة المرر  " style="height: 30px; margin-top:8px; color:black;"> -->

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


<!-- The ModalEditeStudents -->
<div class="modal fade" id="EditeStudentModal">
    <div class="modal-dialog">
        <div class="modal-content addacademic" id="modal-content" style="background-color: #F6F7FA; height: 550px;">

            <!-- Modal Header -->
            <div class="modal-header addacademic" id="modheader">
                تعديل طالب
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="/action_page.php" style="display: block;">
                    <div class="form-group">

                        <img src="{{Vite::image("profile.png")}}"  width="" class="user_profile_modal" >

                        <!-- <label for="usr">Name:</label> -->
                        <input type="text" class="form-control" id="inputtext" name="projectname" placeholder=" الاسم " style="height: 30px; margin-top:8px">
                        <input type="date" class="form-control" id="inputtext" name="date" placeholder="تاريخ الميلاد" style="height: 30px; margin-top:8px">
                        <!-- <textarea style="height: 100px;" class="form-control" rows="5" id="comment" placeholder="  التلفون" style=" margin-top:8px"></textarea> -->
                        <div class="dropdown">
                            <button type="button" class="btn btn-light gendar dropdown-toggle"  data-toggle="dropdown">
                                <div class="textdropdown">  الجندر</div>
                            </button>
                            <div  class="dropdown-menu" style=" color: #0E70F2; ">
                                <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   ذكر </a>
                                <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   انثى</a>
                            </div>
                        </div>

                        <div class="dropdown">
                                    <button type="button" class="btn btn-light deparment_names_dropdown dropdown-toggle"  data-toggle="dropdown" >
                                        <div class="textdropdown">   القسم</div>
                                    </button>
                                    <div  class="dropdown-menu" style=" color: #0E70F2; ">
                                        <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">    تكنولوجيا المعلومات </a>
                                        <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   نظم المعلومات </a>
                                        <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   علوم الحاسوب</a>
                                        <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   الامن السيبراني</a>
                                        <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">    الجرافيك</a>
                                        <!-- <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">    الذكاء الصناعي</a>
                                        <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">      تحليل البيانات</a> -->
                                    </div>
                                    </div>
                        <div class="dropdown">
                            <button type="button" class="btn btn-light typeSysrtem_studying_dropdown dropdown-toggle"  data-toggle="dropdown">
                                <div class="textdropdown">  النظام</div>
                            </button>
                            <div  class="dropdown-menu" style=" color: #0E70F2; ">
                                <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   عام </a>
                                <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   موازي</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button type="button" class="btn btn-light Students_typeStatus_dropdown dropdown-toggle"  data-toggle="dropdown">
                                <div class="textdropdown">  الحالة</div>
                            </button>
                            <div  class="dropdown-menu" style=" color: #0E70F2; ">
                                <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   مستجد </a>
                                <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   مستجد</a>
                            </div>
                        </div>
                        <input type="date" class="form-control" id="inputtext" name="phone" placeholder="تاريخ الإلتحاق  " style="height: 30px; margin-top:8px; color:black;">
                        <input type="text" class="form-control" id="inputtext" name="email" placeholder="   الايمل الجامعي" style="height: 30px; margin-top:8px">
                        <input type="data" class="form-control" id="inputtext" name="phone" placeholder="التلفون  " style="height: 30px; margin-top:8px; color:black;">
                        <input type="password" class="form-control" id="inputtext" name="email" placeholder=" كلمة المرور " style="height: 30px; margin-top:8px">
                        <!-- <input type="password" class="form-control" id="inputtext" name="phone" placeholder="تأكيد كلمة المرر  " style="height: 30px; margin-top:8px; color:black;"> -->
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

<!-- The ModalDetailsStudents -->
<div class="modal fade" id="DetailsStudentsModal">
    <div class="modal-dialog">
        <div class="modal-content ModaldDetailsAcademic" id="modal-content" style="background-color: #F6F7FA; height:800px;">

            <!-- Modal Header -->
            <div class="modal-header ModaldDetailsAcademic" id="modheader">
                التفاصيل
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body ModaldDetailsAcademic">
                <form action="/action_page.php" style="display: block;">
                    <div class="form-group">

                        <img src="{{Vite::image("profile.png")}}"  width="" class="user_profile_modal" >

                        <div class="table-responsive ">
                            <table class="table details-academic " style="width:100%;" dir="rtl">
                                        <tr class="table-light" id="modldetials">
                                            <th style=" width:25%; "> الرقم الأكاديمي</th>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-light " id="modldetials">
                                            <th style=" width:25%; "> اسم الطالب</th>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;"> تاريخ الميلاد</th>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;" > نوع الجندر</th>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;"> القسم</th>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;"> النظام</th>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;"> الحالة</th>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;"> تاريخ الإلتحاق</th>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;"> الإيمل الجامعي </th>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;">التلفون </th>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;">كلمة المرور  </th>
                                            <td>**********</td>
                                        </tr>
                            </table>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->

            <div class="modal-footer ModaldDetailsAcademic">
                <!--<button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="">حفظ</button>
                <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button> -->
            </div>
        </div>
    </div>
</div>


 <!-- The ModalMessageApprovementDelete -->
 <div class="modal fade" id="MessageApprovementDeleteModal">
    <div class="modal-dialog">
        <div class="modal-content UploadeFileModal" id="modal-content2" style="height: 190px;">

            <!-- Modal Header -->
            <div class="modal-header modal_header_delete" id="modheader" style="height:40px; background-color:#F6F7FA ;color: rgb(67, 111, 206);">
                تأكيد الحذف
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            </div>

            <!-- Modal body -->
            <div class="modal-body" style="text-align: center;">
                <form action="" style="display: block;">
                    <div class="form-group">
                        <!-- <label for="usr">Name:</label> -->
                    <label  for="">هل تريد حذف الطالب بالفعل!</label>
                    </div>
                    <!-- <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div> -->
                </form>
            </div>

            <!-- Modal footer -->

            <div class="modal-footer" style="">
                <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" style="height: 30p; width: 80px; font: size 12px; bottom:0px;">نعم</button>
                <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="" style="height: 30px; width: 80px; font: size 12px;">لا</button>
            </div>
        </div>
    </div>
</div>
</div>
