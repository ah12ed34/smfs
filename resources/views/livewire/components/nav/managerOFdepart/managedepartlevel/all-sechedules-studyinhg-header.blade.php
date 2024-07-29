<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces"> <label  class="subjectname" style="margin-left: -10px;">   {{ auth()->user()?->academic?->department?->name }} </label><img src="{{Vite::image("it.png")}}" id="subject-icon-hdr2" width="40px" style="">
        </button>



@include('components.layouts.manager_department.header')
                <div class="dep-name">{{ auth()->user()?->academic?->department?->name }}</div>

                {{-- <div class="dropdown">
                    <button type="button"  class="btn btn-light MnageDepart_sechedule_studentsGroups_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                            <div class="textdropdown">{{ (
                                isset($active['group']) && $active['group'] != 'all'
                            )? $groups->where('id',$active['group'])->first()->name : 'كل المجموعات'}}</div>
                        </button>
                        <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">

                            <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   مجموعة(1)</a>
                            <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  مجموعة(2)</a>
                            <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  مجموعة(3)</a>

                        </div>
                    </div> --}}

                    {{-- <div class="dropdown">
                        <button type="button"  class="btn btn-light MnageDepart_sechedule_Teacher_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                                <div class="textdropdown">    <label class="hidpartname_dropdown">حسب </label>المدرس</div>
                            </button>
                            <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">

                                <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  ******</a>

                            </div>
                        </div> --}}
                        {{-- @dd($active['teacher']) --}}
                        {{-- @include('components.navSelect.teacher')
                        <div class="dropdown">
                            <button type="button"  class="btn btn-light MnageDepart_sechedule_classrooms_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                                    <div class="textdropdown">     <label class="hidpartname_dropdown">جدول </label>القاعات</div>
                                </button>
                                <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">

                                    <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  ******</a>

                                </div>
                            </div>
{{-- --}}

<div id="" class="input-group input_search_manageDepart_StudentsGroups">
    <input type="text" class="form-control" placeholder="Search" wire:model="search" wire:keydown.enter='srch'>
    <div class="input-group-append">
        <button id="form-control" class="btn btn-light" type="submit" wire:click='srch'><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
    </div>
</div>

        <!-- <td><button type="submit" class="btn btn-primary btn-sm  manageDepart-addAcademic" id="" data-toggle="modal" data-target="#addacademic"> اضافة اكاديمي<img src="../../images/plus.png"  width="20px" style="float: left;"></button> </td> -->


    </div>

    <div class="hr3">
        <button id="spacesbtn" class="spaces" onclick="location.href='{{route('managerDepartment',$parameters)}}'"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px"></button>

        <!-- <div id="input-groupstudyingbooks" class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"><img src="../images/magnifying-glass (2).png" id="spaces2"  width="20px" ></button>
            </div>
        </div>
        <td><button type="submit" class="btn btn-primary btn-sm" id="btn-uploade-grades" data-toggle="modal" data-target="#myModal"> رفع ملف<img src="../images/plus.png"  width="20px" style="float: left;"></button> </td> -->

    </div>
</div>
