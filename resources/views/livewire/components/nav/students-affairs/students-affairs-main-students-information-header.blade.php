<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces"> <label  class="subjectname" style="margin-left: -10px;">  الصفحة الرئيسية </label><img src="{{Vite::image("dashboard (1).png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
        </button>



    <div class="dep-name">{{ $level->department->name }}</div>

    <div id="" class="input-group input_search_studentsAffairs_studentInfo">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-append">
            <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
        </div>
    </div>

    <button type="submit" class="btn btn-primary btn-sm btn_uploade_file_information_students " id="" data-toggle="modal" data-target="#UploadeFileModal"> رفع ملف<img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left; margin-left:0px;" ></button>

    <button type="submit" class="btn btn-primary btn-sm  btn_studentsAffairs_AddStudent" id="" data-toggle="modal" data-target="#AddaStudentModal"> اضافة طالب<img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button>


    </div>
     <div class="hr3">
        <button id="spacesbtn" class="spaces" onclick="location.href='{{route('main_studentsAffairs', $level->id
        )}}'"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px"></button>

       {{-- " <div id="input-groupstudyingbooks" class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
            </div>
        </div>
        <td><button type="submit" class="btn btn-primary btn-sm" id="btn-uploade-grades" data-toggle="modal" data-target="#myModal"> رفع ملف<img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button> </td>" --}}

    </div>

</div>
