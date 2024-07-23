@section('nav')
@livewire('components.nav.manager_of_depart.managedepartlevel.all-sechedules-studyinhg-header',
['level'=>$level,'schedules'=>$active,'groups'=>$groups,'teachers'=>$teachers
])
@endsection
<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

        <div class="container" style=" padding-top: 10px;">

            <div   class="card w-100 h-100 right-6 left-0 top-2  " id="card-img-schedule" >
                <div class="card  maxh-10 w-100 right-0 left-0 top-0  badge-primary text-bg-light text-center font-medium" id="card-title-schedule" >  جدول الأكادميين</div>
                {{-- <img class="img-fluid" src="{{$academic->schedule? asset('storage/'.$academic->schedule):null}}" alt='جدوال'  width="600px" height="350px"> --}}
                <img class="img-fluid" src="{{Vite::image("studstudyingScheule.png")}}"  width="600px" height="350px" style="padding-top: 20px">
            </div>

            <div   class="card w-100 h-100 right-6 left-0 top-2 " id="card-img-schedule">
                <div class="card h-10 w-100 right-0 left-0 top-0  badge-primary text-bg-light text-center font-medium" id="card-title-schedule" >  جدول الطلاب</div>
                <img class="img-fluid" src="{{Vite::image("studstudyingScheule.png")}}"  width="600px" height="350px" style="padding-top: 20px">
            </div>

            <div   class="card w-100 h-100 right-6 left-0 top-2 " id="card-img-schedule">
                <div class="card h-10 w-100 right-0 left-0 top-0  badge-primary text-bg-light text-center font-medium"  id="card-title-schedule" >  جدول القاعات</div>
                <img class="img-fluid" src="{{Vite::image("studstudyingScheule.png")}}"  width="600px" height="350px" style="padding-top: 20px">
            </div>


            </div>
    </div>
</div>
