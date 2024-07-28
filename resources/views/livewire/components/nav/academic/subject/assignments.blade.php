<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="hdr2" style=" box-shadow: 10px;">
        <button class="spaces"> <label  class="subjectname"> التكاليف </label><img src="{{Vite::image("homework (3).png")}}" id="subject-icon-hdr2" width="40px">
        </button>
        <div class="dep-sub-name">{{ $group_subject->subject()->name_ar }}</div>
        <div class="container">
            <button  id="" type="button" class="btn btn-light btn_groups_assigne  dropdown-toggle" data-toggle="dropdown">
            <div class="textdrop2"> {{ $group_subject->group->name }}</div>
           </button>
            <div id="dropdown-menulist" class="dropdown-menu" style="width:130px; color: #0E70F2; ">
                @foreach ($group_subject->getOtherGroupss as $group)
                @if($search == 'search')
                <div class="alert alert-success" role="alert">
                    @dd($otherGroups)
                </div>
                @endif
                <a id="dropdown-itemlist" class="dropdown-item" href="{{ route($routeName,[$group->id]) }}"style="padding-left:40px;">{{ $group->group->name }}</a>

                @endforeach
                {{-- <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">(1)المجموعة</a>
                <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> المجموعة(2)</a>
                <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> المجموعة(3)</a> --}}
            </div>
            <td><button type="submit" class="btn btn-primary btn-sm btn_addHW " id="" data-toggle="modal" data-target="#myModal">إضافة تكليف<img src="{{Vite::image("plus.png")}}" class="picture_add"  ></button> </td>
        </div>
    </div>

    <div class="hr3">
        <a href="{{route("subject.index",[$group_subject->id])}}">  <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px" ></button></a>
        {{-- <div id="" class="input-group input_group_assign mb-3">
            <input type="text" class="form-control" placeholder="Search" wire:model='search' wire:keydown.enter='srch'>
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" wire:keydown.enter='srch'><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
            </div>
        </div> --}}
        <div id="" class="input-group input_search_sechedules search_assign">
            <input type="text" class="form-control" placeholder="Search" wire:model="search" wire:keydown.enter='srch' >
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"
                wire:click='srch'
                ><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModal" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA;">

                <!-- Modal Header -->
                <div class="modal-header modal_header_css" id="modheader" >
                      إضافة تكليف جديد
                    {{-- <button type="button" class="close" data-dismiss="modal"><img src="{{Vite::image("cancelbtn.png")}}"   width="20px" style="position: static;" ></button> --}}
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="overflow:auto; height: 400px;">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif
                    <form action="" style="display: block;" enctype="multipart/form-data">
                        <div class="form-group">
                            <!-- <label for="usr">Name:</label> -->
                            <input type="text" class="form-control" id="inputtext" wire:model='assName' placeholder="اسم التكليف " style="height: 30px; margin-top:-6px">
                            <input type="number" class="form-control" id="inputtext" wire:model='grade' placeholder="الدرجة " max="100" style="height: 30px; margin-top:8px">
                            <textarea style="height: 100px;" class="form-control"  wire:model='description' rows="5" id="comment" placeholder=" وصف التكليف" style=" margin-top:8px"></textarea>
                            <input type="file" class="form-control-file border" id="file" wire:model.defer="file" style="height: 30px; margin-top:8px" placeholder="ارفق ملف" >
                            <input type="date" class="form-control" id="inputtext" wire:model="date" placeholder="تاريخ التسليم" style="height: 30px; margin-top:8px">
                            <input type="text" class="form-control" id="inputtext"  placeholder="ملاحظة " style="height: 30px; margin-top:8px">
                        </div>
                        <!-- <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
                    </form>
                </div>

                <!-- Modal footer -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" style="float: left;" wire:click='addAssignment'>حفظ</button>
                    <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>

                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('closeModal', event => {
            $('#myModal').modal('hide');
        });
        // document.addEventListener('DOMContentLoaded', function() {
        //     const fileInput = document.querySelector('input[type="file"]');
        //     fileInput.addEventListener('change', function() {
        //         if(fileInput.files.length <= 0) {
        //             // public $file = '';
        //             $set('file', null)
        //         }
        //     });
        // });
    </script>

</div>
