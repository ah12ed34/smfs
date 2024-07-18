@section('nav')
@livewire('components.nav.manager_of_depart.managedepartlevel.manage-depart-students-final-tearm-statistics-header',['level'=>$level
,'groups'=>$groups,'subjects'=>$subjects,'active'=>$active,'terms'=>$terms])
@endsection
<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

        <div class="container"  style="padding-top: 30px; overflow:aute;">



                <div class="cards-child-stastics" onclick="location.href='{{route('final_results_students',$level?->id)}}'">
                    <label class="cards-child-title">   الراسبين
                </label>
                    <div class="cards-child-numbers">{{ $studentsFail }}</div>
                    <img src="{{Vite::image("students.png")}}" class="image-stastic" width="50px">
                </div>

                <div class="cards-child-stastics" onclick="location.href='{{route('final_results_students',[$level?->id])}}'">
                    <label class="cards-child-title">   الناجحين
                </label>
                    <div class="cards-child-numbers">{{ $studentsSuccess }}</div>
                    <img src="{{Vite::image("students.png")}}" class="image-stastic" width="50px">
                </div>

                <div class="cards-child-stastics" onclick="location.href='{{route('final_results_students',[$level?->id])}}'">
                    <label class="cards-child-title">    الطلاب الأوئل  </label>
                    <div class="cards-child-numbers">{{ $studentsFirst }}</div>
                    <img src="{{Vite::image("students.png")}}" class="image-stastic" width="50px">
                </div>

                <div class="cards-child-stastics" onclick="location.href='{{route('final_results_students',[$level?->id])}}'">
                    <label class="cards-child-title">  إجمالي عدد الطلاب
                </label>
                    <div class="cards-child-numbers">{{ $studentsCount }}</div>
                    <img src="{{Vite::image("students.png")}}" class="image-stastic" width="50px">
                </div>
                <div class="cards-child-stastics" >
                    <label class="cards-child-title">  إجمالي عدد ass
                </label>
                    <div class="cards-child-numbers">{{ $studentsCountDeliveries }}</div>
                    <img src="{{Vite::image("students.png")}}" class="image-stastic" width="50px">
                </div>
                <div class="cards-child-stastics" >
                    <label class="cards-child-title">  
                </label>
                    <div class="cards-child-numbers">{{ $studentsCountGroupProjects }}</div>
                    <img src="{{Vite::image("students.png")}}" class="image-stastic" width="50px">
                </div>

            </div>


    </div>
