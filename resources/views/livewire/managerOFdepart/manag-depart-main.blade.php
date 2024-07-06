@section('nav')
@livewire('components.nav.managerOFdepart.manag-depart-main')
@endsection

<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <div class="container" style="padding-top: 20px;">

        @forelse ($levels as $level)
        <div class="card  cards-departments depart-level-quality" id="" onclick="location.href='{{route('depart_level_Group_mainPage', $level->id)}}'" >
            <img src="{{Vite::image("level1.png")}}" class="" width="150px">
            <div class="card-departments-child">  {{$level->name}}
            </div>
        </div>
        @empty
        <div class="alert alert-warning" role="alert">
            {{ __('sysmass.no_levels_department') }}
        </div>

        @endforelse
        {{-- <div class="card  cards-departments depart-level-quality" id="" onclick="location.href='{{route('depart_level_Group_mainPage')}}'" >
            <img src="{{Vite::image("level1.png")}}" class="" width="150px">
            <div class="card-departments-child">  مستوى  اول
            </div>
        </div>

        <div class="card  cards-departments depart-level-quality" id="" onclick="location.href='{{route('depart_level_Group_mainPage')}}'">
            <img src="{{Vite::image("level2.png")}}" class="" width="150px">
            <div class="card-departments-child"> مستوى ثاني
            </div>
        </div>

        <div class="card  cards-departments depart-level-quality" id="" onclick="location.href='{{route('depart_level_Group_mainPage')}}'">
            <img src="{{Vite::image("level3.png")}}" class="" width="150px">
            <div class="card-departments-child">   مستوى ثالث
            </div>
        </div>

        <div class="card  cards-departments depart-level-quality" id="" onclick="location.href='{{route('depart_level_Group_mainPage')}}'">
            <img src="{{Vite::image("level4.png")}}" class="" width="150px">
            <div class="card-departments-child"> مستوى  رابع
            </div>
        </div> --}}

</div>

</div>
