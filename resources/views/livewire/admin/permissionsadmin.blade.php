@section('nav')
@livewire('components.nav.admin.department', ['active' => 'department'])
@endsection
<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="container" style="padding-top:30px ;">
        <div class="card  cards-departments" id="">
            <img src="{{ Vite::image('shield.png')}}" class="" width="150px">
            <div class="card-departments-child" style="background-color:white; color:#0E70F2">  صلاحيات المستخدمين
            </div>
        </div>

        <div class="card  cards-departments" id="">
            <img src="{{ Vite::image('permissions-Subject.png')}}" class="" width="150px">
            <div class="card-departments-child"  style="background-color:white; color:#0E70F2"> إضافة مستخدم
            </div>
        </div>

</div>

</div>
