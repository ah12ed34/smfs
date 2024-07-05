@extends('layouts.home')
@section('nav')
@livewire('components.nav.admin.department', ['active' => 'notification'])
@endsection
@section('content')
<div class="container" style="padding-top: 30px;">


    {{-- @if ($card_notification == 'StudentNotifictions') --}}
    <div class="card  cards-departments " id=""   data-toggle="modal" data-target="#ModalSendNotifictionsStudents">
    {{-- <div class="card  cards-departments" id="" onclick="window.location='{{ route('sendNotifications_students') }}'"> --}}
        <img src="{{ Vite::image('studentnotif.png')}}" class="" width="150px">
        <div class="card-departments-child" style="background-color:white; color:#34959C">   إشعارات الطلاب
        </div>
    {{-- </div> --}}
    </div>
    {{-- @endif --}}

    {{-- @if ($card_notification == 'InstructorsNotifictions') --}}
    <div class="card  cards-departments" id=""   data-toggle="modal" data-target="#ModalSendNotifictionsAcademic">
    {{-- <div class="card  cards-departments" id="" onclick="window.location='{{ route('sendNotifications_academics') }}'"> --}}
        <img src="{{ Vite::image('instructorsnotif.png')}}" class="" width="150px">
        <div class="card-departments-child"  style="background-color:white; color:#34959C"> إشعارات المعلمين
        </div>
    {{-- </div> --}}
    </div>
    {{-- @endif --}}

    {{-- @if($card_notification == 'ManagersNotifictions') --}}
    <div class="card  cards-departments" id=""   data-toggle="modal" data-target="#ModalSendNotifictionsManagers">
    {{-- <div class="card  cards-departments" id="" onclick="window.location='{{ route('sendNotifications_managers') }}'"> --}}
        <img src="{{ Vite::image('bossesofdepartmentsnotif.png')}}" class="" width="150px">
        <div class="card-departments-child"  style="background-color:white; color:#34959C">  إشعارات رؤساء الأقسام
        </div>
    {{-- </div> --}}
    </div>
    {{-- @endif --}}

    {{-- @if($card_notification == 'ManagersNotifictions') --}}
    <div class="card  cards-departments" id=""   data-toggle="modal" data-target="#ModalSendNotifictionsEmployees">
        {{-- <div class="card  cards-departments" id="" onclick="window.location='{{ route('sendNotifications_managers') }}'"> --}}
            <img src="{{ Vite::image('all_employeesNotifications.png')}}" class="" width="150px">
            <div class="card-departments-child"  style="background-color:white; color:#34959C">  إشعارات  الموظفين
            </div>
        {{-- </div> --}}
        </div>
        {{-- @endif --}}



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

    <div class="dropdown">

        <button id="" type="button" class="btn btn-light specific_department dropdown-toggle" data-toggle="dropdown" dir="rtl">
            <!-- <div class="textdropdown"> -->
                جميع الأقسام
            </button>
        <div id="dropdown-menulist" class="dropdown-menu">
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">تكنولوجيا المعلومات</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;">نظم المعلومات</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;"> علوم الحاسوب</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;">  الأمن السيبراني</a>
        </div>

        </div>
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

<!-- The ModalSendNotifictions -->
<div class="modal fade" id="ModalSendNotifictionsAcademic">
    <div class="modal-dialog">
        <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA;height:95vh;">
            <!-- Modal Header -->
            <div class="modal-header modal_header_css" id="modheader" style="padding-left: 45%">
                {{-- <div class="">الدردشة <img src="{{Vite::image("conversation (3).png")}}" id="" width="25px"></div> --}}
                اشعارات المعلمين
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body modal_body_chattinbox" id="">
<div class="card card-light header_sendNotifications">

    <div class="dropdown">

        <button id="" type="button" class="btn btn-light specific_department dropdown-toggle" data-toggle="dropdown" dir="rtl">
            <!-- <div class="textdropdown"> -->
                جميع الأقسام
            </button>
        <div id="dropdown-menulist" class="dropdown-menu">
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">تكنولوجيا المعلومات</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;">نظم المعلومات</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;"> علوم الحاسوب</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;">  الأمن السيبراني</a>
        </div>

        </div>

        <button id="" type="button" class="btn btn-primary specific_students" data-toggle="modal" data-target="#MoadalspacificStudents" > تحديد الأكادمين </button>

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
                    </div>
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

<!-- The ModalSendNotifictions -->
<div class="modal fade" id="ModalSendNotifictionsManagers">
    <div class="modal-dialog">
        <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA;height:95vh;">
            <!-- Modal Header -->
            <div class="modal-header modal_header_css" id="modheader" style="padding-left: 45%">
                {{-- <div class="">الدردشة <img src="{{Vite::image("conversation (3).png")}}" id="" width="25px"></div> --}}
                اشعارات رؤساء الأقسام
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body modal_body_chattinbox" id="">
<div class="card card-light header_sendNotifications">

    <div class="dropdown">

        <button id="" type="button" class="btn btn-light specific_department dropdown-toggle" data-toggle="dropdown" dir="rtl">
            <!-- <div class="textdropdown"> -->
                جميع الأقسام
            </button>
        <div id="dropdown-menulist" class="dropdown-menu">
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">تكنولوجيا المعلومات</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;">نظم المعلومات</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;"> علوم الحاسوب</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;">  الأمن السيبراني</a>
        </div>

        </div>

        {{-- <button id="" type="button" class="btn btn-primary specific_students" data-toggle="modal" data-target="#MoadalspacificStudents" > تحديد الأكادمين </button> --}}

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
                    </div>
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

<!-- The ModalSendNotifictionsEmployees -->
<div class="modal fade" id="ModalSendNotifictionsEmployees">
    <div class="modal-dialog">
        <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA;height:95vh;">
            <!-- Modal Header -->
            <div class="modal-header modal_header_css" id="modheader" style="padding-left: 45%">
                {{-- <div class="">الدردشة <img src="{{Vite::image("conversation (3).png")}}" id="" width="25px"></div> --}}
                اشعارات  الموظفين
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body modal_body_chattinbox" id="">
<div class="card card-light header_sendNotifications">

    <div class="dropdown">

        <button id="" type="button" class="btn btn-light specific_department dropdown-toggle" data-toggle="dropdown" dir="rtl">
            <!-- <div class="textdropdown"> -->
                جميع الموظفين
            </button>
        <div id="dropdown-menulist" class="dropdown-menu">
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> الإدارين</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;"> شؤون الطلاب</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;">  الجودة</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;">   الكنترول</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;">   الجداول</a>

        </div>

        </div>

        {{-- <button id="" type="button" class="btn btn-primary specific_students" data-toggle="modal" data-target="#MoadalspacificStudents" > تحديد الأكادمين </button> --}}

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
                    </div>
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


<!-- The MoadalspacificStudentsOrAcademic -->
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
