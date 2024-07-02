@section('nav')
@livewire('components.nav.admin.students-grades-header')
@endsection
<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="container" style="padding-top: 30px;">

        <div class="table-responsive-xl">
            <table class="table" style=" width:100%;">
                <thead class="table-header" style="font-size: 12px;">
                    <tr class="table-light" id="modldetials">
                        <th>تعديل</th>
                        <th>عرض</th>
                        <th>التقدير</th>
                        <th>المعدل</th>
                        <th>المجموع</th>
                        <th>الرسوب </th>
                        <th>اخلاقيات الحاسوب</th>
                        <th>إدارة صيانة أنظمة</th>
                        <th>شبكات لاسلكية </th>
                        <th>النظام </th>
                        <th>اسم الطالب</th>
                        <th>الرقم الأكاديمي </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-light" id="modldetials" style="margin-top:7px;">
                        <td><button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModalEdite">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModalDisplay">عرض</button> </td>
                        <td>*******</td>
                        <td>*****</td>
                        <td> ****</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>******</td>
                        <td> ******</td>
                        <td>*******</td>
                        <td>احمد الوجيه</td>
                        <td>2164093</td>
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
    



    <!-- The ModalDisplaydata -->
    <div class="modal fade" id="myModalDisplay">
        <div class="modal-dialog modal-lg">
            <div class="modal-content modal_content_css" id="modal-content" >

                <!-- Modal Header -->
                <div class="modal-header modal_header_css" id="modheader" style="text-align: center;">
                    <!-- &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  -->
                    بيان الدرجات<button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body modal_body_css">
                    <form action="/action_page.php" style="display: block;">
                        <div class="form-group">
                            <label for="usr" style="font-size: 14px;">الرقم الأكاديمي: 21164093</label>
                            <br> <label for="usr" style="font-size: 14px;">الاسم: احمدالوجيه</label>
                            <br> <label for="usr" style="font-size: 14px;">النظام: الموازي</label>


                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="table-header" style="font-size: 11px;">
                                        <tr class="table-primary" id="modldetials">
                                            <th>ملاحظة</th>
                                            <th>التقدير</th>
                                            <th>المعدل</th>
                                            <th>المجموع</th>
                                            <th>الرسوب </th>
                                            <th>اخلاقيات الحاسوب</th>
                                            <th>إدارة صيانة أنظمة</th>
                                            <th>شبكات لاسلكية </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                                            <td>*******</td>
                                            <td>*****</td>
                                            <td> ****</td>
                                            <td>*******</td>
                                            <td>*******</td>
                                            <td>******</td>
                                            <td> ******</td>
                                            <td>*******</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
                    </form>
                </div>

                <!-- Modal footer -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-light" id="print">طباعة  <img src="{{Vite::image("printing.png")}}" id=""  width="15px" ></button>
                </div>
            </div>
        </div>
    </div>

    <!-- The ModalEdite -->
    <div class="modal fade" id="myModalEdite">
        <div class="modal-dialog modal-lg">
            <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA;">

                <!-- Modal Header -->
                <div class=" modal-header modal_header_css" id="modheader">
                    تعديل
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body modal_body_css">
                    <form action="/action_page.php" style="display: block;">
                        <div class="form-group">
                            <label for="usr">الرقم الأكاديمي: 21164093</label>
                            <br> <label for="usr">الاسم: احمدالوجيه</label>
                            <br> <label for="usr">النظام: الموازي</label>


                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="table-header" style="font-size: 12px;">
                                        <tr class="table-light" id="modldetials">
                                            <th colspan="2" style="width:200px">ملاحظة</th>
                                            <th>التقدير</th>
                                            <th>المعدل</th>
                                            <th>المجموع</th>
                                            <th>الرسوب </th>
                                            <th>اخلاقيات الحاسوب</th>
                                            <th>إدارة صيانة أنظمة</th>
                                            <th>شبكات لاسلكية </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                                            <td colspan="2" style="width:200px;"> <input type="text" class="form-control" id="inputtext" name="username" placeholder="" style="height: 30px; margin-top:-6px;width:200px;"></td>
                                            <td> <input type="text" class="form-control" id="inputtext" name="username" placeholder="" style="height: 30px; margin-top:-6px"></td>
                                            <td> <input type="text" class="form-control" id="inputtext" name="username" placeholder="" style="height: 30px; margin-top:-6px"></td>
                                            <td> <input type="text" class="form-control" id="inputtext" name="username" placeholder="" style="height: 30px; margin-top:-6px"></td>
                                            <td> <input type="text" class="form-control" id="inputtext" name="username" placeholder="" style="height: 30px; margin-top:-6px"></td>
                                            <td> <input type="text" class="form-control" id="inputtext" name="username" placeholder="" style="height: 30px; margin-top:-6px"></td>
                                            <td> <input type="text" class="form-control" id="inputtext" name="username" placeholder="" style="height: 30px; margin-top:-6px"></td>
                                            <td> <input type="text" class="form-control" id="inputtext" name="username" placeholder="" style="height: 30px; margin-top:-6px"></td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>

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
