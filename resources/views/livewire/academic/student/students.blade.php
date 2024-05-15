<div>
    <div class="responsive"></div>


    <div class="container" id="container-project" style="  padding-top: 30px;" >

        <div class="table-responsive-xl">
            <table class="table" style=" width:100%;">
                <thead class="table-header" style="font-size: 12px;">
                    <tr class="table-light" id="modldetials">
                        <th>تعديل</th>
                        <th>عرض</th>
                        <th>ملاحظة</th>
                        <th>التقدير</th>
                        <th>المجموع</th>
                        <th>المشاريع </th>
                        <th>التكاليف</th>
                        <th>النصفي</th>
                        <th>المشاركة </th>
                        <th>الحضور </th>
                        <th>اسم الطالب</th>
                        <th>الرقم الأكاديمي </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student )
                        {{-- @dd($student) --}}
                        {{-- @dd($this->total) --}}
                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModalEdite" wire:click='select({{ $student->user_id }})'>تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModalDisplay" wire:click='select({{ $student->user_id }})' >عرض</button> </td>
                            <td>*******</td>
                            <td>*****</td>
                            <td>{{ $this->getData($student->user_id,'total') }}</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>{{ $this->getData($student->user_id,'helf_exem') }}</td>
                            <td>{{ $this->getData($student->user_id,'addional_grades') }}</td>
                            <td>{{ $this->getData($student->user_id,'persents') }}</td>
                            {{-- <td>{{ $addional_grades[$student->user_id] }}</td>
                            <td>{{  }}
                            <td>{{ $persents[$student->user_id] }}</td> --}}
                            <td>{{ $student->full_name }}</td>
                            <td>{{ $student->user_id }}</td>
                        </tr>
                    @empty
                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <td colspan="12" style="text-align: center;">لا يوجد طلاب</td>
                        </tr>

                    @endforelse



                </tbody>
            </table>
        </div>
    </div>

    <nav >
        {{ $students->links(myapp::viewPagination) }}
    </nav>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content2">

                <!-- Modal Header -->
                <div class="modal-header" id="modheader">
                    رفع الدرجات
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" style="display: block;">
                        <div class="form-group">
                            <!-- <label>Name:</label> -->

                            <input type="file" class="form-control-file border" id="file" name="file" style="height: 30px; margin-top:8px">
                        </div>
                        <!-- <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div> -->
                    </form>
                </div>

                <!-- Modal footer -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btnsave-file" >حفظ</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel-file">إلغاء</button>
                </div>
            </div>
        </div>
    </div>


        <!-- The ModalDisplaydata -->
        <div class="modal fade" id="myModalDisplay" wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="background-color: #F6F7FA;height:30%;" >

                    <!-- Modal Header -->
                    <div class="modal-header" id="modheader" style="text-align: center;">
                        <!-- &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  -->
                        بيان الدرجات<button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <form action="/action_page.php" style="display: block;">
                            <div class="form-group">
                                <label style="font-size: 14px;">الرقم الأكاديمي: {{ $student_selected->user_id ?? ''}}</label>
                                <br> <label style="font-size: 14px;">اسم الطالب: {{ $student_selected->user->full_name ?? '' }}</label>

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="table-header" style="font-size: 11px;">
                                            <tr class="table-primary" id="modldetials">
                                                <th>ملاحظة</th>
                                                <th>التقدير</th>
                                                <th>المجموع</th>
                                                <th>المشاريع </th>
                                                <th>التكاليف</th>
                                                <th>النصفي</th>
                                                <th>المشاركة </th>
                                                <th>الحضور </th>
                                                <th>المادة </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="table-light" id="modldetials" style="margin-top:7px;">
                                                <td>*******</td>
                                                <td>*****</td>
                                                <td>{{ $this->getData($student_selected->user_id??null,'total') }}</td>
                                                <td>*******</td>
                                                <td>*******</td>
                                                <td>{{ $this->getData($student_selected->user_id??null,'helf_exem') }}</td>
                                                <td> ******</td>
                                                <td>{{ $this->getData($student_selected->user_id??null,'persents') }}</td>
                                                <td>{{ $this->group_subject->subject()->name_ar }}</td>

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
                        <button type="submit" class="btn btn-light" id="print">طباعة  <img src="{{Vite::image("printing.png")}}" id=""  width="15px"  ></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- The ModalEdite -->
        <div class="modal fade" id="myModalEdite" wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content"  style="background-color: #F6F7FA;height:40%;">

                    <!-- Modal Header -->
                    <div class=" modal-header" id="modheader" style="padding-left: 47%;">
                        تعديل
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <form style="display: block;">
                            <div class="form-group">
                                <label style="font-size: 14px;">الرقم الأكاديمي: {{ $student_selected->user_id ?? '' }}</label>
                                <br> <label style="font-size: 14px;">اسم الطالب: {{ $student_selected->user->full_name ?? '' }}</label>

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="table-header" style="font-size: 12px;">
                                            <tr class="table-light" id="modldetials">
                                                <th colspan="2" style="width:200px">ملاحظة</th>
                                                <th>التقدير</th>
                                                <th>المجموع</th>
                                                <th>المشاريع </th>
                                                <th>التكاليف</th>
                                                <th>النصفي</th>
                                                <th>المشاركة </th>
                                                <th>الحضور </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="table-light" id="modldetials" style="margin-top:7px;">
                                                <td colspan="2" style="width:200px;"> <input type="text" class="form-control" id="inputtext" name="notes" placeholder="" style="height: 30px; margin-top:-6px;width:200px;box-shadow:none;border:none;"></td>
                                                <td> <input type="text" class="form-control" id="inputtext" name="estimated" placeholder="" style="height: 30px; margin-top:-6px;box-shadow:none;border:none;"></td>
                                                <td> <input type="text" class="form-control" id="inputtext" name="total" placeholder="" style="height: 30px; margin-top:-6px;box-shadow:none;border:none;text-align:center;"></td>
                                                <td> <input type="text" class="form-control" id="inputtext" name="projects" placeholder="" style="height: 30px; margin-top:-6px;box-shadow:none;border:none;text-align:center;"></td>
                                                <td> <input type="text" class="form-control" id="inputtext" name="assignements" placeholder="" style="height: 30px; margin-top:-6px;box-shadow:none;border:none;text-align:center;"></td>
                                                <td> <input type="text" class="form-control" id="inputtext" name="midexam" placeholder="" style="height: 30px; margin-top:-6px;box-shadow:none;border:none;text-align:center;"></td>
                                                <td> <input type="text" class="form-control" id="inputtext" name="working" placeholder="" style="height: 30px; margin-top:-6px;box-shadow:none;border:none;text-align:center;"></td>
                                                <td> <input type="text" class="form-control" id="inputtext" name="persents" placeholder="" style="height: 30px; margin-top:-6px;box-shadow:none;border:none;text-align:center;"></td>

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
                        <button type="submit" class="btn btn-primary" id="bt-edite" >حفظ</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel">إلغاء</button>
                    </div>
                </div>
            </div>
        </div>

    <!-- <img src="{{Vite::image("allocation (1).png")}}" class="" width="150px">
        <div class="card-child-1"> Distributed System نظم تشغيل <br> تقنية معلومات - مستوى رابع<br>أ.منال العريقي
        </div>
    </div>
    <div class="card" style="margin-left: 22px;">
        <img src="{{Vite::image("allocation (1).png")}}" class="" width="150px">
        <div class="card-child-1"> Networks Management إدارة شبكات <br> تقنية معلومات - مستوى رابع<br>أ.منال العريقي
        </div> -->


</div>
