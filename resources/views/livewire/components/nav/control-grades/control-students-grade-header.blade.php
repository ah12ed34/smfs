<div>
    {{-- Success is as dangerous as failure. --}}

    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces"> <label class="subjectname"> الكنترول </label><img src="{{ Vite::image('controll.png') }}"
                id="subject-icon-hdr2" width="40px">
        </button>


        <div class="dropdwon">
            <button id="" type="button" class="btn btn-light controllgrades_terms_down dropdown-toggle"
                data-toggle="dropdown">
                <div class="textstudentsdrop"> ترم اول</div>
            </button>
            <div id="dropdown-menulist" class="dropdown-menu" style="width: 140px;">
                <a id="dropdown-students-itemlist" class="dropdown-item" href="#"
                    style="padding:0%;text-align:center;"> ترم ثاني</a>
            </div>
        </div>



        <td><button type="submit" class="btn btn-primary uploade-grades" id="" data-toggle="modal"
                data-target="#UploadeFileModal"> رفع ملف<img src="{{ Vite::image('plus.png') }}" width="20px"
                    style="float: left;"></button> </td>



        {{-- <div id="" class="input-group input-search-manageDepart">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"><img src="{{ Vite::image('magnifying-glass (2).png')}}"id="spaces2"  width="20px" ></button>
            </div>
        </div>  --}}

        <div class="dep-name">{{ $level->department->name }}</div>

        <div id="" class="input-group input_search_studentsAffairs_studentInfo">
            <input type="text" class="form-control" placeholder="Search" wire:model="search" wire:keydown='srch'>
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" wire:click='srch' type="submit"><img
                        src="{{ Vite::image('magnifying-glass (2).png') }}" id="spaces2" width="20px"></button>
            </div>
        </div>

        {{-- <button type="submit" class="btn btn-primary btn-sm btn_uploade_file_information_Users " id="" data-toggle="modal" data-target="#UploadeFileModal"> رفع ملف<img src="{{ Vite::image('plus.png')}}"  width="20px" style="float: left; margin-left:0px;" ></button>

        <button type="submit" class="btn btn-primary btn-sm  btn_addEmployee_user" id="" data-toggle="modal" data-target="#AddEmployeerModal" > اضافة <img src="{{ Vite::image('plus.png')}}"  width="20px" style="float: left;"></button> --}}


    </div>

    <div class="hr3">
        <button id="spacesbtn" onclick="window.location='{{ route('control_grades_main', $level->id) }}'"
            class="spaces">
            <img src="{{ Vite::image('left-arrow.png') }}" id="spaces1" width="30px"></button>

        <!-- <div id="input-groupstudyingbooks" class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"><img src="../images/magnifying-glass (2).png')}}" id="spaces2"  width="20px" ></button>
            </div>
        </div>-->

    </div>
</div>
