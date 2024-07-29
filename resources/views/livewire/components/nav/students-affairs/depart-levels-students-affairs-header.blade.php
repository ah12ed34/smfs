<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces" onclick="location.href='{{route('StudentSaffairs')}}'"> <label  class="subjectname" style="margin-left: -10px;">  شؤون الطلاب  </label><img src="{{Vite::image("left-arrow.png")}}" id="subject-icon-hdr2" width="30px" style="top:15px;margin-right:7px;">
        </button>



    <div class="dep-name">{{ $department->name }}</div>
    </div>
    {{-- <div class="hr3">
        <button id="spacesbtn" class="spaces" onclick="location.href='{{route('StudentSaffairs')}}'"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px"></button>



    </div> --}}

</div>
