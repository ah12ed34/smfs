<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="hdr2" style=" box-shadow: 10px;">
        <button class="spaces"> <label  class="subjectname" > التكاليف </label><img src="{{Vite::image("homework (3).png")}}" id="subject-icon-hdr2" width="40px">
        </button>
        <div class="dep-name">{{ auth()->user()->student->department->name }}</div>

        <div id="btn-group-assignementsStudents">
            <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->

            <a href="{{route("student-assignements" , array_merge(request()->query(),['active' => 'send'])
            )}}"> <button id="btn-assignementsStudentsksNavbar" class="btn btn-light"
            @if ($activeTab == 'delivered')
                style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"
            @endif
            ><label class="">   مرسلة</label></button></a>
            <a href="{{route("student-assignements", array_merge(request()->query(),['active' => 'notSent']))}}">
            <button id="btn-assignementsStudentsksNavbar" class="btn btn-light" @if ($activeTab == 'not_delivered')
                style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"

            @endif><label class="">  غير مرسلة </label></button>
            </a>
            <a href="{{route("student-assignements",array_merge(request()->query(), ['active' => null])
            )}}"><button id="btn-assignementsStudentsksNavbar" class="btn btn-light" @if ($activeTab == 'all' || $activeTab == null )
                style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"
            @endif ><label class="">  القائمة </label></button>
        </a>

    </div>
        <button id="btn-assignementsStudentsdropdown" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
            <div class="textstudentsdrop">@switch($activeTab)
                @case('send')
                    مرسلة
                    @break
                @case('notSent')
                    غير مرسلة
                    @break
                @default
                    القائمة
            @endswitch
           </button>
        <div id="dropdown-menulist" class="dropdown-menu" style="width:100px;">
            @if($activeTab != 'send')
                <a id="dropdown-students-itemlist" class="dropdown-item" href="{{route("student-assignements" , array_merge(request()->query(),['active' => 'send'])
                )}}" style="padding-left:40px;">  مرسلة </a>
            @endif
            @if($activeTab != 'notSent')
                <a id="dropdown-students-itemlist" class="dropdown-item" href="{{route("student-assignements", array_merge(request()->query(),['active' => 'notSent']))}}" style="padding-left:40px;"> غير مرسلة</a>
            @endif
            @if($activeTab != 'all' && $activeTab != null)
                <a id="dropdown-students-itemlist" class="dropdown-item" href="{{route("student-assignements",array_merge(request()->query(), ['active' => null])
                )}}" style="padding-left:40px;"> القائمة </a>
            @endif
            {{-- <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">  غير مرسلة </a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="{{route("student-DoneAssignements")}}" style="padding-left:40px;"> مرسلة</a> --}}
        </div>
        <!-- <td><button type="submit" class="btn btn-primary btn-sm" id="btn-addHW" data-toggle="modal" data-target="#myModal">إضافة تكليف<img src="../../images/plus.png"  width="20px" style="float: left;"></button> </td> -->
        <div class="dropdwon">
            <button id="btn-assignementsStudentsdropdown-HW-mobile" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
            <div class="textstudentsdrop">{{ $name  }}  </div>
           </button>
            <div id="dropdown-menulist" class="dropdown-menu" style="width:100px;">

                @php
                    $continue = false;
                @endphp
                @foreach ($subjects as $subject)
                {{-- @dd($subject) --}}
                    @if ($subject['name'] == $name)
                        @php
                            $continue = true;
                        @endphp
                        @continue
                    @endif
                    <a id="dropdown-students-itemlist" class="dropdown-item" href="{{ route('student-assignements', array_merge(request()->query(),['subject' => $subject['code']])) }}"
                    style="padding-left:40px;"> {{ $subject['name'] }}</a>
                @endforeach
                @if($continue)
                    <a id="dropdown-students-itemlist" class="dropdown-item" href="{{ route('student-assignements', array_merge(request()->query(),['subject' => null])) }}"
                        style="padding-left:40px;"> جميع المواد</a>
                    @endif

                {{--               <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> *****</a>
                <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> ****</a>
                <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> *****</a> --}}
            </div>
        </div>
    </div>




    <div class="hr3">
        <a href="{{route("student")}}">  <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px" ></button></a>

        <div class="dropdwon">
            <button id="btn-assignementsStudentsdropdown-HW" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
            <div class="textstudentsdrop">{{ $name  }}</div>
            </button>
            <div id="dropdown-menulist" class="dropdown-menu" style="width:100px;">
                @php
                    $continue = false;
                @endphp
                @foreach ($subjects as $subject)
                {{-- @dd($subject) --}}
                    @if ($subject['name'] == $name)
                        @php
                            $continue = true;
                        @endphp
                        @continue
                    @endif
                    <a id="dropdown-students-itemlist" class="dropdown-item" href="{{ route('student-assignements', array_merge(request()->query(),['subject' => $subject['code']])) }}"
                    style="padding-left:40px;"> {{ $subject['name'] }}</a>
                @endforeach
                @if($continue)
                    <a id="dropdown-students-itemlist" class="dropdown-item" href="{{ route('student-assignements', array_merge(request()->query(),['subject' => null])) }}"
                        style="padding-left:40px;"> جميع المواد</a>
                    @endif
                {{-- <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> *****</a> --}}
            </div>
        </div>
        <div id="input-group-studentSearch" class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
            </div>
        </div>

        <div class="dropdwon">
            <button id="btn-Type-assignementsdropdown" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
            <div class="textstudentsdrop">
                @if ($practical === false)
                    نظري
                @elseif ($practical === true)
                    عملي
                @else
                    نظري/عملي
                @endif
            </div>
            </button>
            <div id="dropdown-menulist" class="dropdown-menu" style="width:100px;">
                @if ($practical !== false)
                    <a id="dropdown-students-itemlist" class="dropdown-item" href="{{ route('student-assignements', array_merge(request()->query(),['practical' => 'no'])) }}"
                    style="padding-left:40px;"> نظري</a>

                @endif
                @if ($practical !== true)
                    <a id="dropdown-students-itemlist" class="dropdown-item" href="{{ route('student-assignements', array_merge(request()->query(),['practical' => 'yes'])) }}"
                    style="padding-left:40px;"> عملي</a>
                @endif

                @if ( $practical !== null)
                        <a id="dropdown-students-itemlist" class="dropdown-item" href="{{ route('student-assignements',array_merge(request()->query(), ['practical' => null])) }}"
                        style="padding-left:40px;"> نظري/عملي</a>

                @endif

{{--
                <a id="dropdown-students-itemlist" class="dropdown-item" href="{{ route('student-assignements',array_merge(request()->query(), ['practical' => 'no'])) }}"
                style="padding-left:40px;"> نظري</a>
                <a id="dropdown-students-itemlist" class="dropdown-item" href="{{ route('student-assignements', array_merge(request()->query(),['practical' => 'yes'])) }}"
                style="padding-left:40px;"> عملي</a>
            </div> --}}
        </div>

    </div>
    </div>

</div>
