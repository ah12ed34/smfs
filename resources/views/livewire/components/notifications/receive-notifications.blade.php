<div>
    {{-- Stop trying to control. --}}
    <!-- The Modal1 -->
    <div class="modal fade" id="myModalnotification" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content" style="background-color: #F6F7FA;height:500px;">

                <!-- Modal Header -->
                <div class="modal-header" id="modheader" style="padding-left: 45%">
                    الاشعارات
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id="notification-bord-messages">

                    {{-- <div class="senders">

                    <div class="card" id="sendersMessages"> السلام عليكم ورحمة الله وبركاته
                        <div class="sendingdate">
                            pm.10:24
                        </div>
                    </div>

                </div> --}}

                    <div class="recivers-notif">
                        @foreach ($notifications as $notification)
                            <div class="card" id="recivers-notifi-Messages">
                                <div class="sender-notifi">{{ $notification->name }}</div>
                                {{ $notification->message }}
                                <div class="recivin-notifi-date">
                                    {{ $notification->created_at->format('h:i A') }}
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="card" id="recivers-notifi-Messages">
                            <div class="sender-notifi"> الادمن</div>وعليكم السلام ورحمة الله وبركاته
                            <div class="recivin-notifi-date">
                                pm.10:24
                            </div>
                        </div> --}}

                    </div>



                </div>

                <!-- Modal footer -->
                <div class="modal-footer" style="height: 30px; background-color: #0E70F2; ">

                </div>

            </div>
        </div>
    </div>

    @script
        <script>
            $wire.on('notification', ($unread) => {
                // console.log('notification');
                var number = parseInt($unread);
                if (number > 0) {
                    if ($('.badge').length > 0) {
                        $('.badge').remove();
                    }
                    $('.notification').append(`
                        <span class="badge badge-danger">${number}</span>
                    `);
                } else {
                    $('.badge').remove();
                }
            });

            $('#myModalnotification').on('show.bs.modal', function(event) {
                $wire.call('readNotifications');
                // $(".badge").remove();
            });
            (function() {
                let ipadress = '127.0.0.1';
                // 3000
                let port = '3000';
                let url = 'https://server-v02x.onrender.com/';
                let socket = io(url);
                console.log(socket);
                let channel = 'notifi_';
                let userData = {!! json_encode(auth()->user()->id) !!};
                // console.log(userData);
                // receiveNotificationToUser_2
                socket.on('connect', function() {
                    console.log('connected');

                });
                socket.on(channel + userData, function(data) {
                    $wire.dispatch('notification', data);
                });
            })();
        </script>
    @endscript
    @section('script')
        {{-- <script type="module">

        </script> --}}
    @endsection
</div>
