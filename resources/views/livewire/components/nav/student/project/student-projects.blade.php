<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="hdr2" style=" box-shadow: 10px;">
        <button class="spaces"> <label  class="subjectname"> المشاريع </label><img src="{{Vite::image("project-management.png")}}" id="subject-icon-hdr2" width="40px">
        </button>
        <div class="dep-name">{{ auth()->user()->student->department->name }}</div>
            <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->


     {{-- href="{{route("studeProjectsStastics")}}" --}}
        <div id="btn-group-proj" class="btn-group">
            <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->

            <a href="{{route("student-projectsStastics")}}">  <button class="btn-projctsNavbarproj"

            @if ($Tab == 'statistics')
                style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"
            @endif
            ><label class="proNavbartext">الإحصائيات</label></button></a>
            <a href="{{ route("student-projects",array_merge(request()->query(),['tab' => 'unfinished'])) }}">
            <button class="btn-projctsNavbarproj"
            @if ($Tab == 'unfinished')
                    style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"
                @endif
            ><label class="proNavbartext"
                > غير منجزة</label></button>
            </a>
            <a href="{{ route("student-projects",array_merge(request()->query(),['tab' => 'finished'])) }}">
            <button class="btn-projctsNavbarproj"
            @if($Tab == 'finished')
                style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"
                @endif
            ><label class="proNavbartext"
             > منجزة </label></button></a>
            <a  href="{{route("student-projects",array_merge(request()->query(),['tab' => null]))}}">
                <button class="btn-projctsNavbarproj"
                @if ($Tab == null)
                style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"
                @endif
                 ><label class="proNavbartext">الكل</label></button></a>
        </div>
    {{-- href="{{route("studProjects")}}" --}}

        <button id="button-hdr2" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown" >
                <div class="textdrop">@switch($Tab)
                    @case('unfinished')
                        غير منجزة
                        @break
                    @case('finished')
                        منجزة
                        @break
                    @case('statistics')
                        الإحصائيات
                        @break
                    @default
                        الكل
                @endswitch</div>
                </button>
        <div id="dropdown-menulist" class="dropdown-menu">
            @if (!($Tab == null))
                <a id="dropdown-itemlist" class="dropdown-item" href="{{route("student-projects",array_merge(request()->query(),['tab' => null]))}}" style="padding-left:40px;">الكل</a>
            @endif
            @if (!($Tab == 'finished'))
                <a id="dropdown-itemlist" class="dropdown-item" href="{{route("student-projects",array_merge(request()->query(),['tab' => 'finished']))}}" style="padding-left:40px;">منجزة</a>
            @endif
            @if (!($Tab == 'unfinished'))
                <a id="dropdown-itemlist" class="dropdown-item" href="{{route("student-projects",array_merge(request()->query(),['tab' => 'unfinished']))}}" style="padding-left:30px;">غير منجزة</a>
            @endif
            @if (!($Tab == 'statistics'))
                <a id="dropdown-itemlist" class="dropdown-item" href="{{route("student-projectsStastics")}}"> الإحصائيات</a>

            @endif
            {{-- <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">منجزة</a>
            <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:30px;">غير منجزة</a>
            <a id="dropdown-itemlist" class="dropdown-item" href="{{route("student-projectsStastics")}}"> الإحصائيات</a> --}}
        </div>
        {{-- {{route("studeProjectsStastics")}} --}}

    </div>

    <div class="hr3">
        <a href="{{route("student")}}">  <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px" ></button></a>
        @if ($Tab != 'statistics')
            <div id="input-group-students-search" class="input-group mb-3">
                <input type="text" class="form-control" wire:model='search' wire:keydown.enter='srch()'
                 placeholder="Search">
                <div class="input-group-append">
                    <button id="form-control" class="btn btn-light" wire:click='srch()' type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
                </div>
            </div>
        @endif

        {{-- <button class="Addbtn-projctsNavbar" data-toggle="modal" data-target="#myModal"><label class="proNavbartext">إنشاء مشروع</label><img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button> --}}
    </div>
</div>
