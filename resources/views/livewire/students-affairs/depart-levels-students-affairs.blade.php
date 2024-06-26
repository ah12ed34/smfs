@section('nav')
@livewire('components.nav.students-affairs.depart-levels-students-affairs-header')
@endsection


<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="container container_for_cards" style="">

            <div class="card  cards-departments depart-level-quality" id="" onclick="location.href='{{route('main_studentsAffairs')}}'">
                <img src="{{Vite::image("level1.png")}}" class="" width="150px">
                <div class="card-departments-child">  مستوى  اول
                </div>
            </div>

            <div class="card  cards-departments depart-level-quality" id="" onclick="location.href='{{route('main_studentsAffairs')}}'">
                <img src="{{Vite::image("level2.png")}}" class="" width="150px">
                <div class="card-departments-child"> مستوى ثاني
                </div>
            </div>

            <div class="card  cards-departments depart-level-quality" id="" onclick="location.href='{{route('main_studentsAffairs')}}'">
                <img src="{{Vite::image("level3.png")}}" class="" width="150px">
                <div class="card-departments-child">   مستوى ثالث
                </div>
            </div>

            <div class="card  cards-departments depart-level-quality" id="" onclick="location.href='{{route('main_studentsAffairs')}}'">
                <img src="{{Vite::image("level4.png")}}" class="" width="150px">
                <div class="card-departments-child"> مستوى  رابع
                </div>
            </div>

    </div>
</div>
