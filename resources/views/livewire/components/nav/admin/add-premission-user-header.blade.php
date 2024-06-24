<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces"> <label  class="subjectname">   الأدمن </label><img src="{{ Vite::image('admin.png')}}" id="subject-icon-hdr2" width="40px" >
        </button>

    <div id="" class="input-group input-search-admin">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-append">
            <button id="form-control" class="btn btn-light" type="submit"><img src="{{ Vite::image('magnifying-glass (2).png')}}" id="spaces2"  width="20px" ></button>
        </div>
    </div>


    <td><button type="submit" class="btn btn-primary btn-sm  btn-addAcademic" id="" data-toggle="modal" data-target="#addUserPermissions"> اضافة مستخدم<img src="{{ Vite::image('plus.png')}}"  width="20px" style="float: left;"></button> </td>

</div>

<div class="hr3">
    <button id="spacesbtn" onclick="window.location='{{ route('admin.permissions') }}'" class="spaces"> <img src="{{ Vite::image('left-arrow.png')}}" id="spaces1"  width="30px"></button>


</div>

</div>
