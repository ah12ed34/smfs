<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces"> <label  class="subjectname" >   مسؤول الجداول </label><img src="{{Vite::image("empoloyee_scheduls.png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
        </button>


        <!-- <div class="dropdwon">
            <button id="" type="button" class="btn btn-light quality-subjects_terms_down dropdown-toggle" data-toggle="dropdown">
            <div class="textstudentsdrop"> ترم اول</div>
            </button>
            <div id="dropdown-menulist" class="dropdown-menu" style="width: 140px;">
                <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding:0%;text-align:center;">  ترم ثاني</a>
            </div>
        </div> -->



        <div class="dep-name">{{ $department->name }}</div>
    </div>
    <div class="hr3">
    <button id="spacesbtn" class="spaces" onclick="window.location='{{ route('departments_sechedules',[$department->id]) }}'"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px"></button>

        <!-- <div id="input-groupstudyingbooks" class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"><img src="../images/magnifying-glass (2).png" id="spaces2"  width="20px" ></button>
            </div>
        </div> -->
        <!-- <button type="submit" class="btn btn-primary  btn-dispaydatasubject"  > البيانات</button>

        <button type="submit" class="btn btn-primary btn-sm  btn-addsubject" id="" data-toggle="modal" data-target="#create-subject"> اضافة مادة<img src="../../images/plus.png"  width="20px" style="float: left;"></button> -->

</div>

    <div class="container" style="padding-top: 40px;">

    <div class="card  cards-departments" id="">
        <img src="{{Vite::image("students.png")}}" class="" width="150px" onclick="location.href='{{route('levels_sechedules',[$department->id])}}'">
        <div class="card-departments-child">    جدول الطلاب
        </div>
    </div>

    <div class="card  cards-departments" id="">
        <img src="{{Vite::image("academics.png")}}" class="" width="150px"  onclick="location.href='{{route('academics_sechedules',[$department->id])}}'">
        <div class="card-departments-child"> جدول الأكادميين
        </div>
    </div>

    </div>



</div>
