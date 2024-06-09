@section('nav')
    @livewire('components.nav.academic.subject.project', ['group_subject'=>$group_subject])
     {{-- ['subject' => $subject], key('nav-'.time())) --}}
@endsection
<div>
    {{-- Be like water. --}}
    <div class="container" id="container-project" style="padding-top: 30px;" >

        <div class="table-responsive-xl">
            <table class="table" id="table" style=" margin-right: -30px; " >
                <thead class="table-header" style="font-size: 12px;">
                    <tr class="table-light" id="modldetials">
                        <th>تعديل</th>
                        <th>التفاصيل</th>
                        <th>الدردشة </th>
                        <th>الوصف</th>
                        <th>الدرجة</th>
                        <th>رئيس المشروع</th>
                        <th>تاريخ التسليم</th>
                        <th>الحالة</th>
                        <th>اسم المشروع</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($GroupProjects as $projectGroup)

                        <tr class="table-light" id="modldetials" @if ($loop->first) style="margin-top:7px;" @endif>
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" data-toggle="modal" data-target="#myModalEdite" wire:click='selected({{ $projectGroup->id }})'>تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button> </td>
                            @if ($projectGroup->just_created?? false)
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm" id="btn-detials" disabled  >التفاصيل</button>
                            </td>
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" disabled>الدردشة <img src="{{Vite::image("conversation (3).png")}}" id=""  width="25px" ></button></td>
                            @else
                            <td>
                            <button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModaldetails" wire:click='selected({{ $projectGroup->id }})' >التفاصيل</button>
                            </td>
                            <td><button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalchatting" id="btn-chat-edit">الدردشة <img src="{{Vite::image("conversation (3).png")}}" id=""  width="25px" ></button></td>
                            @endif

                            <td>{{ '--' }}</td>
                            <td>{{ $projectGroup->grade ?? 'N/A' }}</td>

                            <td>{{ $projectGroup->student->user->name?? 'N/A' }}</td>
                            <td>
                                {{-- @if ($projectGroup->project->date) --}}
                                    {{ $projectGroup->project->date }}
                                {{-- @else --}}
                                    <span class="badge badge-danger">غير محدد</span>
                                {{-- @endif --}}
                            </td>
                            <td>
                                @if ($projectGroup->file)
                                    <span class="badge badge-success">مكتمل</span>
                                @else
                                    <span class="badge badge-danger">غير مكتمل</span>
                                @endif
                            </td>
                            <td>{{ $projectGroup->project->name . " - ".$projectGroup->name  }}</td>
                        </tr>


                    @empty
                        <tr >
                            <td colspan="9" style="text-align: center;">{{ __('general.no_projects') }}</td>
                        </tr>

                    @endforelse


                </tbody>
            </table>
            <nav>
                {{ $GroupProjects->links(myapp::viewPagination) }}
            </nav>
            {{-- @dump($GroupProjects,$project_groups) --}}
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
        <div class="modal-content" id="modal-content" style="background-color: #F6F7FA; height:550px;">

            <!-- Modal Header -->
            <div class="modal-header" id="modheader-proj" style="padding-left: 40%">
                <div class="">تفاصيل المشروع <img src="{{Vite::image("routine.png")}}" id="" width="25px"></div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" id="projectdetails" style="overflow: auto;">

            <div class="table-responsive ">
                <table class="table  " style=" width:100%;" dir="rtl">

                            <tr class="table-light" id="modldetials">
                                <th style="width: 25%;">اسم المشروع</th>
                                <td>**********</td>
                            </tr>
                            <tr class="table-light" id="modldetials">
                                <th style="width: 25%;">رئيس المشروع </th>
                                <td>**********</td>
                            </tr>
                            <tr class="table-light" id="modldetials">
                                <th style="width: 25%;">تاريخ التسليم</th>
                                <td>**********</td>
                            </tr>
                            <tr class="table-light" id="modldetials">
                                <th style="width: 25%;">الدرجة </th>
                                <td>**********</td>
                            </tr>
                            <tr class="table-light" id="modldetials">
                                <th style="width: 25%;">عدد الطلاب</th>
                                <td>**********</td>
                            </tr>
                            <tr class="table-light" id="modldetials">
                                <th style="width: 25%;">الوصف</th>
                                <td>**********</td>
                            </tr>
                            <tr class="table-light" id="modldetials">
                                <th style="width: 25%;">الملف المرفق</th>
                                <td>**********</td>
                            </tr>
                </table>
            </div>


                {{-- <div class="detils-name">
                    <label class="textdetailsproj" for=""> اسم المشروع </label>
                    <div class="projetselements">
                        <div class="card" id="projetselements-name">
                            ****************
                        </div>
                    </div>
                </div>

                <div class="detils-name">
                    <label class="textdetailsproj" for=""> رئيس المشروع</label>
                    <div class="projetselements">
                        <div class="card" id="projetselements-name">
                                    ****************
                        </div>
                    </div>
                </div>

                <div class="detils-name">
                    <label class="textdetailsproj" for="">  تاريخ التسليم</label>
                    <div class="projetselements">
                        <div class="card" id="projetselements-name">
                            **********
                        </div>
                    </div>
                </div>

                <div class="detils-name">
                    <label class="textdetailsproj" for="">  الوصف</label>
                    <div class="projetselements">
                        <div class="card" id="projetselements-name">
                            ********************************************************************************************************************************
                        </div>
                    </div>
                </div>

                <div class="detils-name">
                    <label class="textdetailsproj" for="">  الدرجة</label>
                    <div class="projetselements">
                        <div class="card" id="projetselements-name">
                            ****************
                        </div>
                    </div>
                </div>

                <div class="detils-name">
                    <label class="textdetailsproj" for="">  ملاحظة</label>
                    <div class="projetselements">
                        <div class="card" id="projetselements-name">
                            **************
                        </div>
                    </div>
                </div> --}}
                <br>

                <div class="detils-name">
                    <label for="" class="textdetailsproj">   ملفات المشروع   </label>
                    <div class="attchementfile">
                        <div class="card" id="attchementfiles-name">
                            ********************************************************************************************************************************
                        </div>
                    </div>
                </div>


                <div class="">
                    <label for="" class="textdetailsproj">   فريق المشروع</label>
                    <div class="table-responsive">
                        <table class="table" id="table" style=" margin-right: -30px; margin-top:-5px " >
                            <thead class="table-header" style="font-size: 12px;">
                                <tr class="table-light" id="modldetials">
                                    <th>الدرجة</th>
                                    <th> اسم الطالب</th>
                                </tr>
                            </thead>
                            <tbody>

                                    <tr class="table-light" id="modldetials"  style="margin-top:7px;" >
                                <td>*********</td>

                                <td>    {{-- @dump($students) --}}
                                    {{-- @forelse ($students as $student)
                                        {{ $student->student->student->user->name }}
                                        @if (!$loop->last)
                                            <br>
                                        @endif

                                    @empty
                                        {{ __('general.no_students') }}

                                    @endforelse --}}
                                </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="projectsmembers">
                        <div class="card" id="projectsmembers-name">
                            @dump($students)
                            @forelse ($students as $student)
                                {{ $student->student->student->user->name }}
                                @if (!$loop->last)
                                    <br>
                                @endif

                            @empty
                                {{ __('general.no_students') }}

                            @endforelse

                        </div>
                    </div> --}}
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer" style="padding-right: 120px;">
            </div>
        </div>
    </div>
</div>








<!-- The ModalEdite -->
<div class="modal fade" id="myModalEdite" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content" style="background-color: #F6F7FA;height: 630px;">

            <!-- Modal Header -->
            <div class="modal-header" id="modheader" style="padding-left: 50%">
                 تعديل
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" style="overflow: auto;">
                <form
                 style="display: block;">
                    <div class="form-group">
                        <!-- <label for="usr">Name:</label> -->
                        <div><input type="text" class="form-control" id="inputtext" wire:model='name' placeholder="اسم المشروع" style="height: 30px; margin-top:-6px;"></div>
                        <div> <input type="text" class="form-control" id="inputtext"  placeholder=" رئيس المشروع" style="height: 30px; margin-top:8px;"></div>
                        <div> <input type="text" class="form-control" id="inputtext" wire:model='grade' placeholder="الدرجة" style="height: 30px; margin-top:8px;"></div>
                        <div> <input type="date" class="form-control" id="inputtext"  placeholder=" تاريخ التسليم" style="height: 30px; margin-top:8px;"></div>
                        <div> <textarea style="height: 100px;" class="form-control" rows="5" id="comment" placeholder=" وصف المشروع" style=" margin-top:8px"></textarea></div>
                        <!-- <input type="text" class="form-control" id="inputtext" name="username" placeholder=" الحد الأقصى للطلاب" style="height: 30px; margin-top:8px"> -->
                        <!-- <input type="text" class="form-control" id="inputtext" name="username" placeholder="الحد الأدنى للطلاب" style="height: 30px; margin-top:8px"> -->
                        <div> <input type="file" class="form-control-file border" id="file"  style="height: 30px; margin-top:8px;"></div>
                        {{-- <div> <input type="text" class="form-control" id="inputtext" name="username" placeholder="ملاحظة" style="height: 30px; margin-top:8px;"></div> --}}


                        <div class="card mb-3" style="width: 95%;height:10%; box-shadow:none;">
                            <div class="card-header" style="height: 45px;">
                                <div> <input type="text" class="form-control" id="inputtext"  placeholder="إضافة طالب" style="height: 30px; margin-top:0px;width:70%;margin-left:30%;"></div>
                                <button type="submit" class="btn btn-primary" id="btn-add-stu" >إضافة</button>
                            </div>
                            {{-- <div class="card-body">
                                <h4 class="card-title"></h4>
                                <p class="card-text"></p>
                            </div> --}}
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table" id="table" style=" margin-right: -30px; " >
                                <thead class="table-header" style="font-size: 12px;">
                                    <tr class="table-light" id="modldetials">
                                        <th>حذف الطالب</th>
                                        <th>الدرجة</th>
                                        <th>  فريق المشروع</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($users as $user)
                                        <tr class="table-light" id="modldetials"  style="margin-top:7px;" >
                                        <td><button class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModdelete" style="margin-left: 30px;" >  <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button></td>
                                        <td>*********</td>
                                        <td>{{ $user['name'] }}</td>
                                        </tr>
                                    @empty
                                        <tr >
                                            <td colspan="3" style="text-align: center;">{{ __('general.no_students') }}</td>
                                        </tr>

                                    @endforelse

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
                <button type="submit" class="btn btn-primary" id="btnsave" wire:click='updateProjectGroup' >حفظ</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel">إلغاء</button>
            </div>
        </div>
    </div>
</div>

  <!-- The ModalDelete -->
  <div class="modal fade" id="myModdelete" wire:ignore>
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

</div>
