@section('nav')
@livewire('components.nav.admin.permission-pages-header')
@endsection
<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="container" style="padding-top:20px;">
        <div class="table-responsive">
            <table class="table table-bordered" style="font-size:10px;">
                <thead class="table-header">
                    <tr class="table-light" id="modldetials">
                        <th id="th1" colspan="3" style="background-color: #0E70F2; color:white; padding-bottom:25px;">  الطلاب</th>
                        <th id="th1" colspan="3" style="background-color: #0E70F2; color:white; padding-bottom:25px;">  مساعدعضو هيئة التدريس</th>
                        <th id="th1" colspan="3" style="background-color: #0E70F2; color:white; padding-bottom:25px;">عضو هيئة التدريس</th>
                        <th id="th1" colspan="3" style="background-color: #0E70F2; color:white;padding-bottom:25px;">رئيس القسم</th>
                        <th id="th1"  rowspan="2" style="background-color: #0E70F2; color:white;padding-bottom:25px;">نوع الأجراء </th>
                        <!-- <th id="th1" colspan="3" rowspan="3" style="background-color: #0E70F2; color:white; padding: 50px;">
                            اسم الطالب
                        </th>
                        <th colspan="3" rowspan="3" style="background-color: #0E70F2; color:white; width: 200px; padding:40px;">الرقم الأكاديمي</th> -->

                    </tr>



                    <tr class="table-light">

                        <!-- <td style="background-color: #0E70F2; color:white;">حذف</td>
                        <td style="background-color: #0E70F2; color:white;">تعديل</td>
                        <td style="background-color: #0E70F2; color:white;">اضافة</td> -->
                        <td style="background-color: #0E70F2; color:white;">حذف</td>
                        <td style="background-color: #0E70F2; color:white;">تعديل</td>
                        <td style="background-color: #0E70F2; color:white;">اضافة</td>
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

                    <!--  صلاجيات الإشعارات< -->
                    <tr class="table-light">
                        <!--   صلاجيات المقرر الدراسي النظري< -->
                        <!--  النظري< -->
                        <td>
                            <form action="">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1-stybooks-THY-del" name="example">
                                    <label class="custom-control-label" for="switch1-stybooks-THY-del"></label>
                                </div>
                            </form>
                        </td>
                        <td>
                            <form action="">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1-stybooks-THY-edit" name="example">
                                    <label class="custom-control-label" for="switch1-stybooks-THY-edit"></label>
                                </div>
                            </form>
                        </td>
                        <td>
                            <form action="">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1-stybooks-THY-add" name="example">
                                    <label class="custom-control-label" for="switch1-stybooks-THY-add"></label>
                                </div>
                            </form>
                        </td>
                        <!--   صلاجيات المقرر الدراسي العملي< -->

                        <td>
                            <form action="">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1-stybooks-PT-del" name="example">
                                    <label class="custom-control-label" for="switch1-stybooks-PT-del"></label>
                                </div>
                            </form>
                        </td>
                        <td>
                            <form action="">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1-stybooks-PT-edit" name="example">
                                    <label class="custom-control-label" for="switch1-stybooks-PT-edit"></label>
                                </div>
                            </form>
                        </td>
                        <td>
                            <form action="">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1-stybooks-PT-add" name="example">
                                    <label class="custom-control-label" for="switch1-stybooks-PT-add"></label>
                                </div>
                            </form>
                        </td>
                        <!--  صلاجيات التكاليف< -->
                        <td>
                            <form action="">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1-assigne-del" name="example">
                                    <label class="custom-control-label" for="switch1-assigne-del"></label>
                                </div>
                            </form>
                        </td>
                        <td>
                            <form action="">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1-assigne-edit" name="example">
                                    <label class="custom-control-label" for="switch1-assigne-edit"></label>
                                </div>
                            </form>
                        </td>
                        <td>
                            <form action="">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1-assigne-add" name="example">
                                    <label class="custom-control-label" for="switch1-assigne-add"></label>
                                </div>
                            </form>
                        </td>
                        <!--  صلاجيات المشاريع< -->
                        <td>
                            <form action="">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1-proj-del" name="example">
                                    <label class="custom-control-label" for="switch1-proj-del"></label>
                                </div>
                            </form>
                        </td>
                        <td>
                            <form action="">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1-proj-edit" name="example">
                                    <label class="custom-control-label" for="switch1-proj-edit"></label>
                                </div>
                            </form>
                        </td>
                        <td>
                            <form action="">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1-proj-add" name="example">
                                    <label class="custom-control-label" for="switch1-proj-add"></label>
                                </div>
                            </form>
                        </td>
                        <td colspan="3"> *********</td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>


<!-- The ModaladdUserPermissions -->
<div class="modal fade" id="addPermissions">
<div class="modal-dialog">
    <div class="modal-content modal_content_css" id="modal-content" style="width: 300px;height:300px">

        <!-- Modal Header -->
        <div class="modal-header modal_header_css" id="modheader">
                إضافة  صلاحية إجراء
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
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
