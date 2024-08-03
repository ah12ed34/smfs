@extends('layouts.home')
@section('nav')
    <div class="hdr2" style=" box-shadow: 10px;">
        <button class="spaces" style="padding-left: 10px" onclick="location.href='{{ route('academic.home') }}'"> <label
                class="subjectname">لوحتي التعليمية</label><img src="{{ Vite::image('left-arrow.png') }}"
                id="subject-icon-hdr2" width="30px" style="top: 10px;;">
        </button>
        <div class="dep-sub-name">{{ $group_subject->subject()->name_ar }}</div>
    </div>
@endsection

@section('content')
    <div class="container" id="container-cards-subject" style="padding-bottom:30px; padding-left:-5px;padding-left:-5px;">

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
        {{-- <div class="card" id="cards-child-subject" onclick="location.href='{{ route('permissionsSubject') }}'"><img
                src="{{ Vite::image('permissions-Subject.png') }}" class="imgs-boards" width="100px"
                style="margin-left: -18px; margin-top:10px;">
            <div class="cards-child-child">الصلاحيات
            </div>
        </div> --}}

        {{-- <a href="{{route("sendnotification")}}">    --}}
        <div class="card" id="cards-child-subject" data-toggle="modal" data-target="#ModalSendNotifictionsStudents"><img
                src="{{ Vite::image('paper-plane.png') }}" class="imgs-boards" width="100px"
                style="margin-left: -6px; margin-top:10px;">
            {{-- <div class="card" id="cards-child-subject" onclick="location.href='{{route('sendnotification')}}'"><img src="{{Vite::image("paper-plane.png")}}" class="imgs-boards" width="100px" style="margin-left: -6px; margin-top:10px;"> --}}
            <div class="cards-child-child">الإشعارات
            </div>
        </div>

        {{-- <a href="{{route("studyingbooks")}}">  --}}
        <div class="card" id="cards-child-subject"
            onclick="location.href='{{ route('studyingbooks', [$group_subject->id]) }}'"><img
                src="{{ Vite::image('open-book.png') }}" class="imgs-boards" width="100px"
                style="margin-left: -6px; margin-top:10px;">
            <div class="cards-child-child">المقرر الدراسي
            </div>
        </div>

        {{-- <a href="{{route("students")}}"> --}}
        <div class="card" id="cards-child-subject"
            onclick="location.href='{{ route('students', [$group_subject->id]) }}'">
            <img src="{{ Vite::image('students.png') }}" class="imgs-boards" width="100px"
                style="margin-left: -6px; margin-top:10px;">
            <div class="cards-child-child">الطلاب
            </div>
        </div>

        {{-- <a href="{{route("assignment")}}"> --}}
        <div class="card" id="cards-child-subject"
            onclick="location.href='{{ route('assignment', [$group_subject->id]) }}'"><img
                src="{{ Vite::image('homework (3).png') }}" class="imgs-boards" width="100px"
                style="margin-left: -6px; margin-top:10px;">
            <div class="cards-child-child">التكاليف
            </div>
        </div>

        {{-- <a href="{{route("projects")}}"> --}}
        <div class="card" id="cards-child-subject"
            onclick="location.href='{{ route('projects', [$group_subject->id]) }}'"><img
                src="{{ Vite::image('project-management.png') }}" class="imgs-boards" width="100px"
                style="margin-left: -18px; margin-top:10px;">
            <div class="cards-child-child">المشاريع</div>
        </div>




    </div>
    </div>

    @livewire('components.notifications.notifications-sender', ['group_subject' => $group_subject, 'selectActive' => ['group']])


    <script>
        // document.addEventListener("DOMContentLoaded", () => {
        //     const sendButton = document.getElementById("sendButton");
        //     const messageInput = document.getElementById("messageInput");
        //     const chatbox = document.getElementById("chatbox");

        //     sendButton.addEventListener("click", () => {
        //         const messageText = messageInput.value.trim();
        //         if (messageText !== "") {
        //             addMessage("You", "{{ Vite::image('user.png') }}", messageText, "sender-message");
        //             messageInput.value = "";
        //             messageInput.focus();
        //         }
        //     });

        //     messageInput.addEventListener("keypress", (event) => {
        //         if (event.key === "Enter") {
        //             sendButton.click();
        //         }
        //     });

        //     function addMessage(sender, profilePic, message, messageType) {
        //         const time = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        //         const messageElement = document.createElement("div");
        //         messageElement.classList.add("message", messageType);

        //         messageElement.innerHTML = `
    //             <img src="${profilePic}" alt="User Profile" class="profile-pic">
    //             <div class="message-content">
    //                 <div class="message-header">
    //                     <span class="sender">${sender}</span>
    //                 </div>
    //                 <div class="message-body">
    //                     ${message}
    //                 </div>
    //                 <div class="message-footer">
    //                     <span class="time">${time}</span>
    //                 </div>
    //             </div>
    //         `;

        //         chatbox.appendChild(messageElement);
        //         chatbox.scrollTop = chatbox.scrollHeight;
        //     }
        // });
    </script>
@endsection
