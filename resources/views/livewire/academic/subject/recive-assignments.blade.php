    @section('nav')
        @livewire('components.nav.academic.subject.recive-assignments'
        ,['group_subject'=>$group_subject])
    @endSection
<div>

    <div class="responsive"></div>
    <div class="container" id="container-project" style="  padding-top: 30px;" >


        <div class="table-responsive-xl">
            <table class="table" id="table" style=" margin-right: -30px; " >
                <thead class="table-header" style="font-size: 12px;">
                    <tr class="table-light" id="modldetials">
                        <th>تصحيح التكليف </th>
                        <th>ملاحظة المدرس</th>
                        <th>الدرجة</th>
                        <th>الملف</th>
                        <th> حالة التسليم</th>
                        <th>تاريخ التسليم</th>
                        <th> اسم الطالب</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-light" id="modldetials" style="margin-top:7px;">
                        <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#ModaldCheckAssignmentsStudents">تصحيح التكليف</button> </td>
                        <td>*******</td>
                        <td style="width: 15%;"><input type="text" class="form-control input_gradeAssingnments" name="gradeAssingnments" ></td>
                        <td> ***</td>
                        <td>*******</td>
                        <td>***** </td>
                        <td>SFMS</td>
                    </tr>
                    <tr class="table-light">
                        <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#ModaldCheckAssignmentsStudents">تصحيح التكليف</button> </td>
                        <td>*******</td>
                        <td><input type="text" class="form-control input_gradeAssingnments" name="gradeAssingnments"></td>
                        <td> ***</td>
                        <td>*******</td>
                        <td>***** </td>
                        <td>SFMS</td>
                    </tr>
                    <tr class="table-light">
                        <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#ModaldCheckAssignmentsStudents">تصحيح التكليف</button> </td>
                        <td>*******</td>
                        <td><input type="text" class="form-control input_gradeAssingnments" name="gradeAssingnments"></td>
                        <td> ***</td>
                        <td>*******</td>
                        <td>***** </td>
                        <td>SFMS</td>
                    </tr>
                    <tr class="table-light">
                        <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#ModaldCheckAssignmentsStudents">تصحيح التكليف</button> </td>
                        <td>*******</td>
                        <td><input type="text" class="form-control input_gradeAssingnments" name="gradeAssingnments"></td>
                        <td> ***</td>
                        <td>*******</td>
                        <td>***** </td>
                        <td>SFMS</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <!-- The ModalDetailsStudents -->
<div class="modal fade" id="ModaldCheckAssignmentsStudents">
    <div class="modal-dialog ">
        <div class="modal-content ModaldDetailsAcademic" id="modal-content" style="background-color: #F6F7FA; height:600px;">

            <!-- Modal Header -->
            <div class="modal-header ModaldDetailsAcademic" id="modheader">
                 التفاصيل
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body ModaldDetailsAcademic">
                <form action="/action_page.php" style="display: block;">
                    <div class="form-group">
                        <div class="table-responsive ">
                            <table class="table details-academic " style="width:100%;;" dir="rtl">
                                        <tr class="table-light" id="modldetials">
                                            <th style=" width:25%; "> الرقم الأكاديمي</th>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-light " id="modldetials">
                                            <th style=" width:25%; "> اسم الطالب</th>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;"> المجموعة</th>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;">  تاريخ التسليم </th>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;" >  حالة التسليم </th>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;">  الملف</th>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;"> ملاحظة الطالب</th>
                                            <td>**********</td>
                                        </tr>

                            </table>
                        </div>

                        <div class="table-responsive ">
                            <table class="table details-academic " style="width:100%; margin-top:10px;" dir="rtl">
                                        {{-- <tr  id="modldetials">
                                            <th colspan="2" > التصحيح </th>
                                        </tr> --}}
                                        <tr  id="modldetials">
                                            <th style=" width:25%; "> الدرجة </th>
                                            <td> <input class="form-control" type="data" ></td>
                                        </tr>
                                        <tr  id="modldetials">
                                            <th style="width: 25%;">  ملاحظة المدرس</th>
                                            <td><textarea class="form-control" name="note" id="" cols="20" rows="4" style="height: 100%"></textarea></td>
                                        </tr>

                            </table>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->

            <div class="modal-footer" style="">
               <button type="submit" class="btn btn-primary" id="btnsave">حفظ</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel">إلغاء</button>
            </div>
        </div>
    </div>
</div>
</div>

