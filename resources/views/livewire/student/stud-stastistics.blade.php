@section('title', 'الإحصائيات')
@section('nav')
    {{-- @livewire('components.nav.student.nav-stud-stastistics') --}}


<div  class="hdr2" style=" box-shadow: 10px;">
    <button class="spaces"> <label  class="subjectname"> الإحصائيات </label><img src="{{Vite::image("bar-chart (4).png")}}" id="subject-icon-hdr2" width="40px">
    </button>
    {{-- <div class="dropdwon">
        <button id="btn-studybookStudentsdropdown-levels" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
        <div class="textstudentsdrop">      مستوى رابع | ترم ثاني</div>
       </button>
        <div id="dropdown-menulist" class="dropdown-menu" style="width: 140px;">
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding:0%;text-align:center;"> مستوى رابع | ترم أول</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding:0%;text-align:center;"> مستوى ثالث | ترم اول</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding:0%;text-align:center;"> مستوى ثالث | ترم ثاني</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding:0%;text-align:center;"> مستوى ثاني | ترم أول</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding:0%;text-align:center;"> مستوى ثاني | ترم ثاني</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding:0%;text-align:center;"> مستوى أول | ترم أول</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding:0%;text-align:center;"> مستوى أول | ترم ثاني</a>

        </div>
    </div> --}}

    <div class="dep-name">{{ auth()->user()->student->department->name }} </div>

</div>


<div  class="hr3">
    <a href="{{route("student")}}">    <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px" ></button></a>
{{--
    <div id="input-groupstudent" class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-append">
            <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
        </div>
    </div>


    <td><button type="submit" class="btn btn-primary btn-sm" id="btn-uploade-grades" data-toggle="modal" data-target="#myModal"> رفع الدرجات<img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button> </td> --}}

</div>


@endsection
<div>
    {{-- Stop trying to control. --}}

<div class="container" id="container-project" style="  padding-top: 30px;">



    <div>


        <a
        {{-- href="{{route("worksStasticsAssignements")}}" --}}
        >
        <div class="cards-child-stastics">
            <label class="cards-child-title">  تكاليف لم يتم تسليمها
        </label>
            <div class="cards-child-numbers">{{ $assignementsnotsent }}</div>
            <img src="{{Vite::image("homework (3).png")}}" class="image-stastic" width="50px">
        </div>
        </a>

        <a
        {{-- href="{{route("worksStasticsAssignements")}}" --}}
        >
        <div class="cards-child-stastics">
            <label class="cards-child-title"> تكاليف تم تسليمها</label>
            <div class="cards-child-numbers">{{ $assignementssent }}</div>
            <img src="{{Vite::image("homework (3).png")}}" class="image-stastic" width="50px">
        </div>
        </a>

        <a
        {{-- href="{{route("worksStasticsProjects")}}" --}}
        >
        <div class="cards-child-stastics">
            <label class="cards-child-title">  مشاربع لم يتم تسليمها</label>
            <div class="cards-child-numbers">{{ $projectsUnfinished }}</div>
            <img src="{{Vite::image("project-management.png")}}" class="image-stastic" width="50px">
        </div>
        </a>

        <a
        {{-- href="{{route("worksStasticsProjects")}}" --}}
        >
        <div class="cards-child-stastics">
            <label class="cards-child-title"> مشاربع تم تسليمها</label>
            <div class="cards-child-numbers">{{ $projectsFinished }}</div>
            <img src="{{Vite::image("project-management.png")}}" class="image-stastic" width="50px">
        </div>
        </a>

    </div>

    {{-- <div class="card" id="statistics-container">

        <div style="margin-top:0px">نسبة نجاح الطلاب</div>
        <div style="float: left; margin-top:45px; margin-left:5px;">100% <br>90% <br>80%<br> 70%<br> 60% <br>50% <br>40% <br>30%<br> 20%<br> 10%</div>
        <div class="card" id="card-stastic" style="max-height:100%;"></div>
        <div class="card" id="card-stastic" style="max-height:60%;"></div>
        <div class="card" id="card-stastic" style="max-height:40%;"></div>
        <div class="card" id="card-stastic" style="max-height:10%;"></div>
        <div class="card" id="card-stastic" style="max-height:1%;"></div>
        <br>
        <label id="labelstatisc" style="margin-left: 60px;">ممتاز</label>
        <label id="labelstatisc">جيد جدا</label>
        <label id="labelstatisc"> جيد </label>
        <label id="labelstatisc">مقبول </label>
        <label id="labelstatisc">راسب</label>
    </div>


    <div class="card" id="statistics-container">
        <div style="margin-top:0px"> نسبة حضور الطلاب</div>

        <div style="float: left; margin-top:45px; margin-left:5px;">100% <br>90% <br>80%<br> 70%<br> 60% <br>50% <br>40% <br>30%<br> 20%<br> 10%</div>
        <div class="card" id="card-stastic-2" style="max-height:100%;margin-left:-10px;"></div>
        <div class="card" id="card-stastic-2" style="max-height:60%;"></div>
        <div class="card" id="card-stastic-2" style="max-height:40%;"></div>
        <div class="card" id="card-stastic-2" style="max-height:10%;"></div>
        <div class="card" id="card-stastic-2" style="max-height:1%;"></div>
        <div class="card" id="card-stastic-2" style="max-height:100%;"></div>
        <div class="card" id="card-stastic-2" style="max-height:60%;"></div>
        <div class="card" id="card-stastic-2" style="max-height:40%;"></div>
        <div class="card" id="card-stastic-2" style="max-height:10%;"></div>
        <div class="card" id="card-stastic-2" style="max-height:1%;"></div>
        <div class="card" id="card-stastic-2" style="max-height:100%;"></div>
        <div class="card" id="card-stastic-2" style="max-height:60%;"></div>
        <br> --}}
        <!-- <div>1&nbsp;&nbsp;&nbsp; 2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3 4 5 6 7 8 9 10 12&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div> -->
        {{-- <label id="labelstatisc-2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1</label>
        <label id="labelstatisc-2"> &nbsp;&nbsp;2 </label>
        <label id="labelstatisc-2">&nbsp;3&nbsp; </label>
        <label id="labelstatisc-2">&nbsp;4</label>
        <label id="labelstatisc-2"> &nbsp;5</label>
        <label id="labelstatisc-2"> &nbsp;6 </label>
        <label id="labelstatisc-2">&nbsp;7</label>
        <label id="labelstatisc-2">&nbsp;&nbsp;8</label>
        <label id="labelstatisc-2"> &nbsp;9</label>
        <label id="labelstatisc-2">10 </label>
        <label id="labelstatisc-2">11</label>
        <label id="labelstatisc-2">12</label>

    </div> --}}
</div>

</div>
