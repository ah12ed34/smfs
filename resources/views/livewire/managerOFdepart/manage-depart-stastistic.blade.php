@section('nav')
@livewire('components.nav.managerOFdepart.manag-depart-main ')
@endsection

<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="content">
        <div class="container"  style="padding-top: 30px;" >

        <div class="cards-child-stastics">
            <label class="cards-child-title">   الطلاب
        </label>
            <div class="cards-child-numbers">0</div>
            <img src="{{Vite::image("students.png")}}" class="image-stastic" width="50px">
        </div>

        <div class="cards-child-stastics">
            <label class="cards-child-title">    أعضاء هيئة التدريس
        </label>
            <div class="cards-child-numbers">0</div>
            <img src="{{Vite::image("presentation (2).png")}}" class="image-stastic" width="50px">
        </div>

        <div class="cards-child-stastics">
            <label class="cards-child-title">  مساعدين أعضاء هيئة التدريس
        </label>
            <div class="cards-child-numbers">0</div>
            <img src="{{Vite::image("presentation (2).png")}}" class="image-stastic" width="50px">
        </div>

        <div class="cards-child-stastics">
            <label class="cards-child-title">  مجموعات النظري </label>
            <div class="cards-child-numbers">0</div>
            <img src="{{Vite::image("Groups.png")}}" class="image-stastic" width="50px">
        </div>

        <div class="cards-child-stastics">
            <label class="cards-child-title">  مجموعات العملي  </label>
            <div class="cards-child-numbers">0</div>
            <img src="{{Vite::image("Groups.png")}}" class="image-stastic" width="50px">
        </div>

        <div class="cards-child-stastics">
            <label class="cards-child-title">   المواد المقررة  </label>
            <div class="cards-child-numbers">0</div>
            <img src="{{Vite::image("open-book.png")}}" class="image-stastic" width="50px">
        </div>
    </div>

</div>
</div>
