<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces"> <label class="subjectname" style="margin-left: -10px;"> المقرر الدراسي </label><img
                src="{{ Vite::image('open-book.png') }}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
        </button>

        <div class="dropdown">
            <button id="btn-subject-book-Navbar-dropdown" type="button" class="btn btn-light  dropdown-toggle"
                data-toggle="dropdown">
                <div class="textdrop2">
                    @switch($practical)
                        @case('practical')
                            عملي
                        @break

                        @default
                            نظري
                    @endswitch
                </div>
            </button>
            <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                @if (!(!$active && !$practical))
                    <a href="{{ route('student-booksChapters', [$group_subject->id]) }}" id="dropdown-itemlist"
                        class="dropdown-item" style="padding-left:40px;"> نظري</a>
                @endif
                @if (!$practical && $group_subject->has_practical)
                    <a id="dropdown-itemlist" class="dropdown-item"
                        href="{{ route('student-booksChapters', [$group_subject->id, 'practical']) }}"
                        style="padding-left:40px;"> عملي</a>
                @endif
                {{-- <a id="dropdown-itemlist" class="dropdown-item" href="{{
                    route("student-booksChapters",[$group_subject->id,'practical'])
                    }}" style="padding-left:40px;"> عملي</a> --}}
                <a id="dropdown-itemlist" class="dropdown-item"
                    href="{{ route('student-formQuiz', [$group_subject->id, 'summaries']) }}"
                    style="padding-left:40px; "> ملخصات</a>
                <a href="{{ route('student-formQuiz', [$group_subject->id]) }}" id="dropdown-itemlist"
                    class="dropdown-item" style="padding-left:40px;">نماذج </a>

            </div>
        </div>



        <div id="btn-group-nav-subjectbooks" class="btn-group">
            <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->
            <a href="{{ route('student-formQuiz', [$group_subject->id]) }}"> <button
                    class="btn-subject-book-Navbar"><label class="proNavbartext">نماذج </label></button></a>
            <a href="{{ route('student-formQuiz', [$group_subject->id, 'summaries']) }}"><button
                    class="btn-subject-book-Navbar"><label class="proNavbartext"> ملخصات</label></button></a>

            <a href="{{ route('student-booksChapters', [$group_subject->id, 'practical']) }}">
                <button class="btn-subject-book-Navbar"
                    @if ($practical) style="background-color: #a9cbf7;
                text-decoration: none;
                border-bottom: 4px solid #2f81ec;" @endif
                    @if (!$group_subject->has_practical) disabled style='
                    hover: none;
                    ' @endif><label
                        class="proNavbartext"> عملي
                    </label></button>
            </a>
            <a href="{{ route('student-booksChapters', [$group_subject->id]) }}"> <button
                    class="btn-subject-book-Navbar"
                    @if ($active == 'theory' || (!$active && !$practical)) style="background-color: #a9cbf7;
                text-decoration: none;
                border-bottom: 4px solid #2f81ec;" @endif><label
                        class="proNavbartext"> نظري</label></button></a>
        </div>

        <div class="dep-name">{{ $group_subject->subjects->name_ar }}
        </div>

    </div>
    <div class="hr3">
        <a href="{{ route('student-studyingbooks') }}"> <button id="spacesbtn" class="spaces"> <img
                    src="{{ Vite::image('left-arrow.png') }}" id="spaces1" width="30px"></button></a>
        <div id="input-group-search-sub-file" class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"><img
                        src="{{ Vite::image('magnifying-glass (2).png') }}" id="spaces2" width="20px"></button>
            </div>
        </div>
    </div>

</div>
