<div>
    {{-- Stop trying to control. --}}
    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces"> <label  class="subjectname" >   مسؤول الجداول </label><img src="{{Vite::image("empoloyee_scheduls.png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
        </button>

        <div class="dep-name">{{ $department->name }}</div>
    </div>
    <div class="hr3">
        <button id="spacesbtn" class="spaces"  onclick="window.location='{{ route('main_sechedules',$parameters) }}'"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px"></button>

        <!-- <div id="input-groupstudyingbooks" class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"><img src="../images/magnifying-glass (2).png" id="spaces2"  width="20px" ></button>
            </div>
        </div> -->
        <!-- <button type="submit" class="btn btn-primary  btn-dispaydatasubject"  > البيانات</button>

        <button type="submit" class="btn btn-primary btn-sm  btn-addsubject" id="" data-toggle="modal" data-target="#create-subject"> اضافة مادة<img src="../../images/plus.png"  width="20px" style="float: left;"></button> -->

</div>

<div class="container">

    @foreach ($levels as $level)
    {{-- number of loob --}}
    <div class="card  cards-departments depart-level-quality" id=""  onclick="window.location='{{ route('students_sechedules',
    $parameters+ [$level->id]
    ) }}'">
        <img src="{{Vite::image("level$loop->iteration.png")}}"
         class="" width="150px">
        <div class="card-departments-child">{{$level->name}}
        </div>
    </div>

    @endforeach

    {{-- <div class="card  cards-departments depart-level-quality" id=""  onclick="window.location='{{ route('students_sechedules') }}'">
        <img src="{{Vite::image("level1.png")}}" class="" width="150px">
        <div class="card-departments-child">  مستوى  اول
        </div>
    </div>

    <div class="card  cards-departments depart-level-quality" id=""  onclick="window.location='{{ route('students_sechedules') }}'">
        <img src="{{Vite::image("level2.png")}}" class="" width="150px">
        <div class="card-departments-child"> مستوى ثاني
        </div>
    </div>

    <div class="card  cards-departments depart-level-quality" id=""  onclick="window.location='{{ route('students_sechedules') }}'">
        <img src="{{Vite::image("level3.png")}}" class="" width="150px">
        <div class="card-departments-child">   مستوى ثالث
        </div>
    </div>

    <div class="card  cards-departments depart-level-quality" id=""  onclick="window.location='{{ route('students_sechedules') }}'">
        <img src="{{Vite::image("level4.png")}}" class="" width="150px">
        <div class="card-departments-child"> مستوى  رابع
        </div>
    </div> --}}

</div>
</div>
