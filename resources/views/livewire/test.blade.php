<div>
    {{-- The whole world belongs to you. --}}
    <button type="button" class="btn btn-primary" wire:click='setA("student_a")' data-toggle="modal"
        data-target="#ModalSendNotifictionsStudents">Open
        students</button>
    <button type="button" class="btn btn-primary" wire:click='setA("HOD")' data-toggle="modal"
        data-target="#ModalSendNotifictionsStudents">Open
        الاقسام</button>

    <!-- The Modal -->
    @livewire('components.notifications.notifications-sender', ['NotificationActive' => $notiActive],
    key('notifications-sender'))
    {{--
    <livewire:components.notifications.notifications-sender :NotificationActive=$notiActive /> --}}
</div>