<div>
@section('nav')
    @livewire('components.nav.academic.subject.project', ['group_subject'=>$group_subject,'deny'=>['tab']])
@endsection
    <div class="responsive"></div>
    <div class="container" id="container-project" style="padding-top: 20px;" >

        <div class="table-responsive-xl">
            <table class="table" style=" width:100%;">
                <thead class="table-header" style="font-size: 12px;">
                    <tr class="table-light" id="modldetials">
                        <th>توقيف/تفعيل </th>
                        <th>عرض المشاريع</th>
                        <th>تعديل</th>
                        <th>التفاصيل</th>
                        <th>عدد المجموعات</th>
                        <th>الدرجة الافتراصية</th>
                        <th>تاريخ التسليم</th>
                        <th>اسم المشروع</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                    <tr class="table-light" id="modldetials" @if ($loop->first) style="margin-top:7px;" @endif>
                       <td> @if ($project?->is_active )
                            <button type="submit" class="btn btn-danger btn-sm btn_detials" id="" data-toggle="modal" data-target="#myModalstop"
                                wire:click='selected({{$project->id}})'
                            >توقيف </button>
                            @else
                            <button type="submit" class="btn btn-success  btn-sm btn_detials " id="" data-toggle="modal" data-target="#myModalstop" wire:click='selected({{ $project->id }})'>تفعيل </button>
                        @endif
                       </td>
                        <td><button  class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModal2" onclick="window.location.href='{{ route('project', [$group_subject->id, $project->id
                        ]) }}' "
                             >المجموعات</button>  </td>
                        <td><button class="btn btn-primary btn-sm" id="btn-chat-edit" wire:click='selected({{ $project->id }})' data-toggle="modal" data-target="#myModalEdite" >تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button> </td>
                        <td><button class="btn btn-primary btn-sm" id="btn-detials" wire:click='selected({{ $project->id }})' data-toggle="modal" data-target="#myModaldetails" >التفاصيل</button> </td>
                        <td>{{ $project->count_groups }}</td>
                        <td>{{ $project->grade }}</td>
                        <td>{{ $project->end_date }}</td>
                        <td>{{ $project->name }}</td>
                    </tr>
                    @empty
                        <tr >
                            <td colspan="9" style="text-align: center;">{{ __('general.no_projects') }}</td>
                        </tr>

                    @endforelse
                </tbody>
            </table>
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
                    <button type="submit" class="btn btn-primary" id="btnOkYes" wire:click='stopProject'>نعم</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnNO">لا</button>
                </div>
            </div>
        </div>
    </div>


    <!-- The Modalcreateproject -->
    <div class="modal fade" id="myModal" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA; height:500px;">

                <!-- Modal Header -->
                <div class="modal-header modal_header_css" id="modheader" >
                   انشاء مشروع جديد
                    <button type="button"  class="close"  data-dismiss="modal" ><img src="{{Vite::image("cancelbtn.png")}}"   width="20px" style="position: static;" ></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body modal_body_css">
                    <form action="/action_page.php" style="display: block;">
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputtext" wire:model='name' placeholder="اسم المشروع " style="height: 30px; margin-top:-6px">
                            <input type="text" class="form-control" id="inputtext" wire:model="grade" placeholder="الدرجة " style="height: 30px; margin-top:10px">
                            <textarea style="height: 80px;" class="form-control" rows="3" id="comment" placeholder=" وصف المشروع " style=" margin-top:10px"></textarea>
                            <input type="date" class="form-control" id="inputtext" wire:model="end_date" placeholder=" تاريخ التسليم " style="height: 30px; margin-top:10px;color:black;">
                            <input type="text" class="form-control" id="inputtext" wire:model="max_students" placeholder=" الحد الأقصى للطلاب " style="height: 30px; margin-top:10px">
                            <input type="text" class="form-control" id="inputtext" wire:model="min_students" placeholder="الحد الأدنى للطلاب " style="height: 30px; margin-top:10px">
                            <input type="file" class="form-control-file border" id="file" wire:model="file" style="height: 30px; margin-top:10px">
                            {{-- <input type="text" class="form-control" id="inputtext" name="note" placeholder="ملاحظة " style="height: 30px; margin-top:10px"> --}}
                        </div>
                    </form>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach

                    @endif
                </div>


                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" style="float: left; " wire:click='addProject'>حفظ</button>
                    <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>
                </div>
            </div>
        </div>
    </div>




<!-- The Modalchatting -->
<div class="modal fade" id="myModalchatting">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content" style="background-color: #F6F7FA;height:600px;">

            <!-- Modal Header -->
            <div class="modal-header" id="modheader-proj" style="padding-left: 45%">
                <div class="">الدردشة <img src="{{Vite::image("conversation (3).png")}}" id="" width="25px"></div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" id="projectchating">

                <div class="senders">

                    <div class="card" id="sendersMessages"> السلام عليكم ورحمة الله وبركاته
                        <div class="sendingdate">
                            pm.10:24
                        </div>
                    </div>

                </div>
                <div class="recivers">

                    <div class="card" id="reciversMessages">وعليكم السلام ورحمة الله وبركاته
                        <div class="recivinggdate">
                            pm.10:24
                        </div>
                    </div>

                </div>
                <div class="recivers">

                    <div class="card" id="reciversMessages"> وعليكم السلام ورحمة الله وبركاته قد يسوق الله لك أمانيك من أمر لم تكن تتوقعه ولم يكن في بالك بالحسبان، قد تتوقع منفذ واسع يأتيك منه قطار محمل بما تتمنى ويُسيّر الله لك أمانيك، قلبك ذاك يملك أملًا وثقة بالله لا تتنازل عن هذه الثقة
                        <div class="recivinggdate">
                            pm.10:24
                        </div>
                    </div>

                </div>

                <div class="senders">

                    <div class="card" id="sendersMessages"> السلام عليكم ورحمة الله وبركاته
                        <div class="sendingdate">
                            pm.10:24
                        </div>
                    </div>

                </div>
                <div class="recivers">

                    <div class="card" id="reciversMessages">وعليكم السلام ورحمة الله وبركاته
                        <div class="recivinggdate">
                            pm.10:24
                        </div>
                    </div>

                </div>

                <div class="senders">

                    <div class="card" id="sendersMessages"> السلام عليكم ورحمة الله وبركاته
                        <div class="sendingdate">
                            pm.10:24
                        </div>
                    </div>

                </div>

                <div class="recivers">

                    <div class="card" id="reciversMessages">وعليكم السلام ورحمة الله وبركاته
                        <div class="recivinggdate">
                            pm.10:24
                        </div>
                    </div>

                </div>

                <div class="senders">

                    <div class="card" id="sendersMessages"> السلام عليكم ورحمة الله وبركاته
                        <div class="sendingdate">
                            pm.10:24
                        </div>
                    </div>

                </div>
                <div class="recivers">

                    <div class="card" id="reciversMessages">وعليكم السلام ورحمة الله وبركاته
                        <div class="recivinggdate">
                            pm.10:24
                        </div>
                    </div>

                </div>

                <div class="senders">

                    <div class="card" id="sendersMessages"> السلام عليكم ورحمة الله وبركاته
                        <div class="sendingdate">
                            pm.10:24
                        </div>
                    </div>

                </div>

                <div class="recivers">

                    <div class="card" id="reciversMessages">وعليكم السلام ورحمة الله وبركاته
                        <div class="recivinggdate">
                            pm.10:24
                        </div>
                    </div>

                </div>


            </div>

            <!-- Modal footer -->
            <div class="modal-footer" >
                {{-- <input type="text" class="form-control" id="sendmessa" name="username" placeholder="اكتب ...">
                <img src="{{Vite::image("send.png")}}" id="send-png" width="25px"> --}}
                <div  class="input-group mb-3">
                    <textarea id="send-input"  class="form-control" placeholder="اكتب..." style="height: 35px;margin-top: -10px;"></textarea>
                    <div class="input-group-append">
                        <button  class="btn btn-light" type="submit"  style="margin-top: -10px;height: 35px;margin-left:5px"><img src="{{Vite::image("send.png")}}"   width="24px" ></button>
                    </div>
                </div>
                <!-- <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel">إلغاء</button> -->
            </div>

        </div>
    </div>
</div>





<!-- The Modaldetails -->
<div class="modal fade" id="myModaldetails" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content ModaldShowDetail" id="modal-content" style="background-color: #F6F7FA;">

            <!-- Modal Header -->
            <div class="modal-header modal_header_css" id="modheader" >
                {{-- <div class="">  <img src="{{Vite::image("routine.png")}}" id="" width="25px"></div> --}}
                تفاصيل المشروع
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body modal_body_css" id="projectdetails" style="overflow: auto;">

                <div class="table-responsive ">
                    <table class="table  " style=" width:100%;" dir="rtl">

                                <tr class="table-light" id="modldetials">
                                    <th style="width: 25%;">اسم المشروع</th>
                                    <td>{{ $projectDetails->name }}</td>
                                </tr>
                                <tr class="table-light" id="modldetials">
                                    <th style="width: 25%;">تاريخ التسليم</th>
                                    <td>{{ $projectDetails->end_date }}</td>
                                </tr>
                                <tr class="table-light" id="modldetials">
                                    <th style="width: 25%;">الدرجة الافتراصية</th>
                                    <td>{{ $projectDetails->grade }}</td>
                                </tr>
                                <tr class="table-light" id="modldetials">
                                    <th style="width: 25%;">عدد المجموعات</th>
                                    <td>{{ $projectDetails->count_groups }}</td>
                                </tr>
                                <tr class="table-light" id="modldetials">
                                    <th style="width: 25%;">الوصف</th>
                                    <td>{{ $projectDetails->description }}</td>
                                </tr>
                                <tr class="table-light" id="modldetials">
                                    <th style="width: 25%;">الملف المرفق</th>
                                    <td>
                                        @if ($projectDetails->file)
                                            <a wire:click="downloadFile({{ $projectDetails->id }})" href="#" class="badge badge-success">تحميل</a>
                                        @else
                                            <span class="badge badge-danger">غير موجود</span>
                                        @endif
                                    </td>
                                </tr>
                    </table>
                </div>




            </div>

            <!-- Modal footer -->
            <div class="modal-footer ModaldShowDetail" style="padding-right: 120px;">
            </div>
        </div>
    </div>
</div>




<!-- The ModalEdite -->
{{-- @if ($projectDetails->id) --}}
{{-- @dump($project) --}}
<div class="modal fade" id="myModalEdite" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content modal_content_css"  id="modal-content" style="background-color: #F6F7FA;height: ">

            <!-- Modal Header -->
            <div class="modal-header modal_header_css" id="modheader" style="padding-left: 50%">
                تعديل
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body modal_body_css" style="overflow: auto;">
                <form  style="display: block;">
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputtext" wire:model='name'  placeholder="اسم المشروع" style="height: 30px; margin-top:-6px;">
                            <input type="data" class="form-control" id="inputtext" wire:model='grade'  placeholder="   الدرجة الافتراصية" style="height: 30px; margin-top:8px;">
                            <textarea style="height: 100px;" class="form-control" rows="5" id="comment" placeholder=" وصف المشروع" style=" margin-top:8px"></textarea>
                            <input type="date" class="form-control" id="inputtext" wire:model='end_date' placeholder=" تاريخ التسليم" style="height: 30px; margin-top:8px;">
                            <input type="file" class="form-control-file border" id="file" wire:model="file" style="height: 30px; margin-top:8px;">
                            <input type="text" class="form-control" id="inputtext" wire:model="max_students" placeholder=" الحد الأقصى للطلاب" style="height: 30px; margin-top:8px">
                            <input type="text" class="form-control" id="inputtext" wire:model="min_students" placeholder="الحد الأدنى للطلاب" style="height: 30px; margin-top:8px">
                        {{-- <div> <input type="text" class="form-control" id="inputtext" name="username" placeholder="ملاحظة" style="height: 30px; margin-top:8px;"></div> --}}
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                            {{-- @dump($errors) --}}

                        @endif
                    </div>
                    <!-- <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
                </form>
            </div>

            <!-- Modal footer -->

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" wire:click='update_proj'>حفظ</button>
                <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>
            </div>
        </div>
    </div>
</div>
{{-- @endif --}}
  <!-- The ModalDelete -->
  <div class="modal fade" id="myModdelete" wire:ignore.self>
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
                    {{ __('general.you_want_to_delete') }}
                    <!-- <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
                </form>
            </div>

            <!-- Modal footer -->

            <div class="modal-footer" style="height: 40px;">
                <button type="submit" class="btn btn-primary" id="btnOkYes" wire:click='deleteQuiz'>نعم</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnNO">لا</button>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('closeModal', event => {
        $('#myModal').modal('hide');
        $('#myModalEdite').modal('hide');
        $('#myModdelete').modal('hide');
        $('#myModaldetails').modal('hide');
        $('#myModal2').modal('hide');
        $('#myModalchatting').modal('hide');
        $('#myModalstop').modal('hide');
        location.reload();
    });

    window.addEventListener('openModal', event => {
        $('#myModal').modal('show');
    });

    // if myModal is displaing , then reset the form
    $('#myModal').on('shown.bs.modal', function () {
        @this.resetData();
    });
</script>
</div>
