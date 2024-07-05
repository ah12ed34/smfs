@extends('layouts.home')
@section('nav')

{{-- <button class="spaces"> <label  class="subjectname" style="margin-left: -20px;"> الصفحة الرئيسية </label><img src="../../images/dashboard (1).png" id="subject-icon-hdr2" width="40px"style="margin-left: -165px;"></button> --}}
<div class="hdr2" style=" box-shadow: 10px;">
    <button class="spaces"> <label  class="subjectname" style="margin-left: -10px;">الصفحة الرئيسية </label><img src="{{Vite::image("dashboard (1).png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -155px;">
    </button>
    <div class="dep-name">{{ auth()->user()->student->department->name }}</div>
</div>

@endsection

@section("content")

<div  style="padding-bottom:30px; padding-left:-5px;padding-left:-5px;">


{{--
        <div class="card" id="cards-child-subject" onclick="location.href='{{route('sendnotification')}}'"><img src="{{Vite::image("paper-plane.png")}}" class="imgs-boards" width="100px" style="margin-left: -6px; margin-top:10px;">
            <div class="cards-child-child">الإشعارات
            </div>
        </div>

            <div class="card" id="cards-child-subject" onclick="location.href='{{route('studyingbooks')}}'"><img src="{{Vite::image("open-book.png")}}" class="imgs-boards" width="100px" style="margin-left: -6px; margin-top:10px;" >
            <div class="cards-child-child">المقرر الدراسي
            </div>
        </div>

        <div class="card" id="cards-child-subject" onclick="location.href='{{route('students')}}'"><img src="{{Vite::image("students.png")}}" class="imgs-boards" width="100px" style="margin-left: -6px; margin-top:10px;" >
            <div class="cards-child-child">الطلاب
            </div>
        </div>


        <div class="card" id="cards-child-subject" onclick="location.href='{{route('assignment')}}'"><img src="{{Vite::image("homework (3).png")}}" class="imgs-boards" width="100px" style="margin-left: -6px; margin-top:10px;" >
            <div class="cards-child-child">التكاليف
            </div>
        </div>

        <div class="card" id="cards-child-subject" onclick="location.href='{{route('projects')}}'"><img src="{{Vite::image("project-management.png")}}" class="imgs-boards" width="100px" style="margin-left: -18px; margin-top:10px;" >
            <div class="cards-child-child">المشاريع</div>
        </div> --}}

        <div class="card" id="cards-child-subject" onclick="location.href='{{route('student-stastistics')}}'" ><img src="{{Vite::image("bar-chart (4).png")}}" class="imgs-boards" width="100px" style="margin-left: -6px; margin-top:10px;" >
            <div class="cards-child-child">الإحصائيات</div>
        </div>
        {{-- <div class="card" id="cards-child-subject"  onclick="location.href='{{route('student-chattingGroup')}}'"  ><img src="{{Vite::image("conversation (3).png")}}" class="imgs-boards" width="100px" style="margin-left: -6px; margin-top:10px;"  > --}}
            <div class="card" id="cards-child-subject"    data-toggle="modal" data-target="#myModalchatting" ><img src="{{Vite::image("conversation (3).png")}}" class="imgs-boards" width="100px" style="margin-left: -6px; margin-top:10px;"  >
            <div class="cards-child-child">مجموعة الدردشة</div>
        </div>

        <div class="card" id="cards-child-subject" onclick="location.href='{{route('student-studyingbooks')}}'" ><img src="{{Vite::image("open-book.png")}}" class="imgs-boards" width="100px" style="margin-left: -6px; margin-top:10px;" >
            <div class="cards-child-child">المقرر الدراسي
            </div>
        </div>

        <div class="card" id="cards-child-subject" onclick="location.href='{{route('student-assignements')}}'" ><img src="{{Vite::image("homework (3).png")}}" class="imgs-boards" width="100px" style="margin-left: -6px; margin-top:10px;" >
            <div class="cards-child-child">التكاليف
            </div>
        </div>

        <div class="card" id="cards-child-subject" onclick="location.href='{{route('student-projects')}}'"  ><img src="{{Vite::image("project-management.png")}}" class="imgs-boards" width="100px" style="margin-left: -18px; margin-top:10px;" >
            <div class="cards-child-child">المشاريع</div>
        </div>
{{-- onclick="location.href='{{route('#')}}'" --}}

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

</div>
{{-- <style>
</style> --}}
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
    {{-- <script src="script.js"></script> --}}
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}

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
{{-- <div class="bottomNavbar">
    <button class="btn-bottomNavbar"><img src="{{Vite::image("setting (2).png")}}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">الإعدادات</label></button>
    <button class="btn-bottomNavbar"><img src="{{Vite::image("portfolio (2).png")}}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">الأرشيف</label></button>
    <button class="btn-bottomNavbar"><img src="{{Vite::image("calendar (3).png")}}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">الجدول </label></button>
<button class="btn-bottomNavbar" onclick="location.href='{{route('home')}}'"><img src="{{Vite::image("home (1).png")}}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">القائمة</label></button>


</div> --}}
@endsection
