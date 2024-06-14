@section('nav')
    @livewire('components.nav.academic.subject.project', ['group_subject'=>$group_subject])
@endsection
{{-- @section('nav')
@livewire('components\nav\academic.subject.project-groups-header')
@endsection --}}
<div>

    {{-- Be like water. --}}
    <div class="container" id="container-project" style="padding-top: 30px;" >

        <div class="table-responsive-xl">
            <table class="table" id="table" style=" margin-right: -30px; " >
                <thead class="table-header" style="font-size: 12px;">
                    <tr class="table-light" id="modldetials">
                        <th>تصحيح المشروع</th>
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
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#CheckProject" >تصحيح المشروع </button></td>
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
        <div class="modal-content ModaldShowDetail" id="modal-content" style="background-color: #F6F7FA; height:550px;">

            <!-- Modal Header -->
            <div class="modal-header modal_header_css" id="modheader" >
                {{-- <div class="">  <img src="{{Vite::image("routine.png")}}" id="" width="25px"></div> --}}
                تفاصيل المشروع
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

                {{-- <div class="detils-name">
                    <label for="" class="textdetailsproj">   ملفات المشروع   </label>
                    <div class="attchementfile">
                        <div class="card" id="attchementfiles-name">
                            ********************************************************************************************************************************
                        </div>
                    </div>
                </div> --}}


                <div class="">
                    {{-- <label for="" class="textdetailsproj">   فريق المشروع</label> --}}
                    <div class="table-responsive">
                        <table class="table" id="table" style=" margin-right: -30px; margin-top:-5px " >
                            <thead class="table-header" style="font-size: 12px;">
                                <tr class="table-primary" id="modldetials">
                                    <th style="width: 20%">الدرجة</th>
                                    <th style="width: 40%"> اسم الطالب</th>
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
            <div class="modal-footer ModaldShowDetail" style="padding-right: 120px;">
            </div>
        </div>
    </div>
</div>


<!-- The ModalEdite -->
<div class="modal fade" id="myModalEdite" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content modal_content_css"  id="modal-content" style="background-color: #F6F7FA;height: 550px;">

            <!-- Modal Header -->
            <div class="modal-header modal_header_css" id="modheader" >
                تعديل
                {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            </div>

            <!-- Modal body -->
            <div class="modal-body" style="overflow: auto;">
                    <div class="form-group">
                        <!-- <label for="usr">Name:</label> -->
                        <div><input type="text" class="form-control" id="inputtext" wire:model='name' placeholder="اسم المشروع" style="height: 30px; margin-top:-6px;"></div>
                        <div> <input type="text" class="form-control" id="inputtext"  placeholder=" رئيس المشروع" style="height: 30px; margin-top:8px;"></div>
                        <div> <input type="text" class="form-control" id="inputtext" wire:model='grade' placeholder="الدرجة" style="height: 30px; margin-top:8px;"></div>
                        <div> <input type="date" class="form-control" id="inputtext"  placeholder=" تاريخ التسليم" style="height: 30px; margin-top:8px;"></div>
                        {{-- <div> <textarea style="height: 100px;" class="form-control" rows="5" id="comment" placeholder=" وصف المشروع" style=" margin-top:8px"></textarea></div> --}}
                        <!-- <input type="text" class="form-control" id="inputtext" name="username" placeholder=" الحد الأقصى للطلاب" style="height: 30px; margin-top:8px"> -->
                        <!-- <input type="text" class="form-control" id="inputtext" name="username" placeholder="الحد الأدنى للطلاب" style="height: 30px; margin-top:8px"> -->
                        {{-- <div> <input type="file" class="form-control-file border" id="file"  style="height: 30px; margin-top:8px;"></div> --}}
                        {{-- <div> <input type="text" class="form-control" id="inputtext" name="username" placeholder="ملاحظة" style="height: 30px; margin-top:8px;"></div> --}}


                        <div class="card mb-3" style="width: 95%;height:10%; box-shadow:none;">
                            <div class="card-header" style="height: 45px;">
                                {{-- <div> <input type="text" class="form-control" id="inputtext"  placeholder="إضافة طالب" style="height: 30px; margin-top:0px;width:70%;margin-left:30%;"></div> --}}
                                <button type="submit" class="btn btn-primary" id="btn-add-stu" data-toggle="modal" data-target="#MoadalAddStudentsToProject"style="height: 30px; margin-top:0px;width:100%;" >إضافة طالب</button>
                            </div>
                            </div>
                            {{-- <div class="card-body">
                                <h4 class="card-title"></h4>
                                <p class="card-text"></p>
                            </div> --}}
                        </div>

                        <div class="table-responsive">
                            <table class="table" id="table" style=" margin-right: -30px;margin-top:-10px; " >
                                <thead class="table-header" style="font-size: 12px;">
                                    <tr class="table-light" id="modldetials">
                                        <th style="width: 7%" >حذف الطالب</th>
                                        <th style="width: 16%" >الدرجة</th>
                                        <th style="width: 40%">  فريق المشروع</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($users as $user)
                                        <tr class="table-light" id="modldetials"  style="margin-top:7px;" >
                                        <td><button class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModdelete" style="margin-left: 30px;" >  <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button></td>
                                        <td><input type="data" class="form-control" id=""  placeholder="" >
                                        </td>
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
                    <!-- <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
                {{-- </form> --}}
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" wire:click='updateProjectGroup' >حفظ</button>
                <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>
            </div>
        </div>
    </div>
</div>

<!-- The ModalDelete -->
    <div class="modal fade" id="MoadalAddStudentsToProject" wire:ignore style="top: 60px; left:60px;">
    <div class="modal-dialog ">
        <div class="modal-content modal_content_css" style="height:50%; width:350px; border-radius:20px;" >

            <!-- Modal Header -->
            <div class="modal-header" style=" height: 50px; padding-top:6px; background-color:#0E70F2;" >

                                
                                <div id="" class="input-group mb-3" style="top:15px; height:30px;">
                                    <input type="text" class="form-control"  placeholder="Search">
                                    <div class="input-group-append">
                                        <button id="form-control" class="btn btn-light" type="submit"  ><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
                                    </div>
                                </div>
                        
                        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}

            </div>

            <!-- Modal body -->
            <div class="modal-body" style="overflow: auto;">
                <form action="/action_page.php" style="display: block;">
                        <div class="table-responsive">
                            <table class="table" style="width:100%;" >
                                {{-- <thead>
                                    <tr class="table-light" id="">
                                        <th colspan="2">
                                        
                                        </th>
                                    </tr>
                                </thead> --}}
                                <tbody style="overflow: auto;">
                                    <tr class="table-light">
                                        <td style="text-align: right;">********</td>
                                        <td style="width:7%"><input type="checkbox" class="" name="raido"></td>
                                    </tr>
                                    <tr class="table-light">
                                        <td style="text-align: right;">********</td>
                                        <td style="width: 7%"><input type="checkbox" class="" name="raido"></td>
                                    </tr>
                                    <tr class="table-light">
                                        <td style="text-align: right;">********</td>
                                        <td style="width:7%"><input type="checkbox" class="" name="raido"></td>
                                    </tr>
                                    <tr class="table-light">
                                        <td style="text-align: right;">********</td>
                                        <td style="width: 7%"><input type="checkbox" class="" name="raido"></td>
                                    </tr>
                                    <tr class="table-light">
                                        <td style="text-align: right;">********</td>
                                        <td style="width:7%"><input type="checkbox" class="" name="raido"></td>
                                    </tr>
                                    <tr class="table-light">
                                        <td style="text-align: right;">********</td>
                                        <td style="width: 7%"><input type="checkbox" class="" name="raido"></td>
                                    </tr>
                                    <tr class="table-light">
                                        <td style="text-align: right;">********</td>
                                        <td style="width:7%"><input type="checkbox" class="" name="raido"></td>
                                    </tr>
                                    <tr class="table-light">
                                        <td style="text-align: right;">********</td>
                                        <td style="width: 7%"><input type="checkbox" class="" name="raido"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    

                </form>
            </div>

            <!-- Modal footer -->

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" style="height:30px; width:60px; " >حفظ</button>
                <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="" style="height:30px; width:60px; ">إلغاء</button>
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

<!-- The ModalCheckProject -->
<div class="modal fade" id="CheckProject">
    <div class="modal-dialog">
        <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA; height: 500px;">

            <!-- Modal Header -->
            <div class="modal-header modal_header_css" id="modheader">
                تصحيح المشروع
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="/action_page.php" style="display: block;">
                    <div class="form-group">

                        <div class="table-responsive">
                            <table class="table" style="width:100%;" dir="rtl">
                            <tr class="table-primary">
                                <th>اسم المشروع</th>
                                <th>ملفات المشروع</th>
                            </tr>
                            <tr class="table-light">
                                <td>********</td>
                                <td><a> <i class="bi bi-download"></i>  </a></td>
                            </tr>
                            <tr class="table-primary">
                                <th style="width: 40%" >اسم الطالب</th>
                                <th style="width: 20%">الدرجة</th>
                            </tr>
                            <tr class="table-light">
                                <td style="width: 30%">********</td>
                                <td><input type="data" class="form-control" id="" name="grade" placeholder="" ></td>
                            </tr>
                            <tr class="table-primary">
                                <th colspan="2"> ملاحظة</th>
                            </tr>
                            <tr class="table-light">
                                <td colspan="2"><textarea style="height: 100px;" class="form-control" rows="5" id="comment" placeholder="ملاحظة"></textarea></td>
                            </tr>
                            </table>
                        </div>

                        {{-- <input type="text" class="form-control" id="inputtext" name="projectname" placeholder=" الاسم " style="height: 30px; margin-top:8px">
                        <input type="date" class="form-control" id="inputtext" name="date" placeholder="تاريخ الميلاد" style="height: 30px; margin-top:8px">
                        <input type="date" class="form-control" id="inputtext" name="phone" placeholder="تاريخ الإلتحاق  " style="height: 30px; margin-top:8px; color:black;">
                        <input type="text" class="form-control" id="inputtext" name="email" placeholder="الايمل الجامعي" style="height: 30px; margin-top:8px">
                        <input type="data" class="form-control" id="inputtext" name="phone" placeholder="التلفون  " style="height: 30px; margin-top:8px; color:black;">
                        <input type="password" class="form-control" id="inputtext" name="email" placeholder=" كلمة المرور " style="height: 30px; margin-top:8px">--}}
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
</div>


</div>
</div>
