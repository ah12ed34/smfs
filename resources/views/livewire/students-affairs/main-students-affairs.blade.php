@section('nav')
@livewire('components.nav.students-affairs.main-students-affairs-header', ['level' => $level])
@endsection
<div>
    {{-- Stop trying to control. --}}

    <div class="container " style="padding-top:30px">

        <div class="card  cards-departments" id="">
            <img src="{{Vite::image("students.png")}}" class="" width="150px" onclick="location.href='{{route('studentsAffairs_main_studentsInformation', $level->id)}}'">
            <div class="card-departments-child">    بيانات الطلاب
            </div>
        </div>

        <div class="card  cards-departments" id="">
            <img src="{{Vite::image("Groups.png")}}" class="" width="150px" style="margin-top:18px;" onclick="location.href='{{route('studentsAffairs_main_studentsGroups', $level->id)}}'">
            <div class="card-departments-child"> المجموعات
            </div>
        </div>

        </div>



</div>
