@section('nav')
@livewire('components\nav\admin.add-premission-user-header')
@endsection
<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="container" style="padding-top:20px;">
        <div class="table-responsive">
            <table class="table table-bordered" style="font-size:10px;">
                <thead class="table-header">
                    <tr class="table-light" id="modldetials">
                        <th id="th1" colspan="2" rowspan="2" style="background-color: #0E70F2; color:white; padding-bottom:25px;">  الإشعارات</th>
                        <th id="th1"  rowspan="3"  style="background-color: #0E70F2; color:white; padding-bottom:25px;">    رفع الدرجات النهائية</th>
                        <th id="th1" colspan="6" style="background-color: #0E70F2; color:white; padding-bottom:25px;">  المجموعات</th>
                        <th id="th1" colspan="3" rowspan="2" style="background-color: #0E70F2; color:white;padding-bottom:25px;"> الجدول االدراسي</th>
                        <th id="th1"  colspan="3" rowspan="3" style="background-color: #0E70F2; color:white;padding-bottom:25px;"> اسم المستخدم </th>
                        <th id="th1"  rowspan="3" style="background-color: #0E70F2; color:white;padding-bottom:25px;"> الرقم </th>
                        <!-- <th id="th1" colspan="3" rowspan="3" style="background-color: #0E70F2; color:white; padding: 50px;">
                            اسم الطالب
                        </th>
                        <th colspan="3" rowspan="3" style="background-color: #0E70F2; color:white; width: 200px; padding:40px;">الرقم الأكاديمي</th> -->

                    </tr>

                    <tr class="table-light">

                        <th colspan="3" style="background-color: #0E70F2; color:white;">عملي</th>
                        <th colspan="3" style="background-color: #0E70F2; color:white;">نظري</th>
                    </tr>

                    <tr class="table-light">

                        <!-- <td style="background-color: #0E70F2; color:white;">حذف</td>
                        <td style="background-color: #0E70F2; color:white;">تعديل</td>
                        <td style="background-color: #0E70F2; color:white;">اضافة</td> -->
                        <!-- <td style="background-color: #0E70F2; color:white;">حذف</td> -->
                        <td style="background-color: #0E70F2; color:white;">حسب المستوى</td>
                        <td style="background-color: #0E70F2; color:white;">حسب المادة</td>
                        <td style="background-color: #0E70F2; color:white;">حذف</td>
                        <td style="background-color: #0E70F2; color:white;">تعديل</td>
                        <td style="background-color: #0E70F2; color:white;">اضافة</td>
                        <td style="background-color: #0E70F2; color:white;">حذف</td>
                        <td style="background-color: #0E70F2; color:white;">تعديل</td>
                        <td style="background-color: #0E70F2; color:white;">اضافة</td>
                        <td style="background-color: #0E70F2; color:white;">حذف</td>
                        <td style="background-color: #0E70F2; color:white;">تعديل</td>
                        <td style="background-color: #0E70F2; color:white;">اضافة</td>
                    </tr>

                </thead>


                <tbody>

                    <tr class="table-light">
                <!--  صلاجيات الإشعارات< -->

                        <td>
                            <form action="">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1-sendaboutLevel" name="example">
                                    <label class="custom-control-label" for="switch1-sendaboutLevel"></label>
                                </div>
                            </form>
                        </td>
                        <td>
                            <form action="">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1-sendaboutSubject" name="example">
                                    <label class="custom-control-label" for="switch1-sendaboutSubject"></label>
                                </div>
                            </form>
                        </td>
                        <!--   صلاحيات   رفع الدرجات النهائية< -->

                        <td>
                            <form action="">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1-uploadegrades" name="example">
                                    <label class="custom-control-label" for="switch1-uploadegrades"></label>
                                </div>
                            </form>
                        </td>
                        <!--   صلاجيات المجموعات  العملي< -->

                        <td>
                            <form action="">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1-Practicallgroup-del" name="example">
                                    <label class="custom-control-label" for="switch1-Practicallgroup-del"></label>
                                </div>
                            </form>
                        </td>
                        <td>
                            <form action="">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1-Practicallgroup-edit" name="example">
                                    <label class="custom-control-label" for="switch1-Practicallgroup-edit"></label>
                                </div>
                            </form>
                        </td>
                        <td>
                            <form action="">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1-Practicallgroup-add" name="example">
                                    <label class="custom-control-label" for="switch1-Practicallgroup-add"></label>
                                </div>
                            </form>
                        </td>
                        <!--  صلاجيات المجموعات نظري< -->
                        <td>
                            <form action="">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1-generalgroup-del" name="example">
                                    <label class="custom-control-label" for="switch1-generalgroup-del"></label>
                                </div>
                            </form>
                        </td>
                        <td>
                            <form action="">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1-generalgroup-edit" name="example">
                                    <label class="custom-control-label" for="switch1-generalgroup-edit"></label>
                                </div>
                            </form>
                        </td>
                        <td>
                            <form action="">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1-generalgroup-add" name="example">
                                    <label class="custom-control-label" for="switch1-generalgroup-add"></label>
                                </div>
                            </form>
                        </td>
                        <!--  صلاجيات الجدول الدراسي< -->
                        <td>
                            <form action="">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1-sheduleStudy-del" name="example">
                                    <label class="custom-control-label" for="switch1-sheduleStudy-del"></label>
                                </div>
                            </form>
                        </td>
                        <td>
                            <form action="">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1-sheduleStudy-edit" name="example">
                                    <label class="custom-control-label" for="switch1-sheduleStudy-edit"></label>
                                </div>
                            </form>
                        </td>
                        <td>
                            <form action="">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1-sheduleStudy-add" name="example">
                                    <label class="custom-control-label" for="switch1-sheduleStudy-add"></label>
                                </div>
                            </form>
                        </td>
                        <td colspan="3"> *********</td>
                        <td> **</td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>


<!-- The ModaladdUserPermissions -->
<div class="modal fade" id="addUserPermissions">
<div class="modal-dialog">
    <div class="modal-content modal_content_css" id="modal-content" style="width: 300px;height:300px">

        <!-- Modal Header -->
        <div class="modal-header modal_header_css" id="modheader">
            إضافة صلاحية مستخدم
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body modal_body_css">
            <form action="" style="display: block;">
                <div class="form-group">
                    <!-- <label for="usr">Name:</label> -->

                    <input type="text" class="form-control" id="inputtext" name="adduserName" style="height: 30px; margin-top:8px">
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

</div>
