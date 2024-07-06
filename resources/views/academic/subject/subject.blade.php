@extends('layouts.home')
@section('nav')

<div class="hdr2" style=" box-shadow: 10px;">
    <button class="spaces" > <label  class="subjectname" >{{ $group_subject->subject()->name_ar }}</label><img src="{{$group_subject->subject()->image ?$group_subject->subject()->image : Vite::image("allocation (1).png")}}" id="subject-icon-hdr2" width="40px"  >
    </button>
    <div class="dep-sub-name">{{ $group_subject->subject()->name_ar }}</div>
</div>

@endsection

@section("content")

<div class="container" id="container-cards-subject"  style="padding-bottom:30px; padding-left:-5px;padding-left:-5px;">

    {{-- <a href="{{route("sendnotification")}}">    --}}
        {{-- <div class="cards-child" onclick="location.href='{{route('sendnotification')}}'"><img src="{{Vite::image("paper-plane.png")}}" class="" width="100px" style="margin-left: -6px; margin-top:10px;">
        <div class="cards-child-child">الإشعارات</div>
    </div> --}}

    {{-- <a href="{{route("studyingbooks")}}">  --}}
        {{-- <div class="cards-child" onclick="location.href='{{route('studyingbooks')}}'"><img src="{{Vite::image("open-book.png")}}" class="" width="100px" style="margin-left: -6px; margin-top:10px;">
        <div class="cards-child-child">المقرر الدراسي</div>
    </div> --}}

    {{-- <a href="{{route("students")}}"> --}}
    {{-- <div class="cards-child" onclick="location.href='{{route('students')}}'"><img src="{{Vite::image("students.png")}}" class="" width="100px" style="margin-left: -6px; margin-top:10px;">
        <div class="cards-child-child">الطلاب</div>
    </div> --}}

    {{-- <a href="{{route("assignment")}}"> --}}
    {{-- <div class="cards-child" onclick="location.href='{{route('assignment')}}'"><img src="{{Vite::image("homework (3).png")}}" class="" width="100px" style="margin-left: -6px; margin-top:10px;">
        <div class="cards-child-child">التكاليف</div>
    </div> --}}

    {{-- <a href="{{route("projects")}}"> --}}
    {{-- <div class="cards-child" onclick="location.href='{{route('projects')}}'"><img src="{{Vite::image("project-management.png")}}" class="" width="100px" style="margin-left: -18px; margin-top:10px;">
        <div class="cards-child-child">المشاريع</div>
    </div> --}}

    {{-- <a href="{{route("projects")}}"> --}}
        <div class="card" id="cards-child-subject" onclick="location.href='{{route('permissionsSubject')}}'"><img src="{{Vite::image("permissions-Subject.png")}}" class="imgs-boards" width="100px" style="margin-left: -18px; margin-top:10px;" >
            <div class="cards-child-child">الصلاحيات
            </div>
        </div>

    {{-- <a href="{{route("sendnotification")}}">    --}}
        <div class="card" id="cards-child-subject" data-toggle="modal" data-target="#ModalSendNotifictionsStudents" ><img src="{{Vite::image("paper-plane.png")}}" class="imgs-boards" width="100px" style="margin-left: -6px; margin-top:10px;">
        {{-- <div class="card" id="cards-child-subject" onclick="location.href='{{route('sendnotification')}}'"><img src="{{Vite::image("paper-plane.png")}}" class="imgs-boards" width="100px" style="margin-left: -6px; margin-top:10px;"> --}}
            <div class="cards-child-child">الإشعارات
            </div>
        </div>

        {{-- <a href="{{route("studyingbooks")}}">  --}}
            <div class="card" id="cards-child-subject" onclick="location.href='{{route('studyingbooks',[$group_subject->subject_id,$group_subject->group_id])}}'"><img src="{{Vite::image("open-book.png")}}" class="imgs-boards" width="100px" style="margin-left: -6px; margin-top:10px;" >
            <div class="cards-child-child">المقرر الدراسي
            </div>
        </div>

        {{-- <a href="{{route("students")}}"> --}}
        <div class="card" id="cards-child-subject" onclick="location.href='{{route('students',[$group_subject->subject_id,$group_subject->group_id])}}'"><img src="{{Vite::image("students.png")}}" class="imgs-boards" width="100px" style="margin-left: -6px; margin-top:10px;" >
            <div class="cards-child-child">الطلاب
            </div>
        </div>

        {{-- <a href="{{route("assignment")}}"> --}}
        <div class="card" id="cards-child-subject" onclick="location.href='{{route('assignment',[$group_subject->subject_id,$group_subject->group_id])}}'"><img src="{{Vite::image("homework (3).png")}}" class="imgs-boards" width="100px" style="margin-left: -6px; margin-top:10px;" >
            <div class="cards-child-child">التكاليف
            </div>
        </div>

        {{-- <a href="{{route("projects")}}"> --}}
        <div class="card" id="cards-child-subject" onclick="location.href='{{route('projects',[$group_subject->subject_id,$group_subject->group_id]
        )}}'"><img src="{{Vite::image("project-management.png")}}" class="imgs-boards" width="100px" style="margin-left: -18px; margin-top:10px;" >
            <div class="cards-child-child">المشاريع</div>
        </div>




</div>

 <!-- The ModalSendNotifictions -->
 <div class="modal fade" id="ModalSendNotifictionsStudents">
    <div class="modal-dialog">
        <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA;height:95vh;">
            <!-- Modal Header -->
            <div class="modal-header modal_header_css" id="modheader" style="padding-left: 45%">
                {{-- <div class="">الدردشة <img src="{{Vite::image("conversation (3).png")}}" id="" width="25px"></div> --}}
                اشعارات الطلاب
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body modal_body_chattinbox" id="">
<div class="card card-light header_sendNotifications">


        <!-- <div class="dropdowngroups"> -->

        {{-- @if($card_notification ='StudentNotifictions') --}}
        <div class="dropdown">
        <button id="" type="button" class="btn btn-light specific_group dropdown-toggle" data-toggle="dropdown"  dir="rtl">
            جميع المجموعات
            </button>
        <div id="dropdown-menulist" class="dropdown-menu">
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">(1)المجموعة</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;"> المجموعة(2)</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#"> المجموعة(3)</a>
        </div>
        </div>
        <!-- </div> -->

        <button id="" type="button" class="btn btn-primary specific_students" data-toggle="modal" data-target="#MoadalspacificStudents" > تحديد طلاب </button>
        {{-- @endif --}}

</div>

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
                                    </div>
                                    <div class="message-body">
                                        Hello, this is a message!
                                    </div>
                                    <div class="message-footer">
                                        <span class="time">10:32 AM</span>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="message receiver-message">
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
                                    </div> --}}
                                {{-- </div>
                            </div> --}}
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

<!-- The MoadalspacificStudents -->
<div class="modal fade " id="MoadalspacificStudents" wire:ignore style="top:45px; left:20px;">
    <div class="modal-dialog ">
        <div class="modal-content modal_content_css MoadalspacificStudents" style="height:40%; width:90%; border-radius:20px;" >

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

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}

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
