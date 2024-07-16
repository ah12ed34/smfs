<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces"> <label  class="subjectname" style="margin-left: -10px;"> المقرر الدراسي </label><img src="{{Vite::image("open-book.png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
        </button>
        <div class="dropdown">
            <button id="btn-subject-book-Navbar-dropdown" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown">
                <div class="textdrop2">@switch($active)
                    @case('forms')
                        نماذج
                        @break
                    @default
                        ملخصات
                @endswitch
            </button>
            <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
             <a href="{{route("student-booksChapters",[$group_subject->id])}}" id="dropdown-itemlist" class="dropdown-item"  style="padding-left:40px;"> نظري</a>
                <a href="{{ route('student-booksChapters',
                [$group_subject->id, 'practical']) }}" id="dropdown-itemlist" class="dropdown-item"  style="padding-left:40px;"> عملي</a>
                @if($active != 'forms')
                    <a href="{{route("student-formQuiz",[$group_subject->id,'forms'])}}" id="dropdown-itemlist" class="dropdown-item"  style="padding-left:40px;">نماذج </a>
                @endif
                @if($active != 'summaries')
                    <a href="{{route("student-formQuiz",[$group_subject->id, 'summaries'])}}" id="dropdown-itemlist" class="dropdown-item"  style="padding-left:40px;">ملخصات </a>
                @endif
                {{-- <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px; ">   ملخصات</a> --}}

            </div>
        </div>



        <div id="btn-group-nav-subjectbooks" class="btn-group">
            <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->
            <a href="{{route("student-formQuiz",[$group_subject->id,'forms'])}}">  <button class="btn-subject-book-Navbar"
                @if ($active == 'forms')
                    style="background-color: #a9cbf7;
                    text-decoration: none;
                    border-bottom: 4px solid #2f81ec;"
                @endif><label class="proNavbartext">نماذج </label></button></a>
            <a href="{{route("student-formQuiz",[$group_subject->id, 'summaries'])}}"><button class="btn-subject-book-Navbar"
                @if ($active == 'summaries')
                    style="background-color: #a9cbf7;
                    text-decoration: none;
                    border-bottom: 4px solid #2f81ec;"
                @endif><label class="proNavbartext">  ملخصات</label></button></a>
            <a href="{{route("student-booksChapters",[$group_subject->id,'practical'])}}"> <button class="btn-subject-book-Navbar"><label class="proNavbartext">  عملي </label></button></a>
            <a href="{{route("student-booksChapters",[$group_subject->id])}}">  <button class="btn-subject-book-Navbar"><label class="proNavbartext"> نظري</label></button></a>
        </div>

        <div class="dep-name">{{$group_subject->subject()->name_ar}}</div>
    </div>

    <div class="hr3">
        <a href="{{route("student-studyingbooks",[$group_subject->id])}}">  <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px" ></button></a>
        <div id="input-group-search-sub-file" class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search" wire:model="search" wire:keydown.enter="srch">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"
                wire:click="srch()"
                ><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
            </div>
        </div>
        <td><button type="submit" class="btn btn-primary btn-sm" id="btn-uploade-quiz" data-toggle="modal" data-target="#myModaluploade-form-quiz"> رفع نموذج<img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button> </td>

    </div>
</div>
