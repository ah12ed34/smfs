@section('nav')
@livewire('components\nav\admin.admin-nv-header')
@endsection
<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}



    <div class="container" style="padding-top: 30px;">

        {{-- @forelse ($departments as $department)
<a href="{{ route('department.levels',$department->id) }}" style="text-decoration: none; color: black;" >
    <div class="card  cards-departments" id="{{ $loop->index }}">
        <img src="{{ Vite::image('it.png') }}" class="" width="150px">
        <div class="card-departments-child"> {{ $department->name }}</div>
    </div>
</a> --}}

<div class="card  cards-departments" id="">
        <img src="{{Vite::image("it.png")}}" class="" width="150px">
        <div class="card-departments-child"> تقنية المعلومات
        </div>
    </div>

    <div class="card  cards-departments" id="">
        <img src="{{Vite::image("information-management (1).png")}}" class="" width="150px" >
        <div class="card-departments-child">نظم المعلومات
        </div>
    </div>

    <div class="card  cards-departments" id="">
        <img src="{{Vite::image("computer-science.png")}}" class="" width="150px">
        <div class="card-departments-child">  علوم الحاسوب
        </div>
    </div>

    <div class="card  cards-departments" id="">
        <img src="{{Vite::image("security (3).png")}}" class="" width="150px">
        <div class="card-departments-child"> الأمن السيبراني
        </div>
    </div>

</div>
</div>

