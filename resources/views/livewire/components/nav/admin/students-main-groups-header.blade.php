<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces"> <label  class="subjectname" style="margin-left: -10px;">  الصفحة الرئيسية </label><img src="{{Vite::image("dashboard (1).png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
        </button>


        <div class="dropdown">
            <button type="button"  class="btn btn-light TypeStudentsGroups_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                    <div class="textdropdown">@switch($typeGroup)
                        @case('all')
                            الكل

                            @break
                        @case('sub')
                            عملي
                            @break
                        @default
                            نظري
                    @endswitch
                </button>
                <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">

                    @if($typeGroup&&$typeGroup != 'main')
                    <a id="" class="dropdown-item" href="{{ route($routeName,[$level?->id]+array_merge(request()->query(),['type'=>'main'])) }}"
                     style="padding-left:30px; ">  النظري</a>
                    @endif
                    @if($typeGroup != 'sub')
                    <a id="" class="dropdown-item" href="{{ route($routeName,[$level?->id]+array_merge(request()->query(),['type'=>'sub'])) }}"
                     style="padding-left:30px; ">  العملي</a>
                    @endif
                    {{-- <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  العملي</a> --}}
                </div>
            </div>

                <div class="dep-name">{{ $level?->department?->name }}</div>

        <div id="" class="input-group input_search_studentsAffairs_studentInfo">
            <input type="text" class="form-control" placeholder="Search" wire:model="search" wire:keydown.enter="srch()">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" wire:click='srch()' ><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-sm  btn_studentsAffairs_createGroup" id="" data-toggle="modal" data-target="#AddaStudenGroupModal"> اضافة مجموعة<img src="{{Vite::image("plus.png")}}"   width="20px" style="float: left;"></button>

    </div>

    <div class="hr3">
        <button id="spacesbtn" class="spaces" onclick="location.href='{{route('admin.students_data',[$level?->id])}}'"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px"></button>


    </div>
</div>
