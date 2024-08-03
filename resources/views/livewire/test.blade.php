<div>
    {{-- The whole world belongs to you. --}}

    {{-- <input type="file" wire:model='file' id="file" name="file" class="form-control"
        accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" /> --}}

    <button type="button" class="btn btn-primary" wire:click='uploadFile'>upload File</button>
    <button type="button" class="btn btn-primary" wire:click='setA'>Open
        students</button>
    {{-- <button type="button" class="btn btn-primary" wire:click='setA("HOD")' data-toggle="modal"
        data-target="#ModalSendNotifictionsStudents">Open
        الاقسام</button> --}}

    <!-- The Modal -->
    {{-- @livewire('components.notifications.notifications-sender', ['NotificationActive' => $notiActive],
    key('notifications-sender')) --}}
    {{--
    <livewire:components.notifications.notifications-sender :NotificationActive=$notiActive /> --}}
</div>
