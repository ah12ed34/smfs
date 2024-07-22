@section('nav')
@livewire('components.nav.admin.students-schedule-header', ['level' => $level])
@endsection
<div>
    {{-- The Master doesn't talk, he acts. --}}

    <div class="container" style="padding-top: 30px;">

        @livewire('managementOFsechedules.students-sechedules')


{{--
        <div class="table-responsive-xl">
            <table class="table" style=" width:100%;">
                <thead class="table-header" style="font-size: 12px;">
                    <tr class="table-light" id="modldetials">
                        <th>حذف الجدول</th>
                        <th> رفع جدول </th>
                        <th>عرض الجدول</th>
                        <th>طلاب\طالبات</th>
                        <th> النظام </th>
                        <th>  اسم المجموعة</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($groups as $group)
                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#MessageApprovementDeleteModal" wire:click='selectedSchedule({{ $group->id }},true)' @if (!$group->schedule) disabled @endif>حذف الجدول <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#UploadeFileModal" wire:click='uploadSchedule({{ $group->id }})'>رفع جدول  <img src="{{Vite::image("upload.png")}}" id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm btn_detials" id="" data-toggle="modal" data-target="#DisplaySeheduleModal" wire:click='showSchedule({{ $group->id }})' @if (!$group->schedule) disabled @endif>عرض الجدول</button> </td>
                            <td>{{ myapp::getStudentGender($group->gender) }}</td>
                            <td>{{ myapp::getSystem($group->system) }}</td>
                            <td>{{ $group->name }}</td>
                        </tr>

                    @empty

                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <td colspan="6">{{ __('No data') }}</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        <nav>
            {{ $groups->links(myapp::viewPagination) }}
        </nav> --}}
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
        <div class="modal-body modal_body_css">
            <form action="" style="display: block;">
                <div class="form-group">
                    <input type="file" class="form-control-file border" id="file" style="height: 30px; margin-top:8px" wire:model='schedule'
                    accept='.png,.jpg,.jpeg'>
                    @if ($openType == 'upload'&&$errors->has('schedule'))
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

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id=""
            wire:click='uploadScheduleSave'
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
            @if ($openType == 'show'&&$academicData->schedule)
                <img class="img-fluid" src="{{ asset('storage/'.$academicData->schedule) }}" id="studying-schedule" height="100%">
            @else
                <div class="alert alert-danger" role="alert">
                    لا يوجد جدول لهذه المجموعة
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
    <div class="modal-content UploadeFileModal" id="modal-content2" style="height: 35vh ;">

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
                </div>
                @if ($openType == 'delete'&&$errors->has('schedule'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('schedule') }}
                    </div>
                @endif
                </div>

        <!-- Modal footer -->

        <div class="modal-footer" style="height: 40px;">
            <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="">نعم</button>
            <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="" >لا</button>
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
