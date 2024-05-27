<div>
    <style>
        button.active {
            background-color: #0E70F2;
            color: white;
        }
    </style>
    <div class="hdr2" style=" box-shadow: 10px;">
        <button class="spaces"> <label  class="subjectname"> التكاليف </label><img src="{{Vite::image("homework (3).png")}}" id="subject-icon-hdr2" width="40px">
        </button>
        <div class="dep-sub-name">نظم موزعة </div>
        {{-- <div class="container"> --}}
            <button id="btn-groups-hw" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown">
            <div class="textdrop2">  جميع المجموعات</div>
           </button>
            <div id="dropdown-menulist" class="dropdown-menu" style="width:130px; color: #0E70F2; ">
                <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">(1)المجموعة</a>
                <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> المجموعة(2)</a>
                <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> المجموعة(3)</a>
            </div>

    <div class="btn-group">
                <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->
                <button class="btn-projctsNavbar-reciv-assigne @if ($tabActive == 'not_delivered')
                    active
                @endif"
                onclick="window.location.href='{{route('recive-assignments',request()->route()->parameters +array_merge(request()->query(),['tab'=>'not_delivered']) )}}'"
                ><label class="proNavbartext">لم يتم التسليم</label></button>
                <button class="btn-projctsNavbar-reciv-assigne @if ($tabActive == 'late')
                    active

                @endif" onclick="window.location.href='{{route('recive-assignments',request()->route()->parameters +array_merge(request()->query(),['tab'=>'late']) )}}'".

                ><label class="proNavbartext"> تسليم متأخر</label></button>
                <button class="btn-projctsNavbar-reciv-assigne @if ($tabActive == 'early')
                    active
                @endif" onclick="window.location.href='{{route('recive-assignments',request()->route()->parameters +array_merge(request()->query(),['tab'=>'early']) )}}'"
                ><label class="proNavbartext"> تسليم مبكر </label></button>
                <button class="btn-projctsNavbar-reciv-assigne @if ($tabActive == null || $tabActive == 'all')
                    active
                @endif" onclick="window.location.href='{{route('recive-assignments',request()->route()->parameters +array_merge(request()->query(),['tab'=>null]) )}}'"
                ><label class="proNavbartext"> الواردة</label></button>
            </div>

            <div class="dropdown">
                <button id="btn-navbar-hw" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown">
                <div class="textdrop2">   قائمة @switch($tabActive)
                    @case('early')
                        تسليم مبكر
                        @break
                    @case('late')
                        تسليم متأخر
                        @break
                    @case('not_delivered')
                        لم يتم التسليم
                        @break
                    @default
                        الواردة
                @endswitch</div>
               </button>
                <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                    @if (!($tabActive == null || $tabActive == 'all'))
                        <a id="dropdown-itemlist" class="dropdown-item" href="{{ route('recive-assignments',request()->route()->parameters +array_merge(request()->query(),['tab'=>null]) )}}" style="padding-left:40px; ">الواردة</a>
                    @endif
                    @if (!($tabActive == 'early'))
                        <a id="dropdown-itemlist" class="dropdown-item" href="{{ route('recive-assignments',request()->route()->parameters +array_merge(request()->query(),['tab'=>'early']) )}}"
                        style="padding-left:40px; ">تسليم مبكر</a>
                    @endif
                    @if (!($tabActive == 'late'))
                        <a id="dropdown-itemlist" class="dropdown-item" href="{{ route('recive-assignments',request()->route()->parameters +array_merge(request()->query(),['tab'=>'late']) )}}"
                        style="padding-left:40px; ">تسليم متأخر</a>
                    @endif
                    @if (!($tabActive == 'not_delivered'))
                        <a id="dropdown-itemlist" class="dropdown-item" href="{{ route('recive-assignments',request()->route()->parameters +array_merge(request()->query(),['tab'=>'not_delivered']) )}}"
                        style="padding-left:40px; ">لم يتم التسليم</a>
                    @endif
                </div>
            </div>






        {{-- </div> --}}

    </div>

    <div class="hr3">
        <a href="{{route("assignment",[$group_subject->subject_id,$group_subject->group_id])}}">     <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px" ></button></a>
        <div id="input-group-reciv-assign" class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
            </div>
        </div>
    </div>
</div>
