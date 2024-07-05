<div>
    {{-- Success is as dangerous as failure. --}}

<div class="hdr2" style=" box-shadow: 10px;">
    <button class=" spaces"> <label  class="subjectname" style="margin-left: -10px;"> المقرر الدراسي </label><img src="{{Vite::image("open-book.png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
    </button>

    <div class="dropdwon">
        <button id="btn-studybookStudentsdropdown-levels" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
        <div class="textstudentsdrop">{{ ($term&&$groupStudents) ? collect($terms)->where('term',$term)->where('id',$groupStudents->id)->first()['name'] : 'الفصل الدراسي' }}</div>
       </button>
        <div id="dropdown-menulist" class="dropdown-menu" style="width: 140px;">
            @foreach ($terms as $t)
                @if ($t['id']==$groupStudents->id&&$t['term']==$term)
                    @continue
                @endif
                <a id="dropdown-students-itemlist" class="dropdown-item" style="padding:0%;text-align:center;"
                    href="{{ route(request()->route()->getName(),['term'=>$t['term'],'g'=>$t['id']]) }}"
                >{{ $t['name'] }}</a>
                {{-- @dump($t) --}}
            @endforeach

        </div>
    </div>


    <div class="dep-name">{{ $department_name }}</div>
</div>

<div class="hr3">
    <a href="{{route("student")}}">  <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px" ></button></a>

    <!-- <div id="input-groupstudyingbooks" class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-append">
            <button id="form-control" class="btn btn-light" type="submit"><img src="../images/magnifying-glass (2).png" id="spaces2"  width="20px" ></button>
        </div>
    </div> -->
    <!-- <td><button type="submit" class="btn btn-primary btn-sm" id="btn-uploade-grades" data-toggle="modal" data-target="#myModal"> رفع ملف<img src="../images/plus.png"  width="20px" style="float: left;"></button> </td> -->

</div>

</div>
