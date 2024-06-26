@section('nav')
@livewire('components.nav.managerOFdepart.manag-depart-main ')
@endsection

<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

        <div class="container"  style="padding-top: 40px;" >

        <div class="card  cards-departments" id="" onclick="location.href='{{route('sendnotification_managerdepart_student')}}'">
            <img src="{{Vite::image("studentnotif.png")}}"class="" width="150px">
            <div class="card-departments-child" style="background-color:white; color:#34959C">   إشعارات الطلاب
            </div>
        </div>

        <div class="card  cards-departments" id="" onclick="location.href='{{route('sendnotification_managerdepart_academic')}}'">
            <img src="{{Vite::image("instructorsnotif.png")}}" class="" width="150px">
            <div class="card-departments-child"  style="background-color:white; color:#34959C"> إشعارات المعلمين
            </div>
        </div>
    </div>
</div>

