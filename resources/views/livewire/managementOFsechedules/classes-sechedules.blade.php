@section('nav')
    @livewire('components.nav.management_o_f_sechedules.classes-sechedules-header')
@endsection
<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="container" style="padding-top: 30px;">

        <div id="card-studyingbooks" class="card">

            <div id="card-studyingbooks-child">
                <img src="{{ icon::getIcon($schedule, true) }}" class="chapters"
                    @if (!$schedule) style="cursor: not-allowed;" disabled @else  wire:click="downloadFile" @endif>

                <!-- <div id="card-studyingbooks-child-2"> -->
                <label class="texttitlechapter"> جدول القاعات </label>
            </div>

            {{-- <div id="card-studyingbooks-child-2">
                <div class="form-group">
                    <input type="file" class="form-control-file border" id="uploadefile" name="file">
                </div>
            </div> --}}

            <div id="card-studyingbooks-child-three">
                <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal"
                    data-target="#MessageApprovementDeleteModal" style="margin-left: 30px;"
                    @if (!$schedule) disabled @endif> <img src="{{ Vite::image('delete (1).png') }}"
                        id="" width="15px"></button>
                <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal"
                    data-target="#EditeSecheduleModal" style="margin-left: 50px;">تعديل <img
                        src="{{ Vite::image('edit.png') }}" id="" width="15px"></button>

            </div>

        </div>


        {{-- <div class="table-responsive-xl">
            <table class="table" style=" width:100%;">
                <thead class="table-header" style="font-size: 12px;">
                    <tr class="table-light" id="modldetials">
                        <th>حذف الجدول</th>
                        <th> رفع جدول </th>
                        <th>عرض الجدول</th>
                        <th>  اسم الجدول </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-light" id="modldetials" style="margin-top:7px;">
                        <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#MessageApprovementDeleteModal">حذف الجدول <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#EditeSecheduleModal">تعديل الجدول  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm btn_detials" id="" data-toggle="modal" data-target="#DisplaySeheduleModal">عرض الجدول</button> </td>
                        <td>*******</td>
                    </tr>
                </tbody>
            </table>
        </div> --}}
    </div>



    {{-- <!-- The AddSecheduleModal -->
<div class="modal fade" id="AddSecheduleModal" wire:ignore.self>
<div class="modal-dialog">
    <div class="modal-content UploadeFileModal" id="modal-content2" style="height: 250px;">

        <!-- Modal Header -->
        <div class="modal-header UploadeFileModal" id="modheader">
        رفع جدول القاعات
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="" style="display: block;">
                <div class="form-group">
                    <!-- <label for="usr">Name:</label> -->
                    <input type="text" class="form-control" id="inputtext" name="phone" placeholder="  اسم الجدول  " style="height: 30px; margin-top:8px; color:black;">
                    <input type="file" class="form-control-file border" id="file" name="uploadefile" style="height: 30px; margin-top:8px">
                    <!-- <input type="file" class="form-control-file border" id="file" name="file" style="height: 30px; margin-top:8px"> -->
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
</div> --}}

    <!-- The EditeSecheduleModal -->
    <div class="modal fade" id="EditeSecheduleModal" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content UploadeFileModal" id="modal-content2" style="height: 250px;">

                <!-- Modal Header -->
                <div class="modal-header UploadeFileModal" id="modheader">
                    تعديل الجدول
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" style="display: block;">
                        <div class="form-group">

                            <input type="file" class="form-control-file border" id="file"
                                wire:model="uplodedFile" style="height: 30px; margin-top:8px">
                            @if ($errors->has('uplodedFile'))
                                <div class="alert alert-danger">{{ $errors->first('uplodedFile') }}</div>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id=""
                        wire:click='uploadFileSave'>حفظ</button>
                    <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal"
                        id="">إلغاء</button>
                </div>
            </div>
        </div>
    </div>


    {{-- <!-- The DisplaySeheduleModal -->
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
 --}}

    <!-- The ModalMessageApprovementDelete -->
    <div class="modal fade" id="MessageApprovementDeleteModal" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content UploadeFileModal" id="modal-content2" style="height: 35vh">

                <!-- Modal Header -->
                <div class="modal-header " id="modheader"
                    style="height:40px; background-color:#F6F7FA ;color: rgb(67, 111, 206);">
                    تأكيد الحذف
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                </div>

                <!-- Modal body -->
                <div class="modal-body modal_body_css" style="text-align: center;">
                    <form action="" style="display: block;">
                        <div class="form-group">
                            <!-- <label for="usr">Name:</label> -->
                            <label for="">هل تريد حذف الجدول بالفعل!</label>
                        </div>
                        <!-- <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
                    </form>
                </div>

                <!-- Modal footer -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id=""
                        wire:click="deleteFile()">نعم</button>
                    <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal"
                        id="">لا</button>
                </div>
            </div>
        </div>
    </div>
    @section('script')
        <script>
            window.addEventListener('closeModal', event => {
                $('#MessageApprovementDeleteModal').modal('hide');
                $('#EditeSecheduleModal').modal('hide');
            });
        </script>
    @endsection
</div>
