@section('nav')
@livewire('components.nav.admin.admin-nv-header')
@endsection
<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="container" style="padding-top: 30px;">
        <div class="cards-child-stastics">
            <label class="cards-child-title">   الطلاب
        </label>
            {{-- <div class="cards-child-numbers">{{ $totleStudents }}</div> --}}
            <div class="cards-child-numbers">68</div>
            <img src="{{ Vite::image('students.png') }}" class="image-stastic" width="50px">
        </div>

        <div class="cards-child-stastics">
            <label class="cards-child-title">    أعضاء هيئة التدريس
        </label>
            {{-- <div class="cards-child-numbers">{{ $totleTeachers}}</div> --}}
            <div class="cards-child-numbers">48</div>

            <img src="{{ Vite::image('presentation (2).png') }}" class="image-stastic" width="50px">
        </div>

        <div class="cards-child-stastics">
            <label class="cards-child-title">  مساعدين أعضاء هيئة التدريس
        </label>
            <div class="cards-child-numbers">0</div>
            <img src="{{ Vite::image('presentation (2).png') }}" class="image-stastic" width="50px">
        </div>
    </div>
</div>
