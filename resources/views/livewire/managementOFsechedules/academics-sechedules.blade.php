@section('nav')
@livewire('components.nav.managementOFsechedules.academics-sechedules-header',
['department'=>$department,'active'=>$active,'terms'=>$terms,'types'=>$types])

@endsection
<div>
    {{-- Do your work, then step back. --}}
    <div class="container" style="padding-top: 30px;">

        <div class="table-responsive-xl">
            <table class="table" style=" width:100%;">
                <thead class="table-header" style="font-size: 12px;">
                    <tr class="table-light" id="modldetials">
                        <th>حذف الجدول</th>
                        <th> رفع جدول </th>
                        <th>عرض الجدول</th>
                        <th>الدرجة العلمية</th>
                        <th> الجندر </th>
                        <th>  الاسم </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($academics as $academic)
                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#MessageApprovementDeleteModal">حذف الجدول <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#UploadeFileModal">رفع جدول  <img src="{{Vite::image("upload.png")}}" id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm btn_detials" id="" data-toggle="modal" data-target="#DisplaySeheduleModal">عرض الجدول</button> </td>
                            <td>{{ $academic->name }}</td>
                            <td>{{ $academic->user->gender_ar() }}</td>
                            <td>{{ $academic->f_name }}</td>
                        </tr>
                    @empty

                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <td
                                colspan="6"
                            >{{ __('No data') }}</td>
                        </tr>
                    @endforelse

                    {{-- <tr class="table-light" id="modldetials" style="margin-top:7px;">
                        <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#MessageApprovementDeleteModal">حذف الجدول <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#UploadeFileModal">رفع جدول  <img src="{{Vite::image("upload.png")}}" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm btn_detials" id="" data-toggle="modal" data-target="#DisplaySeheduleModal">عرض الجدول</button> </td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                    </tr>
                    <tr class="table-light" id="modldetials" style="margin-top:7px;">
                        <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#MessageApprovementDeleteModal">حذف الجدول <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#UploadeFileModal">رفع جدول  <img src="{{Vite::image("upload.png")}}" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm btn_detials" id="" data-toggle="modal" data-target="#DisplaySeheduleModal">عرض الجدول</button> </td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                    </tr>
                    <tr class="table-light" id="modldetials" style="margin-top:7px;">
                        <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#MessageApprovementDeleteModal">حذف الجدول <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#UploadeFileModal">رفع جدول  <img src="{{Vite::image("upload.png")}}" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm btn_detials" id="" data-toggle="modal" data-target="#DisplaySeheduleModal">عرض الجدول</button> </td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                    </tr>
                    <tr class="table-light" id="modldetials" style="margin-top:7px;">
                        <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#MessageApprovementDeleteModal">حذف الجدول <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#UploadeFileModal">رفع جدول  <img src="{{Vite::image("upload.png")}}" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm btn_detials" id="" data-toggle="modal" data-target="#DisplaySeheduleModal">عرض الجدول</button> </td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                    </tr> --}}

                </tbody>
            </table>
        </div>
        <nav>
            {{ $academics->links() }}
        </nav>
    </div>


<!-- The ModalUploadeFile -->
<div class="modal fade" id="UploadeFileModal">
<div class="modal-dialog">
    <div class="modal-content UploadeFileModal" id="modal-content2" style="height: 250px;">

        <!-- Modal Header -->
        <div class="modal-header UploadeFileModal" id="modheader">
            رفع الجدول
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

<!-- The ModalDetailsStudents -->
<div class="modal fade" id="DisplaySeheduleModal">
<div class="modal-dialog  modal-lg">
    <div class="modal-content ModaldDetailsAcademic" id="modal-content" style="background-color: #F6F7FA; height:95vh;">

        <!-- Modal Header -->
        <div class="modal-header ModaldDetailsAcademic" id="modheader">
            عرض الجدول
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body ModaldDetailsAcademic">


            <img class="img-fluid" src="{{Vite::image("studyingScheule.png")}}" id="studying-schedule" height="100%">

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
                <label  for="">هل تريد حذف الجدول بالفعل!</label>
                </div>
                <!-- <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
            </form>
        </div>

        <!-- Modal footer -->

        <div class="modal-footer" style="height: 40px;">
            <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" style="height: 30p; width: 80px; font: size 12px;">نعم</button>
            <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="" style="height: 30p; width: 80px; font: size 12px;">لا</button>
        </div>
    </div>
</div>
</div>

</div>
