<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces"> <label  class="subjectname" >  الصفحة الرئيسية </label><img src="{{Vite::image("empoloyee_scheduls.png")}}" id="subject-icon-hdr2" width="40px">
        </button>


        <!-- <div class="dropdwon">
            <button id="" type="button" class="btn btn-light quality-subjects_terms_down dropdown-toggle" data-toggle="dropdown">
            <div class="textstudentsdrop"> ترم اول</div>
            </button>
            <div id="dropdown-menulist" class="dropdown-menu" style="width: 140px;">
                <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding:0%;text-align:center;">  ترم ثاني</a>
            </div>
        </div> -->



        <div class="dep-name">  مسؤول الجداول  </div>
    </div>

    <div class="container">

        <!-- <div class="responsive"></div> -->
        <!-- <a href="board.html"> -->
        <!-- <div class="container"> -->

        <div class="card  cards-departments" id=""  onclick="window.location='{{ route('main_sechedules') }}'">
            <img src="{{Vite::image("it.png")}}" class="" width="150px">
            <div class="card-departments-child"> تقنية المعلومات
            </div>
        </div>

        <div class="card  cards-departments" id=""  onclick="window.location='{{ route('main_sechedules') }}'">
            <img src="{{Vite::image("information-management (1).png")}}" class="" width="150px">
            <div class="card-departments-child">نظم المعلومات
            </div>
        </div>

        <div class="card  cards-departments" id=""  onclick="window.location='{{ route('main_sechedules') }}'">
            <img src="{{Vite::image("computer-science.png")}}" class="" width="150px">
            <div class="card-departments-child">  علوم الحاسوب
            </div>
        </div>

        <div class="card  cards-departments" id=""  onclick="window.location='{{ route('main_sechedules') }}'">
            <img src="{{Vite::image("security (3).png")}}" class="" width="150px">
            <div class="card-departments-child"> الأمن السيبراني
            </div>
        </div>

    </div>
</div>
