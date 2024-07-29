<div>
    {{-- Success is as dangerous as failure. --}}

    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces" onclick="window.location='{{ route('admin.department') }}'"> <label class="subjectname" style="margin-left: -10px;"> الأدمن </label><img src="{{ Vite::image('admin.png') }}" id="subject-icon-hdr2" width="40px" style="">
        </button>


        <div class="dep-name" >{{ $department_name }}</div>

        <div id="" class="input-group input_search_studentsAffairs_studentInfo">
            <input type="text" class="form-control" placeholder="Search" wire:model='search' wire:keydown.enter='srch'>
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" wire:click='srch'><img src="{{ Vite::image('magnifying-glass (2).png')}}" id="spaces2"  width="20px" ></button>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-sm btn_uploade_file_information_Users " id="" data-toggle="modal" data-target="#myModal"> رفع ملف<img src="{{ Vite::image('plus.png')}}"  width="20px" style="float: left; margin-left:0px;" ></button>

        <button type="submit" class="btn btn-primary btn-sm  btn_addEmployee_user" id="" data-toggle="modal" data-target="#AddaStudentModal" > اضافة <img src="{{ Vite::image('plus.png')}}"  width="20px" style="float: left;"></button>


    </div>

    <div class="hr3">
        <button id="spacesbtn" onclick="window.location='{{ route('admin.students_data',[ $level->id])}}'" class="spaces"> <img src="{{ Vite::image('left-arrow.png')}}" id="spaces1"  width="30px"></button>

        <!-- <div id="input-groupstudyingbooks" class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"><img src="../images/magnifying-glass (2).png')}}" id="spaces2"  width="20px" ></button>
            </div>
        </div>-->

    </div>
</div>
