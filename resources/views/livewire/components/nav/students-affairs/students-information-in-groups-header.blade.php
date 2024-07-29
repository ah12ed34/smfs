<div>
    {{-- The whole world belongs to you. --}}
    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces" onclick="location.href='{{route('StudentSaffairs')}}'"> <label  class="subjectname" style="margin-left: -10px;">  شؤون الطلاب  </label><img src="{{Vite::image("studentsAffairs.png")}}" id="subject-icon-hdr2" width="40px" style="">
        </button>

                <div class="dep-name">{{ $level?->department?->name }}</div>

        <div id="" class="input-group input_search_StudentsAffairs_StudGroupsInform">
            <input type="text" class="form-control" placeholder="Search" wire:model="search" wire:keydown.enter="srch">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px"
                    wire:click="srch"
                    ></button>
            </div>
        </div>



        <button type="submit" class="btn btn-primary btn-sm  btn_studentsAffairs_AddStudents_into_Group" id="" data-toggle="modal" data-target="#AddStudentsIntoGroupModal"> اضافة طلاب<img src="{{Vite::image("plus.png")}}"   width="20px" style="float: left;"></button>

    </div>

    <div class="hr3">
        <button id="spacesbtn" class="spaces" onclick="location.href='{{$backUrl
        }}'"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px"></button>

        <!-- <div id="input-groupstudyingbooks" class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"><img src="../images/magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
            </div>
        </div>
        <td><button type="submit" class="btn btn-primary btn-sm" id="btn-uploade-grades" data-toggle="modal" data-target="#myModal"> رفع ملف<img src="../images/plus.png")}}"  width="20px" style="float: left;"></button> </td> -->

    </div>
</div>
