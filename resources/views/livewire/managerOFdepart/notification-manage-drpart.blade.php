@section('nav')
@livewire('components.nav.manager_of_depart.manag-depart-main ')
@endsection

<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

        <div class="container"  style="padding-top: 40px;" >

        <div class="card  cards-departments" id="" data-toggle="modal" data-target="#ModalSendNotifictionsStudents">
        {{-- <div class="card  cards-departments" id="" onclick="location.href='{{route('sendnotification_managerdepart_student')}}'"> --}}
            <img src="{{Vite::image("studentnotif.png")}}"class="" width="150px">
            <div class="card-departments-child" style="background-color:white; color:#34959C">   إشعارات الطلاب
            </div>
        {{-- </div> --}}
        </div>

        <div class="card  cards-departments" id="" data-toggle="modal" data-target="#ModalSendNotifictionsAcademic">
        {{-- <div class="card  cards-departments" id="" onclick="location.href='{{route('sendnotification_managerdepart_academic')}}'"> --}}
            <img src="{{Vite::image("instructorsnotif.png")}}" class="" width="150px">
            <div class="card-departments-child"  style="background-color:white; color:#34959C"> إشعارات المعلمين
            </div>
        {{-- </div> --}}
    </div>
</div>



<!-- The ModalSendNotifictions -->
<div class="modal fade" id="ModalSendNotifictionsStudents">
    <div class="modal-dialog">
        <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA;height:90vh;">
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
                جميع المستويات
            </button>
        <div id="dropdown-menulist" class="dropdown-menu">
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> ****</a>
            {{-- <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;"> </a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;">  </a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;">   </a> --}}
        </div>

        </div>
        <!-- <div class="dropdowngroups"> -->

        {{-- @if($card_notification ='StudentNotifictions') --}}
        <div class="dropdown">
        <button id="" type="button" class="btn btn-light specific_group dropdown-toggle" data-toggle="dropdown"  dir="rtl" style="float: left; left:40px;">
            جميع المجموعات
            </button>
        <div id="dropdown-menulist" class="dropdown-menu">
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">(1)المجموعة</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;"> المجموعة(2)</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#"> المجموعة(3)</a>
        </div>
        </div>
        <!-- </div> -->

        {{-- <button id="" type="button" class="btn btn-primary specific_students" data-toggle="modal" data-target="#MoadalspacificStudents" > تحديد طلاب </button> --}}
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
        <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA;height:90vh;">
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
                جميع المستويات
            </button>
        <div id="dropdown-menulist" class="dropdown-menu">
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> ****</a>
            {{-- <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;"> </a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;">  </a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;">   </a> --}}
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

</div>
