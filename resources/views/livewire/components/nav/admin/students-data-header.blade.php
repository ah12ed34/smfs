<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces" onclick="window.location='{{ route('admin.department') }}'"> <label class="subjectname" style="margin-left: -10px;"> الأدمن </label><img src="{{ Vite::image('admin.png') }}" id="subject-icon-hdr2" width="40px" style="">
        </button>


        <div class="dep-name" >{{ $department->name }}</div>

    </div>

    <div class="hr3">
    <button id="spacesbtn" onclick="window.location='{{ route('admin.levelsOfDepartments',['department']) }}'" class="spaces"> <img src="{{ Vite::image('left-arrow.png')}}" id="spaces1"  width="30px"></button>

    </div>
</div>
