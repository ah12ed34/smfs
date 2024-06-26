@section('nav')
@livewire('components.nav.students-affairs.main-students-affairs-header')
@endsection
<div>
    {{-- Stop trying to control. --}}
    <div class="content">

        <div class="container" style="padding-top: 40px;">

        <div class="card  cards-departments" id="">
            <img src="{{Vite::image("students.png")}}" class="" width="150px" onclick="location.href='{{route('studentsAffairs_main_studentsInformation')}}'">
            <div class="card-departments-child">    بيانات الطلاب
            </div>
        </div>

        <div class="card  cards-departments" id="">
            <img src="{{Vite::image("Groups.png")}}" class="" width="150px" style="margin-top:18px;" onclick="location.href='{{route('studentsAffairs_main_studentsGroups')}}'">
            <div class="card-departments-child"> المجموعات
            </div>
        </div>

        </div>


    </div>
</div>
