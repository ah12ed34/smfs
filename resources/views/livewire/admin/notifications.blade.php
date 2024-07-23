@section('nav')
@livewire('components.nav.admin.department', ['active' => 'notification'])
@endsection
<div>

    <div class="container">

        <div class="card  cards-departments " id="" wire:click='setAN("student_a")' data-toggle="modal"
            data-target="#ModalSendNotifictionsStudents">

            <img src="{{ Vite::image('studentnotif.png')}}" class="" width="150px">
            <div class="card-departments-child" style="background-color:white; color:#34959C"> إشعارات الطلاب
            </div>

        </div>

        <div class="card  cards-departments" id="" wire:click='setAN("teacher_a")' data-toggle="modal"
            data-target="#ModalSendNotifictionsStudents">

            <img src="{{ Vite::image('instructorsnotif.png')}}" class="" width="150px">
            <div class="card-departments-child" style="background-color:white; color:#34959C"> إشعارات المعلمين
            </div>

        </div>

        <div class="card  cards-departments" id="" wire:click='setAN("HOD")' data-toggle="modal"
            data-target="#ModalSendNotifictionsStudents">

            <img src="{{ Vite::image('bossesofdepartmentsnotif.png')}}" class="" width="150px">
            <div class="card-departments-child" style="background-color:white; color:#34959C"> إشعارات رؤساء الأقسام
            </div>

        </div>

        <div class="card  cards-departments" id="" wire:click='setAN("employee")' data-toggle="modal"
            data-target="#ModalSendNotifictionsStudents">

            <img src="{{ Vite::image('all_employeesNotifications.png')}}" class="" width="150px">
            <div class="card-departments-child" style="background-color:white; color:#34959C"> إشعارات الموظفين
            </div>

        </div>




    </div>
    @livewire('components.notifications.notifications-sender', key('notifications-sender'))
    {{-- @section('script')
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
    @endsection --}}
</div>