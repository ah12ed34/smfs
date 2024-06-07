@section('nav')
@livewire('components\nav\managerOFdepart.managedepartlevel.manage-depart-students-final-works-statistics-header')
@endsection
<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="content">

        <div class="container" style="overflow:aute;" style="top: 30px;">



                <div class="cards-child-stastics">
                    <label class="cards-child-title">   الراسبين
                </label>
                    <div class="cards-child-numbers">0</div>
                    <img src="{{Vite::image("students.png")}}" class="image-stastic" width="50px">
                </div>

                <div class="cards-child-stastics">
                    <label class="cards-child-title">   الناجحين
                </label>
                    <div class="cards-child-numbers">0</div>
                    <img src="{{Vite::image("students.png")}}" class="image-stastic" width="50px">
                </div>

                <div class="cards-child-stastics">
                    <label class="cards-child-title">  تكاليف لم يتم تسليمها
                </label>
                    <div class="cards-child-numbers">0</div>
                    <img src="{{Vite::image("homework (3).png")}}" class="image-stastic" width="50px">
                </div>

                <div class="cards-child-stastics">
                    <label class="cards-child-title"> تكاليف تم تسليمها</label>
                    <div class="cards-child-numbers">0</div>
                    <img src="{{Vite::image("homework (3).png")}}" class="image-stastic" width="50px">
                </div>

                <div class="cards-child-stastics">
                    <label class="cards-child-title">  مشاربع لم يتم تسليمها</label>
                    <div class="cards-child-numbers">0</div>
                    <img src="{{Vite::image("project-management.png")}}" class="image-stastic" width="50px">
                </div>

                <div class="cards-child-stastics">
                    <label class="cards-child-title"> مشاربع تم تسليمها</label>
                    <div class="cards-child-numbers">0</div>
                    <img src="{{Vite::image("project-management.png")}}" class="image-stastic" width="50px">
                </div>


            </div>


    </div>
</div>
