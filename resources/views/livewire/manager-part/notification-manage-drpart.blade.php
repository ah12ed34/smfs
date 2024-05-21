@section('nav')
@livewire('components\nav\manager-part.manag-depart-main ')
@endsection

<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <div class="content">
        <div class="card  cards-departments" id="">
            <img src="{{Vite::image("studentnotif.png")}}"class="" width="150px">
            <div class="card-departments-child" style="background-color:white; color:#34959C">   إشعارات الطلاب
            </div>
        </div>

        <div class="card  cards-departments" id="">
            <img src="{{Vite::image("instructorsnotif.png")}}" class="" width="150px">
            <div class="card-departments-child"  style="background-color:white; color:#34959C"> إشعارات المعلمين
            </div>
        </div>
    </div>
</div>
