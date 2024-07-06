@section('nav')
@livewire('components.nav.manager_of_depart.managedepartlevel.booksofdepart-level-header')
@endsection
<div>
    {{-- Success is as dangerous as failure. --}}

        <div class="container"  style="padding-top:30px;">

            <div class="card" id="cards-subject-students" onclick="location.href='{{route('depart_level_booksChapters')}}'">
                <img src="{{Vite::image("allocation (1).png")}}" class="" width="150px">
                <div class="card-subject-child"> Distributed System نظم تشغيل <br>أ.منال العريقي
                </div>
            </div>

            <div class="card" id="cards-subject-students" onclick="location.href='{{route('depart_level_booksChapters')}}'">
                <img src="{{Vite::image("ecommerce-website.png")}}" class="" width="150px" >
                <div class="card-subject-child"> E-Commerce التجارة الإلكترونية <br>د.اكرم عثمان
                </div>
            </div>

            <div class="card" id="cards-subject-students" onclick="location.href='{{route('depart_level_booksChapters')}}'">
                <img src="{{Vite::image("digital.png")}}" class="" width="150px">
                <div class="card-subject-child"> Digital investigation التحقيق الرقمي <br>د. عبدالله المختار
                </div>
            </div>

    </div>
</div>
