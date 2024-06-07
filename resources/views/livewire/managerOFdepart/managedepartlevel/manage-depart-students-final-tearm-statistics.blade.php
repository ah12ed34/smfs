@section('nav')
@livewire('components\nav\managerOFdepart.managedepartlevel.manage-depart-students-final-tearm-statistics-header')
@endsection
<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="content">

        <div class="container"  style="padding-top: 30px; overflow:aute;">



                <div class="cards-child-stastics" onclick="location.href='{{route('final_results_students')}}'">
                    <label class="cards-child-title">   الراسبين
                </label>
                    <div class="cards-child-numbers">0</div>
                    <img src="{{Vite::image("students.png")}}" class="image-stastic" width="50px">
                </div>

                <div class="cards-child-stastics" onclick="location.href='{{route('final_results_students')}}'">
                    <label class="cards-child-title">   الناجحين
                </label>
                    <div class="cards-child-numbers">0</div>
                    <img src="{{Vite::image("students.png")}}" class="image-stastic" width="50px">
                </div>

                <div class="cards-child-stastics" onclick="location.href='{{route('final_results_students')}}'">
                    <label class="cards-child-title">    الطلاب الأوئل  </label>
                    <div class="cards-child-numbers">0</div>
                    <img src="{{Vite::image("students.png")}}" class="image-stastic" width="50px">
                </div>

                <div class="cards-child-stastics" onclick="location.href='{{route('final_results_students')}}'">
                    <label class="cards-child-title">  إجمالي عدد الطلاب
                </label>
                    <div class="cards-child-numbers">0</div>
                    <img src="{{Vite::image("students.png")}}" class="image-stastic" width="50px">
                </div>

            </div>


    </div>
</div>
