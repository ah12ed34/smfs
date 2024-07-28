@section('nav')
@livewire('components.nav.manager-of-depart.managedepartlevel.books-ofdepart-level-header')
@endsection
<div>
    {{-- Success is as dangerous as failure. --}}


        <div class="container"  style="padding-top:30px;">
            @forelse ($subjects as $subject)
            <div class="card" style="overflow: hidden;"
                id="" onclick="location.href='{{route('depart_level_booksChapters',[$level->id,$subject->subjects_levels->first()->id])}}'">
                <img src="{{$subject->image ? asset('storage/'.$subject->image):Vite::image("allocation (1).png")}}" class="" width="150px">
                <div class="card-child-1" style="overflow:auto;scrollbar-width:none;
                "> {{$subject->name_ar .' '.$subject->name_en}} <br> @foreach ($subject->groupSubjects()->where('level_id',$level->id)->get()->unique('teacher_id') as $groupSubject)
                    {{$groupSubject->teacher->fname}}<br>
                @endforeach
                </div>
            </div>


            @empty
            <center style='margin-top: 25vh;'>
                <h1>لا يوجد بيانات</h1>
            </center>

            @endforelse
            {{-- <div class="card" id="cards-subject-students" onclick="location.href='{{route('depart_level_booksChapters',[$level->id])}}'">
                <img src="{{Vite::image("allocation (1).png")}}" class="" width="150px">
                <div class="card-subject-child"> Distributed System نظم تشغيل <br>أ.منال العريقي
                </div>
            </div> --}}

            {{-- <div class="card" id="cards-subject-students" onclick="location.href='{{route('depart_level_booksChapters')}}'">
                <img src="{{Vite::image("ecommerce-website.png")}}" class="" width="150px" >
                <div class="card-subject-child"> E-Commerce التجارة الإلكترونية <br>د.اكرم عثمان
                </div>
            </div>

            <div class="card" id="cards-subject-students" onclick="location.href='{{route('depart_level_booksChapters')}}'">
                <img src="{{Vite::image("digital.png")}}" class="" width="150px">
                <div class="card-subject-child"> Digital investigation التحقيق الرقمي <br>د. عبدالله المختار
                </div>
            </div> --}}
            <nav class="center-pagination">
                {{ $subjects->links(myapp::viewPagination) }}
            </nav>
        </div>
</div>
