@extends('layouts.home')
@section('nav')


<div class="hdr2" style=" box-shadow: 10px;">
    <button class="spaces"> <label  class="subjectname"> المشاريع </label><img src="{{Vite::image("project-management.png")}}" id="subject-icon-hdr2" width="40px">
    </button>
    <div class="dep-name">تقنية معلومات</div>
        <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->


 {{-- href="{{route("studeProjectsStastics")}}" --}}
    <div id="btn-group-proj" class="btn-group">
        <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->
      <a href="{{route("student-projectsStastics")}}">  <button class="btn-projctsNavbarproj"><label class="proNavbartext">الإحصائيات</label></button></a>
        <button class="btn-projctsNavbarproj"><label class="proNavbartext"> غير منجزة</label></button>
        <button class="btn-projctsNavbarproj"><label class="proNavbartext"> منجزة </label></button>
        <a  href="{{route("student-projects")}}">  <button class="btn-projctsNavbarproj"style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"><label class="proNavbartext">الكل</label></button></a>
    </div>
{{-- href="{{route("studProjects")}}" --}}

    <button id="button-hdr2" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown" >
            <div class="textdrop">  جميع المشاريع</div>
            </button>
    <div id="dropdown-menulist" class="dropdown-menu">
        <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">منجزة</a>
        <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:30px;">غير منجزة</a>
        <a id="dropdown-itemlist" class="dropdown-item" href="{{route("student-projectsStastics")}}"> الإحصائيات</a>
    </div>
    {{-- {{route("studeProjectsStastics")}} --}}

</div>

<div class="hr3">
    <a href="{{route("student")}}">  <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px" ></button></a>
    <div id="input-group-students-search" class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-append">
            <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
        </div>
    </div>
    {{-- <button class="Addbtn-projctsNavbar" data-toggle="modal" data-target="#myModal"><label class="proNavbartext">إنشاء مشروع</label><img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button> --}}
</div>

@endsection

@section("content")
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
                <tr class="table-light" id="modldetials" style="margin-top:7px;">
                    <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#SendProject">تسليم  </button> </td>
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
                </tr>
                <tr class="table-light">
                    <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#SendProject">تسليم  </button> </td>
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
                </tr>
                <tr class="table-light">
                    <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#SendProject">تسليم  </button> </td>
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
                </tr>
                <tr class="table-light">
                    <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#SendProject">تسليم  </button> </td>
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
                </tr>
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
                <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="">حفظ</button>
                <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>
            </div>
        </div>
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
                                <td><a> <i class="bi bi-download"></i>  </a></td>
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

                                    <tr class="table-light" id="modldetials"  style="margin-top:7px;" >
                                <td>*********</td>
                                <td>*********</td>
                                    </tr>
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
            <button type="submit" class="btn btn-primary" id="btnsave">حفظ</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel">إلغاء</button>
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


@endsection
