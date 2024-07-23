@section('nav')
@livewire('components.nav.quality.quality-departments')
@endsection
<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

        <!-- <div class="responsive"></div> -->
        <!-- <a href="board.html"> -->
        <div class="container" style="padding-top: 30px">

        <div class="card  cards-departments" id="" onclick="window.location='{{ route('departlevelquality')}}'">
            <img src="{{Vite::image("it.png")}}" class="" width="150px">
            <div class="card-departments-child"> تقنية المعلومات
            </div>
        </div>

        <div class="card  cards-departments" id="" onclick="window.location='{{ route('departlevelquality')}}'">
            <img src="{{Vite::image("information-management (1).png")}}" class="" width="150px">
            <div class="card-departments-child">نظم المعلومات
            </div>
        </div>

        <div class="card  cards-departments" id="" onclick="window.location='{{ route('departlevelquality')}}'">
            <img src="{{Vite::image("computer-science.png")}}" class="" width="150px">
            <div class="card-departments-child">  علوم الحاسوب
            </div>
        </div>

        <div class="card  cards-departments" id="" onclick="window.location='{{ route('departlevelquality')}}'">
            <img src="{{Vite::image("security (3).png")}}" class="" width="150px">
            <div class="card-departments-child"> الأمن السيبراني
            </div>
        </div>

    </div>
</div>
