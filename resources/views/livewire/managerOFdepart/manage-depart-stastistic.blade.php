@section('nav')
@livewire('components.nav.manager_of_depart.manag-depart-main ')
@endsection

<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}

        <div class="container"  style="padding-top: 30px;" >

        <div class="cards-child-stastics">
            <label class="cards-child-title">   الطلاب
        </label>
            <div class="cards-child-numbers">{{
                $statistics['Students']
            }}</div>
            <img src="{{Vite::image("students.png")}}" class="image-stastic" width="50px">
        </div>

        <div class="cards-child-stastics">
            <label class="cards-child-title">    أعضاء هيئة التدريس
        </label>
            <div class="cards-child-numbers">{{ $statistics['Teachers'] }}</div>
            <img src="{{Vite::image("presentation (2).png")}}" class="image-stastic" width="50px">
        </div>

        <div class="cards-child-stastics">
            <label class="cards-child-title">  مساعدين أعضاء هيئة التدريس
        </label>
            <div class="cards-child-numbers">{{ $statistics['AssistantTeachers'] }}</div>
            <img src="{{Vite::image("presentation (2).png")}}" class="image-stastic" width="50px">
        </div>

        <div class="cards-child-stastics">
            <label class="cards-child-title">  مجموعات النظري </label>
            <div class="cards-child-numbers">{{ $statistics['Groups'] }}</div>
            <img src="{{Vite::image("Groups.png")}}" class="image-stastic" width="50px">
        </div>

        <div class="cards-child-stastics">
            <label class="cards-child-title">  مجموعات العملي  </label>
            <div class="cards-child-numbers">{{ $statistics['Practical Groups'] }}</div>
            <img src="{{Vite::image("Groups.png")}}" class="image-stastic" width="50px">
        </div>

        <div class="cards-child-stastics">
            <label class="cards-child-title">   المواد المقررة  </label>
            <div class="cards-child-numbers">{{ $statistics['Subjects'] }}</div>
            <img src="{{Vite::image("open-book.png")}}" class="image-stastic" width="50px">
        </div>
    </div>


</div>
