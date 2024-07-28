<div>
    {{-- Success is as dangerous as failure. --}}
    <div  class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces"> <label  class="subjectname" style="margin-left: -10px;"> المقرر الدراسي </label><img src="{{Vite::image("open-book.png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
        </button>
        <div class="dep-sub-name">{{ $group_subject?->subject()?->name_ar }}</div>

        <div id="btn-group-studyingbooks" class="btn-group">
            <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->

            <button id="btn-studyingbooksNavbar" class="btn btn-light" @if ($active == 'forms-quiz')
                {{-- style="background-color: #0E70F2; color: white;" --}}
                style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"
            @endif onclick="location.href='{{route('forms-quiz',[$group_subject->id])}}'"><label class="proNavbartext">   نماذج</label></button>
            <button id="btn-studyingbooksNavbar" class="btn btn-light" @if($active == 'studyingbooks_practical')
                style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"
            @endif
            {{-- onclick="location.href='{{route('studyingbooks',[$group_subject->id])}}'" --}}
            @if($group_subject->HasPractical())
                        onclick="location.href='{{route('studyingbooks',[$group_subject->id,'practical'])}}'"
                    @else
                        onclick="location.href='{{route('studyingbooks',[$group_subject->id])}}'"
                    @endif
            @if(!$group_subject->HasPractical()&&!$group_subject->IsPractical())
                disabled
                @endif
            ><label class="proNavbartext">  عملي </label></button>
             {{-- ><label class="proNavbartext">  عملي </label></button> --}}
            <button id="btn-studyingbooksNavbar" class="btn btn-light"
            @if($group_subject->IsPractical())
                disabled
                @endif
            @if ($active == 'studyingbooks')
            style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"
            @endif onclick="location.href='{{route('studyingbooks',[$group_subject->id])}}'"><label class="proNavbartext">  نظري </label></button>
        </div>
        <!-- <button class="btn-bottomNavbar"><i id="bottombaricon" class="bi bi-house-fill custom-width-icon" width="30px" height="30px"></i><br>
            <label class="bottomNavbartext">القائمة</label>
            </button> -->

        <button id="btn-studyingbooksdropdown" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                 <div class="textstudentsdrop">
                    @switch($active)
                        @case('studyingbooks')
                            نظري
                        @break
                        @case('studyingbooks_practical')
                            عملي
                        @break
                        @case('forms-quiz')
                            نماذج
                        @break
                    @endswitch
                 </div>
                </button>
        <div id="dropdown-menulist" class="dropdown-menu" style="width:100px;">
            @if ($active != 'studyingbooks'&&!$group_subject->IsPractical())
                <a href="{{route("studyingbooks",[$group_subject->id])}}" id="dropdown-students-itemlist" class="dropdown-item" style="padding-left:40px;"> نظري</a>
            @endif
            @if ($active != 'studyingbooks_practical'&&$group_subject->HasPractical()||$group_subject->IsPractical())
                <a
                    @if($group_subject->HasPractical())
                        href="{{route("studyingbooks",[$group_subject->id,'practical'])}}"
                    @else
                        href="{{route("studyingbooks",[$group_subject->id])}}"
                    @endif
                     id="dropdown-students-itemlist" class="dropdown-item" style="padding-left:40px;"> عملي</a>
            @endif
            {{-- <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> عملي</a> --}}
            @if($active != 'forms-quiz')
                <a href="{{route("forms-quiz",[$group_subject->id])}}" id="dropdown-students-itemlist" class="dropdown-item" style="padding-left:40px;"> نماذج</a>
            @endif
            </div>

    </div>
    <div  class="hr3">
        <a href="{{route("subject.index",[$group_subject->id])}}">    <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px"></button></a>

        <div id="input-groupstudyingbooks" class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search" wire:model="search" aria-label="Recipient's username" aria-describedby="button-addon2" wire:keydown.enter="srch">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit" wire:click='srch'><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
            </div>
        </div>
        <td><button type="submit" class="btn btn-primary btn-sm" id="btn-uploade-grades" data-toggle="modal" data-target="#myModal"> رفع ملف<img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button> </td>

    </div>


        <!-- The Modal -->
        <div class="modal fade" id="myModal" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content modal_content_css" id="modal-content2" style="height: 250px;">

                    <!-- Modal Header -->
                    <div class="modal-header modal_header_css" id="modheader">
                        رفع ملف
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action=""  style="display: block;" enctype="multipart/form-data" >
                            <div class="form-group">
                                <!-- <label for="usr">Name:</label> -->
                                <input type="text" class="form-control" id="inputtextfile" wire:model='nameFile' placeholder="اسم الملف " style="height: 30px; margin-top:-6px">

                                <input type="file" class="form-control-file border" id="file" wire:model='file' style="height: 30px; margin-top:8px" accept=".pdf,.docx,.doc,.ppt,.pptx,.zip,.rar,.7z">
                                @error('file') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                            </div>
                            <!-- <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div> -->
                        </form>
                    </div>

                    <!-- Modal footer -->

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" style="float: left; margin-left:30px;"wire:click="addFile">حفظ</button>
                        <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            window.addEventListener('closeModal', event => {
                $('#myModal').modal('hide');
                // refresh the page
                window.location.reload();
            });
        </script>

</div>
