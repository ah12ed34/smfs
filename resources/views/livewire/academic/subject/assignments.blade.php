@section('title', 'التكاليف')
@section('nav')
    @livewire('components.nav.academic.subject.assignments',['group_subject'=>$group_subject])
@endsection
<div>

    <div class="responsive"></div>
    <div class="container">
        @forelse ($assignments as $assignment)
            <div id="card-HW" class="card bg-light text-dark" style=" color: #0E70F2;">
                <div class="card-body">
                    <div class="btn-HW">
                        <a href="{{route("recive-assignments",[$group_subject->id,$assignment->group_file->id])}}"> <button type="submit" class="btn btn-primary btn_recive_hw " id="" data-toggle="" data-target="#">الواردة </button></a>
                        <button type="submit" class="btn btn-light btn_recive_edte_hw " id="" data-toggle="modal" data-target="#myModalediteAssign" wire:click='editAssignment({{ $assignment->id }})' >تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button>
                        @if ($assignment->group_file->is_active)
                            <button type="submit" class="btn btn-danger btn_recive_hw " id="" data-toggle="modal" data-target="#myModalstop"
                                wire:click='selected({{$assignment->id}})'
                            >إيقاف </button>
                        @else
                            <button type="submit" class="btn btn-success btn_recive_hw " id="" data-toggle="modal" data-target="#myModalstop" wire:click='selected({{ $assignment->id }})'>تفعيل </button>
                        @endif
                        {{-- <button type="submit" class="btn btn-danger btn_recive_hw " id="" data-toggle="modal" data-target="#myModalstop">إيقاف </button> --}}
                    </div>
                    <table class=" table_details_assignements_teacher"  dir="rtl">
                        <tr>
                            <th class="table_header_assigne_teacher" id="">اسم التكاليف</th>
                            <td class="text_table_assigne_teacher">{{$assignment->name}}</td>
                        </tr>
                        <tr>
                            <th class="table_header_assigne_teacher" id="">الدرجة</th>
                            <td class="text_table_assigne_teacher" id="">{{$assignment->group_file->grade}}</td>
                        </tr>
                        <tr>
                            <th class="table_header_assigne_teacher" id="">الوصف</th>
                            <td class="text_table_assigne_teacher" id="">{{$assignment->description}}</td>
                        </tr>
                        <tr>
                            <th class="table_header_assigne_teacher" id="">الملف</th>
                            <td  class="text_table_assigne_teacher" id="">
                                @if($assignment->file)
                                    {{-- rename file downled --}}
                                    <a wire:click='download({{ $assignment->id }})' style="cursor: pointer;"
                                        >تحميل الملف</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="table_header_assigne_teacher" id="" >تاريخ التسليم</th>
                            <td class="text_table_assigne_teacher" id="">{{$assignment->group_file->due_date
                            }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        @empty
            <div class="alert alert-warning" role="alert">
                لا يوجد تكاليف
            </div>

        @endforelse

    </div>


    {{-- <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA;">

                <!-- Modal Header -->
                <div class="modal-header modal_header_css" id="modheader" style="padding-left: 40%;">
                      إضافة تكليف جديد
                    <button type="button" class="close" data-dismiss="modal"><img src="{{Vite::image("cancelbtn.png")}}"   width="20px" style="position: static;" ></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" style="display: block;">
                        <div class="form-group">
                            <!-- <label for="usr">Name:</label> -->
                            <input type="text" class="form-control" id="inputtext" name="username" placeholder="اسم التكليف " style="height: 30px; margin-top:-6px">
                            <input type="text" class="form-control" id="inputtext" name="username" placeholder="الدرجة " style="height: 30px; margin-top:8px">
                            <textarea style="height: 100px;" class="form-control" rows="5" id="comment" placeholder=" وصف التكليف" style=" margin-top:8px"></textarea>
                            <input type="file" class="form-control-file border" id="file" name="file" style="height: 30px; margin-top:8px" placeholder="ارفق ملف">
                            <input type="date" class="form-control" id="inputtext" name="date" placeholder="تاريخ التسليم" style="height: 30px; margin-top:8px">
                            <input type="text" class="form-control" id="inputtext" name="username" placeholder="ملاحظة " style="height: 30px; margin-top:8px">
                        </div>
                        <!-- <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
                    </form>
                </div>

                <!-- Modal footer -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" style="float: left;">حفظ</button>
                    <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>

                </div>
            </div>
        </div>
    </div> --}}




    <!-- the Modal edite -->

    <div class="modal fade" id="myModalediteAssign" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA;">

                <!-- Modal Header -->
                <div class="modal-header modal_header_css" id="modheader">
                    تعديل
                    {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" style="display: block;">
                        <div class="form-group">
                            <!-- <label for="usr">Name:</label> -->
                            <input type="text" class="form-control" id="inputtext" wire:model='assName' placeholder="اسم التكليف " style="height: 30px; margin-top:-6px">
                            <input type="text" class="form-control" id="inputtext" wire:model="grade" placeholder="الدرجة " style="height: 30px; margin-top:8px">
                            <textarea style="height: 100px;" class="form-control" rows="5" wire:model='description' id="comment" placeholder=" وصف التكليف" style=" margin-top:8px"></textarea>
                            <input type="file" class="form-control-file border" id="file" wire:model="file" style="height: 30px; margin-top:8px" placeholder="ارفق ملف">
                            <input type="date" class="form-control" id="inputtext" wire:model='due_date' placeholder=" تاريخ التسليم " style="height: 30px; margin-top:8px">
                            <input type="text" class="form-control" id="inputtext"  placeholder="ملاحظة " style="height: 30px; margin-top:8px">
                        </div>
                        <!-- <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
                    </form>
                </div>

                <!-- Modal footer -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" style="float: left;" wire:click='editAssignmentSave()'>حفظ</button>
                    <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal"  data-dismiss="modal" id="">إلغاء</button>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="myModalstop" wire:ignore.self>
        <div class="modal-dialog ">
            <div class="modal-content" style="height: 150px;">

                <!-- Modal Header -->
                <div class="modal-header" style="padding-left:50%; height: 40px; padding-top:6px;">
                    تنبيه!
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="text-align:center ;">
                    <form action="" style="display: block;">

                        {{ $message_confirmation }}


                        <!-- <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div> -->
                    </form>
                </div>

                <!-- Modal footer -->

                <div class="modal-footer" style="height: 40px;">
                    <button type="submit" class="btn btn-primary" id="btnOkYes" wire:click='stopAssignment'>نعم</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnNO">لا</button>
                </div>
            </div>
        </div>
    </div>



<div class="bottomNavbar">
    <button class="btn-bottomNavbar"><img src="{{Vite::image("setting (2).png")}}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">الإعدادات</label></button>
    <button class="btn-bottomNavbar"><img src="{{Vite::image("portfolio (2).png")}}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">الأرشيف</label></button>
    <button class="btn-bottomNavbar"><img src="{{Vite::image("calendar (3).png")}}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">الجدول </label></button>
    <a href="{{route("academic.home")}}"> <button class="btn-bottomNavbar"><img src="{{Vite::image("home (1).png")}}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">القائمة</label></button></a>
</div>

<script>
    window.addEventListener('closeModal', event => {
        $('#myModalstop').modal('hide');
        $('#myModalediteAssign').modal('hide');
        location.reload();
    });
</script>
</div>
