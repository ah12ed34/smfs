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
                            <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="{{ $academic->user_id }}d" data-toggle="modal" data-target="#MessageApprovementDeleteModal" wire:click='selectedSchedule({{ $academic->user_id }},{{ true }})' @if (!$academic->$nameSchedule) disabled @endif >حذف الجدول <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="{{ $academic->user_id }}v" data-toggle="modal" data-target="#UploadeFileModal" wire:click='uploadSchedule({{ $academic->user_id }})' >رفع جدول  <img src="{{Vite::image("upload.png")}}" id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm btn_detials" id="{{ $academic->user_id }}s" data-toggle="modal" data-target="#DisplaySeheduleModal" wire:click='showSchedule({{ $academic->user_id }})'@if (!$academic->$nameSchedule) disabled @endif>عرض الجدول</button> </td>
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
<div class="modal fade" id="UploadeFileModal" wire:ignore.self>
<div class="modal-dialog">
    <div class="modal-content UploadeFileModal" id="modal-content2" style="height: 250px;">

        <!-- Modal Header -->
        <div class="modal-header UploadeFileModal" id="modheader">
            رفع الجدول
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        </div>

        <!-- Modal body -->
        <div class="modal-body modal_body_css ">
            <form action="" style="display: block;">
                <div class="form-group">
                    <!-- <label for="usr">Name:</label> -->

                    <input type="file" class="form-control-file border" id="file" wire:model="schedule" style="height: 30px; margin-top:8px" accept=".png,.jpg,.jpeg">
                </div>
                <!-- <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
                @if($errors->has('schedule'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('schedule') }}
                    </div>
                @endif
        </div>

        <!-- Modal footer -->

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id=""
            wire:click="uploadScheduleSave"
            >حفظ</button>
            <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>
        </div>
    </div>
</div>
</div>

<!-- The ModalDetailsStudents -->
<div class="modal fade" id="DisplaySeheduleModal" wire:ignore.self>
<div class="modal-dialog  modal-lg">
    <div class="modal-content ModaldDetailsAcademic" id="modal-content" style="background-color: #F6F7FA; height:95vh;">

        <!-- Modal Header -->
        <div class="modal-header ModaldDetailsAcademic" id="modheader">
            عرض الجدول
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body ModaldDetailsAcademic">
            @if($openType == 'show'&& $academicData->$nameSchedule)

            {{-- <img class="img-fluid" src="{{Vite::image("studyingScheule.png")}}" id="studying-schedule" height="100%"> --}}
            <img class="img-fluid" src="{{
                asset('storage/'.$academicData->$nameSchedule)
            }}" id="studying-schedule" height="100%">
            @else
                <div class="alert alert-danger" role="alert">
                    {{ __('No data') }}
                </div>
            @endif
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
<div class="modal fade" id="MessageApprovementDeleteModal" wire:ignore.self>
<div class="modal-dialog">
    <div class="modal-content UploadeFileModal" id="modal-content2" style="height: 170px;">

        <!-- Modal Header -->
        <div class="modal-header " id="modheader" style="height:40px; background-color:#F6F7FA ;color: rgb(67, 111, 206);">
            تأكيد الحذف
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        </div>

        <!-- Modal body -->
        <div class="modal-body modal_body_css" style="text-align: center;">
            <form action="" style="display: block;">
                <div class="form-group">
                    <!-- <label for="usr">Name:</label> -->
                <label  for="">هل تريد حذف الجدول بالفعل!</label>
                @if($errors->has('schedule'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('schedule') }}
                    </div>
                @endif
                </div>
                <!-- <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
            {{-- </form> --}}
        </div>

        <!-- Modal footer -->

        <div class="modal-footer" style="height: 40px;">
            <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" >نعم</button>
            <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">لا</button>
        </div>
    </div>
</div>
</div>
@section('script')
    <script>
        window.addEventListener('closeModal', event => {
            $('#UploadeFileModal').modal('hide');
            $('#DisplaySeheduleModal').modal('hide');
            $('#MessageApprovementDeleteModal').modal('hide');
        });
    </script>
@endsection
</div>
