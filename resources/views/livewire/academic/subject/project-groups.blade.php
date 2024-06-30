@section('nav')
    @livewire('components.nav.academic.subject.project', ['group_subject'=>$group_subject])
@endsection
{{-- @section('nav')
@livewire('components.nav.academic.subject.project-groups-header')
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
                            @if($projectGroup->file?? false)
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#CheckProject" wire:click='selected({{ $projectGroup->id }})'
                                 >تصحيح المشروع </button></td>
                            @else
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" disabled>تصحيح المشروع </button></td>
                            @endif
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
                            {{-- عرض احرف معينه --}}
                            <td>{{ Str::limit($projectGroup->comment, 10) }}</td>
                            <td>{{ $projectGroup->grade ?? 'N/A' }}</td>

                            <td>
                                @if ($projectGroup->students->where('student_id', $projectGroup->student_id)->first())
                                    {{ $projectGroup->student->user->name }}
                                @elseif ($projectGroup->student_id)
                                    {{-- error user leadir not exit in group --}}
                                    <span class="badge badge-danger">رئيس المشروع غير موجود ضمن فريق المشروع</span>
                                @else
                                    N\A
                                @endif
                            </td>
                            <td>
                                @if ($projectGroup->delivery_date)
                                    {{ $projectGroup->delivery_date }}
                                @else
                                    {{ __('general.not_delivered') }}

                                @endif
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
        <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA;height:95vh;">
            <!-- Modal Header -->
            <div class="modal-header modal_header_css" id="modheader" style="padding-left: 45%">
                {{-- <div class="">الدردشة <img src="{{Vite::image("conversation (3).png")}}" id="" width="25px"></div> --}}
                الدردشة
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body modal_body_chattinbox   " id="">

            <div class="container mt-5">
                <div class="card chatting_card" >
                    {{-- <div class="card-header text-center">
                            <h4>الدردشة</h4>
                        </div> --> --}}
                        <div class="card-body chatbox " id="chatbox" >
                            <!-- Messages will be dynamically added here -->
                            <div class="message sender-message">
                                <img src="{{Vite::image("user.png")}}" alt="User Profile" class="profile-pic">
                                <div class="message-content">
                                    <div class="message-header">
                                        <span class="sender">John Doe</span>
                                        <!-- <span class="time">10:30 AM</span> -->
                                    </div>
                                    <div class="message-body">
                                        Hello, this is a message!
                                    </div>
                                    <div class="message-footer">
                                        <span class="time">10:32 AM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="message receiver-message">
                                <img  src="{{Vite::image("user.png")}}" alt="User Profile" class="profile-pic">
                                <div class="message-content">
                                    <div class="message-header">
                                        <span class="sender">Jane Smith</span>
                                    </div>
                                    <div class="message-body">
                                        Hi John, how are you?
                                    </div>
                                    <div class="message-footer">
                                        <span class="time">10:32 AM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card-footer">
                            <div class="input-group">
                                <input type="text" class="form-control" id="messageInput" placeholder="Type a message">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="sendButton">Send</button>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer" style="z-index: 1; ">
                {{-- <input type="text" class="form-control" id="sendmessa" name="username" placeholder="اكتب ...">
                <img src="{{Vite::image("send.png")}}" id="send-png" width="25px"> --}}
                <div  class="input-group mb-3">
                    {{-- <textarea  id="messageInput"  class="form-control send-input" placeholder="اكتب..." style="height: 35px;margin-top: -10px;"></textarea> --}}
                    <input type="text" class="form-control send-input" id="messageInput" placeholder="اكتب..." style="height: 35px;margin-top: -10px;">
                    <div class="input-group-append">
                        <button  class="btn btn-light" type="button" id="sendButton"  style="margin-top: -10px;height: 35px;margin-left:5px"><img src="{{Vite::image("send.png")}}"   width="24px" ></button>
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
                                <td>{{ $name }}</td>
                            </tr>
                            <tr class="table-light" id="modldetials">
                                <th style="width: 25%;">رئيس المشروع </th>
                                <td>{{ $projectDetails->student->user->name ?? 'N/A' }}</td>
                            </tr>
                            <tr class="table-light" id="modldetials">
                                <th style="width: 25%;">تاريخ التسليم</th>
                                <td>{{ $projectDetails->delivery_date ?? 'N/A' }}</td>
                            </tr>
                            <tr class="table-light" id="modldetials">
                                <th style="width: 25%;">الدرجة </th>
                                <td>{{ $grade }}</td>
                            </tr>
                            <tr class="table-light" id="modldetials">
                                <th style="width: 25%;">عدد الطلاب</th>
                                <td>{{ ($projectDetails->students ?? false) ? count($projectDetails->students) : 'N/A' }}</td>
                            </tr>
                            <tr class="table-light" id="modldetials">
                                <th style="width: 25%;">الوصف</th>
                                <td>{{ $projectDetails->comment ?? '' }}</td>
                            </tr>
                            <tr class="table-light" id="modldetials">
                                <th style="width: 25%;">الملف المرفق</th>
                                <td>
                                    @if ($projectDetails->file?? false)
                                        <a wire:click='downloadFile()' style="cursor: pointer;"><i class="bi bi-download"></i></a>
                                    @else
                                        {{ __('general.no_file') }}
                                    @endif
                            </tr>
                </table>
            </div>


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
                                @forelse ($projectDetails->students?? [] as $student)
                                    <tr class="table-light" id="modldetials"  style="margin-top:7px;" >
                                {{-- name --}}
                                <td>{{ $student->grade }}</td>
                                <td>{{ $student->student->student->user->name }}</td>
                                    </tr>
                                @empty
                                    <tr >
                                        <td colspan="2" style="text-align: center;">{{ __('general.no_students') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

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
        <div class="modal-content modal_content_css"  id="modal-content" style="background-color: #F6F7FA;height: 500px;">

            <!-- Modal Header -->
            <div class="modal-header modal_header_css" id="modheader" >
                تعديل
                {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            </div>

            <!-- Modal body -->
            <div class="modal-body" style="overflow: auto;">
                    <div class="form-group">
                        <!-- <label for="usr">Name:</label> -->
                        <div><input type="text" class="form-control" id="inputtext" wire:model.lazy='name' placeholder="اسم المشروع" style="height: 30px; margin-top:-6px;"></div>
                        {{-- <div> <textarea style="height: 100px;" class="form-control" rows="5" id="comment" placeholder=" وصف المشروع" style=" margin-top:8px"></textarea></div> --}}
                        <!-- <input type="text" class="form-control" id="inputtext" name="username" placeholder=" الحد الأقصى للطلاب" style="height: 30px; margin-top:8px"> -->
                        <!-- <input type="text" class="form-control" id="inputtext" name="username" placeholder="الحد الأدنى للطلاب" style="height: 30px; margin-top:8px"> -->
                        {{-- <div> <input type="file" class="form-control-file border" id="file"  style="height: 30px; margin-top:8px;"></div> --}}
                        {{-- <div> <input type="text" class="form-control" id="inputtext" name="username" placeholder="ملاحظة" style="height: 30px; margin-top:8px;"></div> --}}


                        <div class="card mb-3" style="width: 95%;height:10%; box-shadow:none;">
                            <div class="card-header" style="height: 45px;">
                                {{-- <div> <input type="text" class="form-control" id="inputtext"  placeholder="إضافة طالب" style="height: 30px; margin-top:0px;width:70%;margin-left:30%;"></div> --}}
                                <button type="submit" class="btn btn-primary"
                                wire:click='selected({{ $projectDetails->id ?? 0 }},true)'
                                id="btn-add-stu" data-toggle="modal" data-target="#MoadalAddStudentsToProject"style="height: 30px; margin-top:0px;width:100%;"

                                {{-- onclick="window.location.href=
                                '{{ route('project.add-student',$parameters + ['pg_id' => $projectDetails->id??1]+$query) }}'" --}}
                                >إضافة طالب</button>
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
                                        <th style="width: 40%">  فريق المشروع</th>
                                        <th style="width: 40%">رئيس المشروع</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($users as $user)
                                        <tr class="table-light" id="modldetials"  style="margin-top:7px;" >
                                        <td><button class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModdelete" style="margin-left: 30px;" >  <img src="{{Vite::image("delete (1).png")}}" id="{{ $user['id'] }}"  width="15px" ></button></td>
                                        </td>
                                        <td>{{ $user['name'] }}</td>
                                        <td><input type="radio" id="boss{{ $user['id'] }}" wire:model='boss' value="{{ $user['id'] }}"  ></td>

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

<!-- The ModalAddStudentsToProject -->
@if($add_student == true&&$projectDetails??false)
    <livewire:components.academic.add-students
    {{-- :project_group="$projectDetails" --}}
     key="add-students-{{ $projectDetails->id }}"  />
@endif



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
<div class="modal fade" id="CheckProject" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA; height: 500px;">

            <!-- Modal Header -->
            <div class="modal-header modal_header_css" id="modheader">
                تصحيح المشروع
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            </div>

            <!-- Modal body -->
            <div class="modal-body" style="overflow: auto;height: 40vh;">
                {{-- <form action="/action_page.php" style="display: block;"> --}}
                    <div class="form-group">
                        <div class="table-responsive">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="text-align: right;">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>

                        @endif
                            <table class="table" style="width:100%;" dir="rtl">
                            <tr class="table-primary">
                                <th colspan="2" >اسم المشروع</th>
                                <th>ملفات المشروع</th>
                            </tr>
                            <tr class="table-light">
                                <td colspan="2">{{ $projectGroup->project->name . " - ".$name  }}</td>
                                <td><a wire:click='downloadFile' style="color: #007bff;cursor: pointer;"
                                    > <i class="bi bi-download"></i>  </a></td>
                            </tr>
                            <tr class="table-primary">
                                <th style="width: 40%" >اسم الطالب</th>
                                <th style="width: 20%">الدرجة</th>
                                <th style="width: 40%">التعليق</th>
                            </tr>
                            @forelse ($users as $student)
                                <tr class="table-light">
                                    <td>{{ $student['name'] }}</td>
                                    <td><input type="number" class="form-control" id="{{ $student['id'] }}"
                                         wire:model='grade_id.{{ $student['id'] }}'
                                        placeholder="درجة الطالب" min="0" max="{{ $projectGroup->project->grade - ($projectGroup->grade == $grade ? $projectGroup->grade : $grade) }}"
                                         ></td>
                                    <td><textarea  class="form-control" rows="1" placeholder="ملاحظة"
                                        wire:model='comment_id.{{ $student['id'] }}'
                                        ></textarea></td>
                                </tr>

                            @empty
                                <tr >
                                    <td colspan="2" style="text-align: center;">{{ __('general.no_students') }}</td>
                                </tr>

                            @endforelse
                            <tr >
                                <td colspan="3" style="text-align: center;">
                                    <input type="number" class="form-control" id="inputtext" wire:model.lazy='grade' placeholder="الدرجة" style="margin-top:8px;" min="0" max="{{ $projectGroup->project->grade }}">
                                </td>
                            </tr>
                            {{-- <tr class="table-light">
                                <td style="width: 30%"> {{ $projectGroup->students->user->name?? 'N/A' }}</td>
                                <td><input type="data" class="form-control" id="" name="grade" placeholder="" ></td>
                            </tr> --}}
                            <tr class="table-primary" >
                                <th colspan="3"
                                > ملاحظة</th>
                            </tr>
                            <tr class="table-light">
                                <td colspan="3"><textarea style="height: 100px;" class="form-control" rows="5" id="comment" placeholder="ملاحظة"
                                    wire:model='comment'
                                    ></textarea></td>
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

                {{-- </form> --}}
            </div>

            <!-- Modal footer -->

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" wire:click='correctProject' >حفظ</button>
                <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script>
        window.addEventListener('closeModal', event => {
            // console.log(event.detail[0].detail);
            // console.log('closeModal');
            // event.detail[0].detail not null or not exist
            if (event.detail && event.detail[0] && event.detail[0].detail
            &&event.detail[0].detail == 'add-students') {
                $('#MoadalAddStudentsToProject').modal('hide');
                // refresh the page livewire wire:
                window.location.reload();
            }else{
                $('#myModalEdite').modal('hide');
                $('#myModdelete').modal('hide');
                $('#myModaldetails').modal('hide');
                $('#CheckProject').modal('hide');
            }
        });

        window.addEventListener('openModal', event => {
            $('#MoadalAddStudentsToProject').modal('show');
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const sendButton = document.getElementById("sendButton");
            const messageInput = document.getElementById("messageInput");
            const chatbox = document.getElementById("chatbox");
    
            sendButton.addEventListener("click", () => {
                const messageText = messageInput.value.trim();
                if (messageText !== "") {
                    addMessage("You", "{{ Vite::image("user.png") }}", messageText, "sender-message");
                    messageInput.value = "";
                    messageInput.focus();
                }
            });
    
            messageInput.addEventListener("keypress", (event) => {
                if (event.key === "Enter") {
                    sendButton.click();
                }
            });
    
            function addMessage(sender, profilePic, message, messageType) {
                const time = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                const messageElement = document.createElement("div");
                messageElement.classList.add("message", messageType);
    
                messageElement.innerHTML = `
                    <img src="${profilePic}" alt="User Profile" class="profile-pic">
                    <div class="message-content">
                        <div class="message-header">
                            <span class="sender">${sender}</span>
                        </div>
                        <div class="message-body">
                            ${message}
                        </div>
                        <div class="message-footer">
                            <span class="time">${time}</span>
                        </div>
                    </div>
                `;
    
                chatbox.appendChild(messageElement);
                chatbox.scrollTop = chatbox.scrollHeight;
            }
        });
    
    </script>
@endsection
</div>
</div>
