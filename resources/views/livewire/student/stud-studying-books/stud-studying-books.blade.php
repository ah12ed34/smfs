@section('title', 'stud-studying-books')
@section("nav")
    @livewire('components.nav.student.stud-studying-books.stud-studying-books'
    ,[ 'active'=>'ssb','department_name'=>$user->student->department->name
    ])
@endsection
<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="container"  style="padding-top:30px;">

        @forelse ($subjects as $subject)
            <div class="card" id="cards-subject-students" onclick="location.href='{{route('student-booksChapters',
                [
                    $subject->id
                ]
            )}}'">
                <img src="{{Vite::image("allocation (1).png")}}" class="" width="150px">
                <div class="card-subject-child">{{ $subject->subject()->name_en ." - ".$subject->subject()->name_ar }}<br>{{ $subject->teacher->user->name }}
                </div>
            </div>

        @empty
            <div class="card" id="cards-subject-students">
                <img src="{{Vite::image("allocation (1).png")}}" class="" width="150px">
                <div class="card-subject-child"> لا يوجد مواد دراسية
                </div>
            </div>
        @endforelse


        {{-- <div class="card" id="cards-subject-students">
            <img src="{{Vite::image("ecommerce-website.png")}}" class="" width="150px">
            <div class="card-subject-child"> E-Commerce التجارة الإلكترونية <br>د.اكرم عثمان
            </div>
        </div>

        <div class="card" id="cards-subject-students">
            <img src="{{Vite::image("digital.png")}}" class="" width="150px">
            <div class="card-subject-child"> Digital investigation التحقيق الرقمي <br>د. عبدالله المختار
            </div>
        </div> --}}


        </div>
</div>
