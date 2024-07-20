<div>
    <div class="hdr2" style=" box-shadow: 10px;">
        <button class="spaces"> <label  class="subjectname"> المشاريع </label><img src="{{Vite::image("project-management.png")}}" id="subject-icon-hdr2" width="40px">
        </button>
        <div class="dep-sub-name">{{$group_subject->subject()->name_ar}} </div>
            @if(!in_array('tab',$deny))
        <div id="btn-group-proj" class="btn-group">

        <a href="{{route("projectsStastics",$parameters
        )}}">  <button class="btn-projctsNavbarproj" ><label class="proNavbartext">الإحصائيات</label></button></a>
            <a href="{{route("project",array_merge($parameters,$qurey,['tab'=>'not_done']))}}">
            <button class="btn-projctsNavbarproj"
            @if (isset($active['tab']) && $active['tab'] == 'not_done')
            style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"
            @endif
            ><label class="proNavbartext"> غير منجزة</label></button>
            </a>
            <a href="{{route("project",array_merge($parameters,$qurey,['tab'=>'done']))}}">
            <button class="btn-projctsNavbarproj" @if (isset($active['tab']) && $active['tab'] == 'done') style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;" @endif><label class="proNavbartext"> منجزة </label></button>
            </a>
            {{-- @endif><label class="proNavbartext"> منجزة </label></button> --}}

            <a href="{{route("project",$parameters)}}">  <button class="btn-projctsNavbarproj"
                @if(array_key_exists('tab',$active) && $active['tab'] ==null)
                style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"
                @endif
                ><label class="proNavbartext">الكل</label></button></a>
        </div> @endif
        <!-- <button class="btn-bottomNavbar"><i id="bottombaricon" class="bi bi-house-fill custom-width-icon" width="30px" height="30px"></i><br>
            <label class="bottomNavbartext">القائمة</label>
            </button> -->
            @if(!in_array('tab',$deny))
        <button id="button-hdr2" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown" >
            <div class="textdrop">@switch($active['tab'])
                @case('done')
                    منجزة
                    @break
                @case('not_done')
                    غير منجزة
                    @break
                @default
                    الكل
            @endswitch
            </div>
                </button>
        <div id="dropdown-menulist" class="dropdown-menu" style="width:130px; color: #0E70F2; ">
            @if (isset($active['tab']) && $active['tab'] == null)
                <a id="dropdown-itemlist" class="dropdown-item" href="{{ route('project',array_merge($parameters,$qurey,['tab'=>null])) }}" style="padding-left:40px; ">الكل</a>
            @endif
            @if (isset($active['tab']) && $active['tab'] == 'done')
                <a id="dropdown-itemlist" class="dropdown-item" href="{{ route('project',array_merge($parameters,$qurey,['tab'=>'done'])) }}" style="padding-left:40px; ">منجزة</a>
            @endif
            @if (isset($active['tab']) && $active['tab'] == 'not_done')
                <a id="dropdown-itemlist" class="dropdown-item" href="{{ route('project',array_merge($parameters,$qurey,['tab'=>'not_done'])) }}" style="padding-left:30px; ">غير منجزة</a>
            @endif
            {{-- <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:30px; ">غير منجزة</a> --}}
            <a id="dropdown-itemlist" class="dropdown-item" href="{{route("projectsStastics",$parameters)}}"> الإحصائيات</a>
        </div>
        @endif
    </div>

    <div class="hr3">
        <a href="{{route($backName,[$group_subject->id])}}">  <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px" ></button></a>
        <div id="input-group-proj" class="input-group mb-3">
            <input type="text" class="form-control" wire:model='search' wire:keydown.enter="srch"
                    placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit" wire:click='srch'><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
            </div>
        </div>
        @if(!in_array('create',$deny))
        <button class="Addbtn-projctsNavbar" data-toggle="modal" data-target="#myModal"><label class="proNavbartext">إنشاء مشروع</label><img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button>
        @endif
    </div>
</div>
