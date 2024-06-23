@section('nav')
@livewire('components\nav\admin.send-notifications-managers-header')
@endsection
<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="container notification_chatting" >


        <div id="" class="card card-sentnotifications">


        <div id="" class="card card-sentnotifications-chating">
            </div>
            <div class="input-group mb-3">
                <input id="input-sentnotifications" type="text" class="form-control" placeholder="اكتب...">
                <div class="input-group-append">
                    <button id="" class="btn btn-light btn-send" type="submit"><img src="{{ Vite::image('send.png')}}"   width="24px" ></button>
                </div>
            </div>
        </div>
    </div>

</div>
