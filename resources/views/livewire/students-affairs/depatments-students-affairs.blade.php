
@section('nav')
@livewire('components.nav.students-affairs.depatments-students-affairs-header')
@endsection
<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="container" style="padding-top: 20px;">

        <!-- <div class="responsive"></div> -->
        <!-- <a href="board.html"> -->
        <!-- <div class="container"> -->

            @forelse ($departments as $department)
                <div class="card  cards-departments" id="" onclick="location.href='{{route('depart_levels_studentsAffairs', [$department->id]
                )}}'">
                    <img src="{{Vite::image("it.png")}}" class="" width="150px">
                    <div class="card-departments-child"> {{$department->name}}
                    </div>
                </div>

            @empty
                <div class="alert alert-danger" role="alert">
                    لا يوجد أقسام
                </div>
            @endforelse
        {{-- <div class="card  cards-departments" id="" onclick="location.href='{{route('depart_levels_studentsAffairs')}}'">
            <img src="{{Vite::image("it.png")}}" class="" width="150px">
            <div class="card-departments-child"> تقنية المعلومات
            </div>
        </div> --}}

        {{-- <div class="card  cards-departments" id="" onclick="location.href='{{route('depart_levels_studentsAffairs')}}'">
            <img src="{{Vite::image("information-management (1).png")}}" class="" width="150px" >
            <div class="card-departments-child">نظم المعلومات
            </div>
        </div>

        <div class="card  cards-departments" id="" onclick="location.href='{{route('depart_levels_studentsAffairs')}}'">
            <img src="{{Vite::image("computer-science.png")}}" class="" width="150px">
            <div class="card-departments-child">  علوم الحاسوب
            </div>
        </div>

        <div class="card  cards-departments" id="" onclick="location.href='{{route('depart_levels_studentsAffairs')}}'">
            <img src="{{Vite::image("security (3).png")}}" class="" width="150px">
            <div class="card-departments-child"> الأمن السيبراني
            </div>
        </div> --}}


    </div>
</div>


