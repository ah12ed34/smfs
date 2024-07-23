<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <!-- The MoadalspacificStudentsOrAcademic -->
    <div class="modal fade" id="ModalSendNotifictionsStudents" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content modal_content_css" id="modal-content"
                style="background-color: #F6F7FA;height:95vh;">
                <!-- Modal Header -->
                <div class="modal-header modal_header_css" id="modheader" style="padding-left: 45%">
                    @switch($NotificationActive)
                    @case('students_a')
                    اشعارات الطلاب
                    @break
                    @case('teacher_a')
                    اشعارات الأكاديميين
                    @break
                    @case('HOD')
                    اشعارات رؤساء الأقسام
                    @break
                    @case('employee')
                    اشعارات الموظفين
                    @break
                    @default
                    اشعارات الطلاب
                    @endswitch
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body modal_body_chattinbox" id="">
                    <div class="card card-light header_sendNotifications">
                        @if(in_array('department', $selectActive))
                        <div class="dropdown">

                            <button id="" type="button" class="btn btn-light specific_department dropdown-toggle"
                                data-toggle="dropdown" dir="rtl">
                                {{-- جميع الأقسام --}}
                                {{ $active['department'] != null
                                ? $departments->where('id', $active['department'])->first()->name
                                : 'جميع الأقسام' }}
                            </button>
                            <div id="dropdown-menulist" class="dropdown-menu">
                                @if ($active['department'] != null)
                                <a id="dropdown-students-itemlist" class="dropdown-item"
                                    wire:click="setDepartment(null)" style="padding-left:40px;">جميع الأقسام</a>
                                @endif
                                @foreach ($departments->where('id', '!=', $active['department']) as $department)
                                <a id="dropdown-students-itemlist" class="dropdown-item"
                                    wire:click="setDepartment({{ $department->id }})" style="padding-left:40px;">{{
                                    $department->name }}</a>
                                @endforeach
                                {{-- <a id="dropdown-students-itemlist" class="dropdown-item" href="#"
                                    style="padding-left:40px;">تكنولوجيا المعلومات</a>
                                <a id="dropdown-students-itemlist" class="dropdown-item" href="#"
                                    style="padding-left:30px;">نظم المعلومات</a>
                                <a id="dropdown-students-itemlist" class="dropdown-item" href="#"
                                    style="padding-left:30px;"> علوم الحاسوب</a>
                                <a id="dropdown-students-itemlist" class="dropdown-item" href="#"
                                    style="padding-left:30px;"> الأمن السيبراني</a> --}}
                            </div>

                        </div>
                        @endif
                        @if(in_array('role', $selectActive))
                        <div class="dropdown">

                            <button id="" type="button" class="btn btn-light specific_department dropdown-toggle"
                                data-toggle="dropdown" dir="rtl">
                                {{ $active['role'] != null
                                ? $roles->where('id', $active['role'])->first()->description
                                : 'جميع الموظفين' }}
                            </button>
                            <div id="dropdown-menulist" class="dropdown-menu">
                                @if ($active['role'] != null)
                                <a id="dropdown-students-itemlist" class="dropdown-item" wire:click="setRole(null)"
                                    style="padding-left:40px;">
                                    جميع الموظفين
                                </a>
                                @endif
                                @foreach ($roles->where('id', '!=', $active['role']) as $role)
                                <a id="dropdown-students-itemlist" class="dropdown-item"
                                    wire:click="setRole({{ $role->id }})" style="padding-left:40px;">{{
                                    $role->description }}</a>
                                @endforeach
                            </div>

                        </div>
                        @endif

                        @if(in_array('group', $selectActive))
                        <div class="dropdown">
                            <button id="" type="button" class="btn btn-light specific_group dropdown-toggle" style="float: left;
                                position: relative;left: 10%;" @if($active['level']==null &&in_array('level',
                                $selectActive) ) disabled @endif data-toggle="dropdown" dir="rtl">
                                {{-- @dd($active['group'], $groups->where('id', $active['group'])->first()) --}}
                                {{ $active['group'] != null ? $groups->where('id', $active['group'])->first()?->name :
                                'جميع المجموعات' }}
                            </button>
                            <div id="dropdown-menulist" class="dropdown-menu">
                                @if ($active['group'] != null)
                                <a id="dropdown-students-itemlist" class="dropdown-item" wire:click="setGroup"
                                    style="padding-left:40px;">جميع المجموعات</a>
                                @endif
                                @foreach ($groups->where('id', '!=', $active['group']) as $group)
                                <a id="dropdown-students-itemlist" class="dropdown-item"
                                    wire:click="setGroup({{ $group->id }})" style="padding-left:40px;">{{ $group->name
                                    }}</a>

                                @endforeach
                                {{-- <a id="dropdown-students-itemlist" class="dropdown-item" href="#"
                                    style="padding-left:40px;">(1)المجموعة</a>
                                <a id="dropdown-students-itemlist" class="dropdown-item" href="#"
                                    style="padding-left:30px;"> المجموعة(2)</a>
                                <a id="dropdown-students-itemlist" class="dropdown-item" href="#"> المجموعة(3)</a> --}}
                            </div>
                        </div>
                        @endif
                        @if(in_array('level', $selectActive))
                        <div class="dropdown">
                            <button id="" type="button" class="btn btn-light specific_group dropdown-toggle"
                                @if($active['department']==null && in_array('department',$selectActive) ) disabled
                                @endif data-toggle="dropdown" dir="rtl">
                                {{ $active['level'] != null ? $levels->where('id', $active['level'])->first()?->name :
                                'جميع المستويات' }}
                            </button>
                            <div id="dropdown-menulist" class="dropdown-menu">
                                @if ($active['level'] != null)
                                <a id="dropdown-students-itemlist" class="dropdown-item" wire:click="setLevel"
                                    style="padding-left:40px;">جميع المستويات</a>
                                @endif
                                @foreach ($levels->where('id', '!=', $active['level']) as $level)
                                <a id="dropdown-students-itemlist" class="dropdown-item"
                                    wire:click="setLevel({{ $level->id }})" style="padding-left:40px;">{{ $level->name
                                    }}</a>

                                @endforeach
                                {{-- <a id="dropdown-students-itemlist" class="dropdown-item" href="#"
                                    style="padding-left:40px;">(1)المجموعة</a>
                                <a id="dropdown-students-itemlist" class="dropdown-item" href="#"
                                    style="padding-left:30px;"> المجموعة(2)</a>
                                <a id="dropdown-students-itemlist" class="dropdown-item" href="#"> المجموعة(3)</a> --}}
                            </div>
                        </div>
                        @endif

                        {{-- <button id="" type="button" class="btn btn-primary specific_students" data-toggle="modal"
                            data-target="#MoadalspacificStudents"> تحديد طلاب </button> --}}


                        {{-- <div class="dropdown">
                            <button id="" type="button" class="btn btn-light specific_group dropdown-toggle"
                                data-toggle="dropdown" dir="rtl">
                                {{ $active['group'] != null ? $groups->where('id', $active['group'])->first()?->name :
                                'جميع المجموعات' }}
                            </button>
                            <div id="dropdown-menulist" class="dropdown-menu">
                                @foreach ($groups->where('id', '!=', $active['group']) as $group)
                                <a id="dropdown-students-itemlist" class="dropdown-item"
                                    href="{{ route($nameRoute, $parameters + array_merge($query, ['group' => $group->id])) }}"
                                    style="padding-left:40px;">{{ $group->name }}</a>

                                @endforeach

                            </div>
                        </div> --}}
                    </div>

                    <div class="container mt-5">
                        <div class="card chatting_card">
                            {{-- <div class="card-header text-center">
                                <h4>الدردشة</h4>
                            </div> --> --}}
                            <div class="card-body chatbox " id="chatbox">
                                <!-- Messages will be dynamically added here -->
                                @forelse ($notifications as $notification)
                                <div class="message sender-message">
                                    <img src="{{ Vite::image('user.png') }}" alt="User Profile" class="profile-pic">
                                    <div class="message-content">
                                        <div class="message-header">
                                            <span class="sender">{{ $notification->sender }}</span>
                                        </div>
                                        <div class="message-body">
                                            {{ $notification->message }}
                                        </div>
                                        <div class="message-footer">
                                            <span class="time">{{ $notification->created_at->format('h:i A') }}</span>
                                        </div>
                                    </div>
                                </div>

                                @empty

                                <center>
                                    <h4>لا يوجد رسائل</h4>
                                </center>

                                @endforelse
                                {{-- <div class="message sender-message">
                                    <img src="{{ Vite::image('user.png') }}" alt="User Profile" class="profile-pic">
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
                                </div> --}}
                                {{-- <div class="message receiver-message">
                                    <img src="{{Vite::image(" user.png")}}" alt="User Profile" class="profile-pic">
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
                                        {{--
                                    </div>
                                </div> --}}
                            </div>
                            {{-- <div class="card-footer">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="messageInput"
                                        placeholder="Type a message">
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
                    <img src="{{Vite::image(" send.png")}}" id="send-png" width="25px"> --}}
                    <div class="input-group mb-3">
                        {{-- <textarea id="messageInput" class="form-control send-input" placeholder="اكتب..."
                            style="height: 35px;margin-top: -10px;"></textarea> --}}
                        <input type="text" class="form-control send-input" id="messageInput" placeholder="اكتب..."
                            wire:model="message" style="height: 35px;margin-top: -10px;">
                        <div class="input-group-append">
                            <button class="btn btn-light" type="button" id="sendButton" wire:click="sendMessage"
                                style="margin-top: -10px;height: 35px;margin-left:5px">
                                <img src="{{ Vite::image('send.png') }}" width="24px"></button>
                        </div>
                    </div>
                    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel">إلغاء</button> -->
                </div>
            </div>
        </div>
    </div>

    {{-- @section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
                const sendButton = document.getElementById("sendButton");
                const messageInput = document.getElementById("messageInput");
                const chatbox = document.getElementById("chatbox");

                sendButton.addEventListener("click", () => {
                    const messageText = messageInput.value.trim();
                    if (messageText !== "") {
                        addMessage("You", "{{ Vite::image('user.png') }}", messageText, "sender-message");
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
                    const time = new Date().toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    });
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
    @endsection --}}
</div>