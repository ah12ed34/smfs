@section('nav')
@livewire('components\nav\managerOFdepart.managedepartlevel.final-reasults-students-header')
@endsection
<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

        <div class="container" style="padding-top: 20px;">

            <div class="table-responsive-xl">
                <table class="table" style=" width:100%;">
                    <thead class="table-header" style="font-size: 12px;">
                        <tr class="table-light" id="modldetials">
                            <th> عرض </th>
                            <th> التقدير </th>
                            <th> المعدل </th>
                            <th> المجموع </th>
                            <th> التجارة الالكترونية </th>
                            <th>  التحقيق الرقمي  </th>
                            <th>   نظم موزعة </th>
                            <th> النظام </th>
                            <th>  اسم الطالب</th>
                            <th>   الرقم الأكاديمي</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <!-- <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" data-toggle="modal" data-target="#myModalEdite">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button> </td> -->
                             <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#ModaldDetailsStudents">عرض</button> </td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                        </tr>

                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <!-- <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" data-toggle="modal" data-target="#myModalEdite">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button> </td> -->
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#ModaldDetailsStudents">عرض</button> </td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                        </tr>
                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <!-- <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" data-toggle="modal" data-target="#myModalEdite">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button> </td> -->
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#ModaldDetailsStudents">عرض</button> </td>
                            <td>*******</td>
                            <td>*******</td>
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


<!-- The ModalDetailsStudents -->
<div class="modal fade" id="ModaldDetailsStudents">
    <div class="modal-dialog ">
        <div class="modal-content ModaldDetailsAcademic" id="modal-content" style="background-color: #F6F7FA; height:700px;">

            <!-- Modal Header -->
            <div class="modal-header ModaldDetailsAcademic" id="modheader">
                 التفاصيل
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body ModaldDetailsAcademic">
                <form action="/action_page.php" style="display: block;">
                    <div class="form-group">

                    <img src="{{Vite::image("profile.png")}}"  width="100px" style="margin-left: 45%;  margin-top: -10px; border-radius: 50%;">

                        <div class="table-responsive ">
                            <table class="table details-academic " style="width:100%; margin-top: 5px;" dir="rtl">
                                        <tr class="table-light" id="modldetials">
                                            <th style=" width:25%; "> الرقم الأكاديمي</th>
                                            <td>**********</td>
                                        <tr class="table-light " id="modldetials">
                                            <th style=" width:25%; "> اسم الطالب</th>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;"> النظام</th>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;">   نظم موزعة </th>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;" > التحقيق الرقمي </th>
                                            <td>**********</td>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;"> التجارة الالكترونية </th>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;"> المجموع</th>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;">  المعدل</th>
                                            <td>**********</td>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;">  التقدير </th>
                                            <td>**********</td>
                                        </tr>
                                        <!-- <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;"> </th>
                                            <td>**********</td>
                                        </tr> -->
                            </table>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->

            <div class="modal-footer ModaldDetailsAcademic">
                <!-- <button type="submit" class="btn btn-primary" id="btnsave">حفظ</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel">إلغاء</button> -->
            </div>
        </div>
    </div>
</div>

</div>
