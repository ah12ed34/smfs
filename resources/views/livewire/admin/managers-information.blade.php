@section('nav')
@livewire('components\nav\admin.employees-information-header')
@endsection
<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="container" style="padding-top: 30px;">

        <div class="table-responsive-xl">
            <table class="table" style=" width:100%;">
                <thead class="table-header" style="font-size: 12px;">
                    <tr class="table-light" id="modldetials">
                        <th> حذف </th>
                        <th> تعديل </th>
                        <th> التفاصيل </th>
                        <th> الصلاحية </th>
                        <th> القسم </th>
                        <th>  الدرجة العلمية </th>
                        <th> التلفون </th>
                        <th> الأيمل</th>
                        <th> الجندر </th>
                        <th>  تاريخ الميلاد </th>
                        <th style="width: 15%;">  الاسم </th>
                        <!-- <th>   الرقم الوظيفي</th> -->
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-light" id="modldetials" style="margin-top:7px;">
                        <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#MessageApprovementDeleteModal">حذف  <img src="{{ Vite::image('delete (1).png')}}" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#EditeEmployeesModal">تعديل  <img src="{{ Vite::image('edit.png')}}" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm btn_detials" id="" data-toggle="modal" data-target="#DetailsEmloyeesModal">التفاصيل</button> </td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td style="width: 15%;">*******</td>
                    </tr>
                    <tr class="table-light" id="modldetials" style="margin-top:7px;">
                        <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#MessageApprovementDeleteModal">حذف  <img src="{{ Vite::image('delete (1).png')}}" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#EditeEmployeesModal">تعديل  <img src="{{ Vite::image('edit.png')}}" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm btn_detials" id="" data-toggle="modal" data-target="#DetailsEmloyeesModal">التفاصيل</button> </td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td style="width: 15%;">*******</td>
                    </tr>
                    <tr class="table-light" id="modldetials" style="margin-top:7px;">
                        <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#MessageApprovementDeleteModal">حذف  <img src="{{ Vite::image('delete (1).png')}}" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#EditeEmployeesModal">تعديل  <img src="{{ Vite::image('edit.png')}}" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm btn_detials" id="" data-toggle="modal" data-target="#DetailsEmloyeesModal">التفاصيل</button> </td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td style="width: 15%;">*******</td>
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
            رفع ملف
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



<!-- The ModaladdEmployeer -->
<div class="modal fade" id="AddEmployeerModal">
<div class="modal-dialog">
    <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA; height: 650px;">

        <!-- Modal Header -->
        <div class="modal-header modal_header_css" id="modheader">
            إضافة موظف
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        </div>

        <!-- Modal body -->
        <div class="modal-body modal_body_css">
            <form action="/action_page.php" style="display: block;">
                <div class="form-group">

                    <img src="{{ Vite::image('profile.png')}}"  width="" class="user_profile_modal" >

                    <!-- <input type="number" class="form-control" id="inputtext" name="projectname" placeholder=" الرقم الوظيفي " style="height: 30px; margin-top:8px"> -->
                    <input type="text" class="form-control" id="inputtext" name="date" placeholder=" الاسم" style="height: 30px; margin-top:8px">
                    <input type="date" class="form-control" id="inputtext" name="date" placeholder=" تاريح الميلاد" style="height: 30px; margin-top:8px">

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
                                    <div class="textdropdown">   الدرجةالعلمية</div>
                            </button>
                        <div  class="dropdown-menu" style=" color: #0E70F2; ">
                            <a id="" class="dropdown-item" href="#" style="padding-left:30px;">   دكتور</a>
                            <a id="" class="dropdown-item" href="#" style="padding-left:30px;">    استاذ </a>
                            <a id="" class="dropdown-item" href="#" style="padding-left:30px;">    استاذ مشارك</a>
                            <a id="" class="dropdown-item" href="#"style="padding-left:30px;">    استاذ مساعد </a>
                            <a id="" class="dropdown-item" href="#"style="padding-left:30px;">    معيد </a>
                            </div>
                    </div>
                                <select class="form-control selectOption" id="sel1" name="sellist1" placeholder="القسم" style="height: 30px; margin-top:8px">
                                    <option>القسم</option>
                                    <option>  تكنولوجيا المعلومات </option>
                                    <option>  نظم المعلومات </option>
                                    <option>  علوم الحاسوب </option>
                                    <option>  الامن السيبراني </option>
                                    <option>  الجرافيك </option>
                                    <option>  الذكاء الصناعي </option>
                                    <option>  تحليل البيانات </option>
                                </select>

                            <select class="form-control selectOption" id="sel1" name="sellist1" style="height: 30px; margin-top:8px">
                                    <option>الصلاحية</option>
                                    <option>عميد الكلية</option>
                                    <option>نائب العميد لشؤون الطللاب</option>
                                    <option>امين الكلية</option>
                                    <option>مدير قسم تكنولوجيا المعلومات</option>
                                    <option>مدير قسم نظم المعلومات</option>
                                    <option>مدير قسم علوم الحاسوب</option>
                                    <option>مدير قسم الامن السيبراني</option>
                                    <option>مدير قسم الجرافيك</option>
                                    <option>رئيس الكنترول</option>
                                    <option>مدير شؤون الطلاب</option>
                                    <option>مدير الجودة</option>
                        <!-- <option>مدير قسم الذكاء الصناعي</option>
                        <option>مدير قسم تحليل البيانات</option> -->

                    </select>

                                <input type="text" class="form-control" id="inputtext" name="email" placeholder="الايمل الجامعي" style="height: 30px; margin-top:8px">
                                <input type="data" class="form-control" id="inputtext" name="phone" placeholder="التلفون  " style="height: 30px; margin-top:8px; color:black;">
                                <input type="password" class="form-control" id="inputtext" name="email" placeholder="  كلمة المرور الجديدة" style="height: 30px; margin-top:8px">
                                <input type="password" class="form-control" id="inputtext" name="phone" placeholder="تأكيد كلمة المرر  " style="height: 30px; margin-top:8px; color:black;">
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


<!-- The ModalEditeEmployees -->
<div class="modal fade" id="EditeEmployeesModal">
<div class="modal-dialog">
    <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA; height: 650px;">

        <!-- Modal Header -->
        <div class="modal-header modal_header_css" id="modheader">
            تعديل موظف
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        </div>

        <!-- Modal body -->
        <div class="modal-body modal_body_css">
            <form action="/action_page.php" style="display: block;">
                <div class="form-group">

                    <img src="{{ Vite::image('profile.png')}}"  width="" class="user_profile_modal" >

                    <!-- <input type="number" class="form-control" id="inputtext" name="projectname" placeholder=" الرقم الوظيفي " style="height: 30px; margin-top:8px"> -->
                    <input type="text" class="form-control" id="inputtext" name="date" placeholder=" الاسم" style="height: 30px; margin-top:8px">
                    <input type="date" class="form-control" id="inputtext" name="date" placeholder=" تاريح الميلاد" style="height: 30px; margin-top:8px">

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
                                    <div class="textdropdown">   الدرجةالعلمية</div>
                            </button>
                        <div  class="dropdown-menu" style=" color: #0E70F2; ">
                            <a id="" class="dropdown-item" href="#" style="padding-left:30px;">   دكتور</a>
                            <a id="" class="dropdown-item" href="#" style="padding-left:30px;">    استاذ </a>
                            <a id="" class="dropdown-item" href="#" style="padding-left:30px;">    استاذ مشارك</a>
                            <a id="" class="dropdown-item" href="#"style="padding-left:30px;">    استاذ مساعد </a>
                            <a id="" class="dropdown-item" href="#"style="padding-left:30px;">    معيد </a>
                        </div>
                    </div>
                                <select class="form-control selectOption" id="sel1" name="sellist1" placeholder="القسم" style="height: 30px; margin-top:8px">
                                    <option>القسم</option>
                                    <option>  تكنولوجيا المعلومات </option>
                                    <option>  نظم المعلومات </option>
                                    <option>  علوم الحاسوب </option>
                                    <option>  الامن السيبراني </option>
                                    <option>  الجرافيك </option>
                                    <option>  الذكاء الصناعي </option>
                                    <option>  تحليل البيانات </option>
                                </select>

                            <select class="form-control selectOption" id="sel1" name="sellist1" style="height: 30px; margin-top:8px">
                                    <option>الصلاحية</option>
                                    <option>عميد الكلية</option>
                                    <option>نائب العميد لشؤون الطللاب</option>
                                    <option>امين الكلية</option>
                                    <option>مدير قسم تكنولوجيا المعلومات</option>
                                    <option>مدير قسم نظم المعلومات</option>
                                    <option>مدير قسم علوم الحاسوب</option>
                                    <option>مدير قسم الامن السيبراني</option>
                                    <option>مدير قسم الجرافيك</option>
                                    <option>رئيس الكنترول</option>
                                    <option>مدير شؤون الطلاب</option>
                                    <option>مدير الجودة</option>
                        <!-- <option>مدير قسم الذكاء الصناعي</option>
                        <option>مدير قسم تحليل البيانات</option> -->

                    </select>



                                <input type="text" class="form-control" id="inputtext" name="email" placeholder="الايمل الجامعي" style="height: 30px; margin-top:8px">
                                <input type="data" class="form-control" id="inputtext" name="phone" placeholder="التلفون  " style="height: 30px; margin-top:8px; color:black;">
                                <input type="password" class="form-control" id="inputtext" name="email" placeholder="  كلمة المرور الجديدة" style="height: 30px; margin-top:8px">
                                <input type="password" class="form-control" id="inputtext" name="phone" placeholder="تأكيد كلمة المرر  " style="height: 30px; margin-top:8px; color:black;">
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

<!-- The DetailsEmloyeesModal -->
<div class="modal fade" id="DetailsEmloyeesModal">
<div class="modal-dialog">
    <div class="modal-content ModaldDetailsAcademic" id="modal-content" style="background-color: #F6F7FA; height:660px;">

        <!-- Modal Header -->
        <div class="modal-header ModaldDetailsAcademic" id="modheader">
            التفاصيل
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body ModaldDetailsAcademic">
            <form action="/action_page.php" style="display: block;">
                <div class="form-group">

                    <img src="{{ Vite::image('profile.png')}}"  width="" class="user_profile_modal" >

                    <div class="table-responsive ">
                        <table class="table details-academic " style="width:100%;" dir="rtl">

                                    <tr class="table-primary" id="modldetials">
                                        <th style=" width:25%; ">  الاسم</th>
                                        <th style="width: 25%;"> تاريخ الميلاد</th>
                                    </tr>
                                    <tr class="table-light " id="modldetials">
                                        <td>**********</td>
                                        <td>**********</td>
                                    </tr>
                                    <tr class="table-primary" id="modldetials">
                                        <th style="width: 25%;" > نوع الجندر</th>
                                        <th style="width: 25%;"> الدرجةالعلمية</th>
                                    </tr>
                                    <tr class="table-light" id="modldetials">
                                        <td>**********</td>
                                        <td>**********</td>
                                    </tr>
                                    <tr class="table-primary" id="modldetials">
                                        <th style="width: 25%;"> القسم</th>
                                        <th style="width: 25%;"> الصلاحية</th>
                                    </tr>
                                    <tr class="table-light" id="modldetials">
                                        <td>**********</td>
                                        <td>**********</td>
                                    </tr>
                                    <tr class="table-primary" id="modldetials">
                                        <th style="width: 25%;"> الإيمل الجامعي </th>
                                        <th style="width: 25%;">التلفون </th>
                                    </tr>
                                    <tr class="table-light" id="modldetials">
                                        <td>**********</td>
                                        <td>**********</td>
                                    </tr>
                                    <tr class="table-primary" id="modldetials">
                                        <th colspan="2" style="width: 25%;">كلمة المرور  </th>
                                    </tr>
                                    <tr class="table-light" id="modldetials">
                                        <td colspan="2">**********</td>
                                    </tr>
                                    <!-- <tr class="table-light" id="modldetials">
                                        <th style="width: 25%;">كلمة المرور  </th>
                                        <td>**********</td>
                                    </tr> -->
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
    <div class="modal-content UploadeFileModal" id="modal-content2" style="height: 170px;">

        <!-- Modal Header -->
        <div class="modal-header " id="modheader" style="height:40px; background-color:#F6F7FA ;color: rgb(67, 111, 206);">
            تأكيد الحذف
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        </div>

        <!-- Modal body -->
        <div class="modal-body" style="text-align: center;">
            <form action="" style="display: block;">
                <div class="form-group">
                    <!-- <label for="usr">Name:</label> -->
                <label  for="">هل تريد حذف المستخدم بالفعل!</label>
                </div>
                <!-- <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
            </form>
        </div>

        <!-- Modal footer -->

        <div class="modal-footer" >
            <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" style="height: 30p; width: 80px; font: size 12px;">نعم</button>
            <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="" style="height: 30p; width: 80px; font: size 12px;">لا</button>
        </div>
    </div>
</div>
</div>


</div>
