@section('nav')
@livewire('components.nav.admin.admin-nv-header')
@endsection
<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="container" style="padding-top:30px;">

        <div class="card  cards-departments" id="">
            <img src="{{ Vite::image('managers.png')}}" class="" width="150px">
            <div class="card-departments-child">     الأداريين
            </div>
        </div>

    <div class="card  cards-departments" id="">
        <img src="{{ Vite::image('studentsAffairs.png')}}" class="" width="150px">
        <div class="card-departments-child">  موظفين شؤون الطلاب
        </div>
    </div>

    <div class="card  cards-departments" id="">
        <img src="{{ Vite::image('controll.png')}}" class="" width="150px">
        <div class="card-departments-child"> موظفين الكنترول
        </div>
    </div>

    <div class="card  cards-departments" id="">
        <img src="{{ Vite::image('empoloyee_scheduls.png')}}" class="" width="150px">
        <div class="card-departments-child">   موظفين الجداول
        </div>
    </div>

    <div class="card  cards-departments" id="">
        <img src="{{ Vite::image('quality.png')}}" class="" width="150px">
        <div class="card-departments-child"> موظفين الجودة
        </div>
    </div>

</div>
</div>
