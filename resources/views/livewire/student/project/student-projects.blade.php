<div>
    @section('nav')

    @endsection
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="container" id="container-project" style="padding-top: 30px;" >
        <div class="table-responsive-xl">
            <table class="table" style=" width:100%;">
                <thead class="table-header" style="font-size: 12px;">
                    <tr class="table-light" id="modldetials">
                        <th>تسليم المشروع</th>
                        <th>التفاصيل</th>
                        <th>الدردشة </th>
                        <th>الوصف</th>
                        <th>الدرجة</th>
                        <th>رئيس المشروع</th>
                        <th>تاريخ التسليم</th>
                        <th>الحالة</th>
                        <th>اسم المشروع</th>
                        <th> مدرس المقرر</th>
                        <th>اسم المقرر</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)

                    <tr class="table-light" id="modldetials" @if ($loop->first)
                        style="margin-top:7px;"
                    @endif >
                        <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#SendProject">تسليم  </button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModaldetails" id="btn-detials" wire:click='selected({{ $project->id }})' >التفاصيل</button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalchatting" id="btn-chat-edit">الدردشة <img src="{{Vite::image("conversation (3).png")}}" id=""  width="25px" ></button></td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->grade }}</td>
                        <td>{{ $project->leader_name }}</td>
                        <td>{{ $project->delivery_date }}</td>
                        <td>{{ $project->status }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->teacher_name }}</td>
                        <td>{{ $project->subject_name_ar }}</td>
                    </tr>

                    @empty

                    @endforelse
                    {{-- <tr class="table-light" id="modldetials" style="margin-top:7px;">
                        <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModaldetails">التفاصيل</button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalchatting" id="btn-chat-edit">الدردشة <img src="{{Vite::image("conversation (3).png")}}" id=""  width="25px" ></button></td>
                        <td>*******</td>
                        <td>30</td>
                        <td>******** </td>
                        <td>*******</td>
                        <td>******** </td>
                        <td>SFMS</td>
                        <td> ********</td>
                        <td>******** </td>
                    </tr> --}}

                </tbody>
            </table>
        </div>
    </div>

     <!-- The Modalcreateproject -->
     <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA;">

                <!-- Modal Header -->
                <div class="modal-header modal_header_css" id="modheader">
                    انشاء مشروع جديد
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/action_page.php" style="display: block;">
                        <div class="form-group">
                            <!-- <label for="usr">Name:</label> -->
                            <input type="text" class="form-control" id="inputtext" name="projectname" placeholder="اسم المشروع" style="height: 30px; margin-top:-6px">
                            <input type="text" class="form-control" id="inputtext" name="grades" placeholder="الدرجة" style="height: 30px; margin-top:8px">
                            <textarea style="height: 100px;" class="form-control" rows="5" id="comment" placeholder=" وصف المشروع" style=" margin-top:8px"></textarea>
                            <input type="date" class="form-control" id="inputtext" name="date" placeholder=" تاريخ التسليم" style="height: 30px; margin-top:8px; color:black;">
                            <input type="text" class="form-control" id="inputtext" name="max-numerStudents" placeholder=" الحد الأقصى للطلاب" style="height: 30px; margin-top:8px">
                            <input type="text" class="form-control" id="inputtext" name="min-numerStudents" placeholder="الحد الأدنى للطلاب" style="height: 30px; margin-top:8px">
                            <input type="file" class="form-control-file border" id="file" name="uploadefile" style="height: 30px; margin-top:8px">
                            <input type="text" class="form-control" id="inputtext" name="note" placeholder="ملاحظة" style="height: 30px; margin-top:8px">
                        </div>

                    </form>
                </div>

                <!-- Modal footer -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="">تسليم</button>
                    <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>
                </div>
            </div>
        </div>
    </div>




    <!-- The Modalchatting -->
    <div class="modal fade" id="myModalchatting">
        <div class="modal-dialog">
            <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA;height:600px;">

                <!-- Modal Header -->
                <div class="modal-header modal_header_css" id="modheader" style="padding-left: 45%">
                    {{-- <div class="">الدردشة <img src="{{Vite::image("conversation (3).png")}}" id="" width="25px"></div> --}}
                    الدردشة
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

                    <div class="detils-name">
                        <label class="textdetailsproj" for=""> اسم المشروع </label>
                        <div class="projetselements">
                            <div class="card" id="projetselements-name">
                                {{ $details['name'] }}
                            </div>
                        </div>
                    </div>

                    <div class="detils-name">
                        <label class="textdetailsproj" for=""> رئيس المشروع</label>
                        <div class="projetselements">
                            <div class="card" id="projetselements-name">
                                {{ $details['leader_name'] }}
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
                    </div>
                    <br>

                    <div class="detils-name">
                        <label for="" class="textdetailsproj">  الملفات المرفقة   </label>
                        <div class="attchementfile">
                            <div class="card" id="attchementfiles-name">
                                ********************************************************************************************************************************
                            </div>
                        </div>
                    </div>


                    <div class="">
                        <label for="" class="textdetailsproj">   فريق المشروع</label>
                        <div class="projectsmembers">
                            <div class="card" id="projectsmembers-name">
                                @foreach ($details['students'] as $student)
                                    @if ($loop->first)
                                        {{ $student->name }}
                                    @else
                                        <br> {{ $student->name }}
                                    @endif

                                @endforeach
                            </div>
                        </div>
                    </div>


                </div>

                <!-- Modal footer -->
                <div class="modal-footer" style="padding-right: 120px;">

                    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel">إلغاء</button> -->
                </div>

            </div>
        </div>
    </div>


    <!-- The ModalEdite -->
    <div class="modal fade" id="myModalEdite">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA;height: 630px;">

            <!-- Modal Header -->
            <div class="modal-header modal_header_css" id="modheader">
                تعديل
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" style="overflow: auto;">
                <form action="/action_page.php" style="display: block;">
                    <div class="form-group">
                        <!-- <label for="usr">Name:</label> -->
                        <div><input type="text" class="form-control" id="inputtext" name="username" placeholder="اسم المشروع" style="height: 30px; margin-top:-6px;"></div>
                        <div> <input type="text" class="form-control" id="inputtext" name="username" placeholder=" رئيس المشروع" style="height: 30px; margin-top:8px;"></div>
                        <div> <input type="text" class="form-control" id="inputtext" name="username" placeholder="الدرجة" style="height: 30px; margin-top:8px;"></div>
                        <div> <input type="date" class="form-control" id="inputtext" name="username" placeholder=" تاريخ التسليم" style="height: 30px; margin-top:8px;"></div>
                        <div> <textarea style="height: 100px;" class="form-control" rows="5" id="comment" placeholder=" وصف المشروع" style=" margin-top:8px"></textarea></div>
                        <!-- <input type="text" class="form-control" id="inputtext" name="username" placeholder=" الحد الأقصى للطلاب" style="height: 30px; margin-top:8px"> -->
                        <!-- <input type="text" class="form-control" id="inputtext" name="username" placeholder="الحد الأدنى للطلاب" style="height: 30px; margin-top:8px"> -->
                        <div> <input type="file" class="form-control-file border" id="file" name="file" style="height: 30px; margin-top:8px;"></div>
                        <div> <input type="text" class="form-control" id="inputtext" name="username" placeholder="ملاحظة" style="height: 30px; margin-top:8px;"></div>


                        <div class="card mb-3" style="width: 95%;height:10%; box-shadow:none;">
                            <div class="card-header">
                                <div> <input type="text" class="form-control" id="inputtext" name="username" placeholder="إضافة طالب" style="height: 30px; margin-top:8px;width:70%;margin-left:30%;"></div>
                                <button type="submit" class="btn btn-primary" id="btnsave" style="height: 30px; margin-top:-30px;font-size: 14px;font-weight:normal;">إضافة</button>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                                <p class="card-text"></p>
                            </div>
                        </div>



                    </div>
                    <!-- <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
                </form>
            </div>

            <!-- Modal footer -->

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="">تسليم</button>
                <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>
            </div>
        </div>
    </div>
    </div>

    <!-- The ModalCheckProject -->
<div class="modal fade" id="SendProject">
    <div class="modal-dialog">
        <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA; height: 500px;">

            <!-- Modal Header -->
            <div class="modal-header modal_header_css" id="modheader">
                تسليم المشروع
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
                            </tr>
                            <tr class="table-light">
                                <td>********</td>
                            </tr>
                            <tr class="table-primary">
                                <th> رفع الملفات</th>
                            </tr>
                            <tr class="table-light">
                                <td><input type="file" class="form-control-file border" id="file" name="file"></td>
                            </tr>
                            {{-- <tr class="table-primary">
                                <th style="width: 40%" >اسم الطالب</th>
                                <th style="width: 20%">الدرجة</th>
                            </tr>
                            <tr class="table-light">
                                <td style="width: 30%">********</td>
                                <td><input type="data" class="form-control" id="" name="grade" placeholder="" ></td>
                            </tr> --}}
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
                <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="">تسليم</button>
                <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>
            </div>
        </div>
    </div>
</div>


</div>
