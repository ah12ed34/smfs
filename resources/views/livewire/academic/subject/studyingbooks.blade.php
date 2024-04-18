@section('nav')
    @livewire('components.nav.academic.subject.navstudyingbooks',['group_subject'=>$group_subject])

@endsection
<div>
<div class="container" style="padding-top:40px; padding-bottom:20px;">
        <div class="card" id="contents-book">
            <div class="responsive">
            </div>

            @forelse ($studyingbooks as $studyingbook)
                <div id="card-studyingbooks" class="card">
                    <div id="card-studyingbooks-child">
                        <img src="{{Vite::image("chapter.png")}}"  class="chapters" >
                        <label class="texttitlechapter">{{$studyingbook->name}}</label>
                    </div>
                    <div id="card-studyingbooks-child-2">
                        <div class="form-group">
                            <input type="file" class="form-control-file border" id="uploadefile" name="file">
                        </div>
                    </div>
                    <div id="card-studyingbooks-child-three">
                        <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModdelete" style="margin-left: 30px;">  <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button>
                        <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModaledite" style="margin-left: 50px;">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button>
                    </div>
                </div>

            @empty



            @endforelse


                {{-- <div id="card-studyingbooks" class="card">

                    <div id="card-studyingbooks-child">
                        <img src="{{Vite::image("chapter.png")}}"  class="chapters" >

                        <!-- <div id="card-studyingbooks-child-2"> -->
                        <label class="texttitlechapter">Lecture 1</label>
                    </div>

                    <div id="card-studyingbooks-child-2">
                        <div class="form-group">
                            <!-- <label for="usr">Name:</label> -->
                            <input type="file" class="form-control-file border" id="uploadefile" name="file">
                        </div>

                    </div>
                    <div id="card-studyingbooks-child-three">
                        <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModdelete" style="margin-left: 30px;">  <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button>
                        <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModaledite" style="margin-left: 50px;">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button>

                    </div>

                </div>

                <div id="card-studyingbooks" class="card">
                    <div id="card-studyingbooks-child">
                        <img src="{{Vite::image("chapter (2).png")}}" class="chapters" >

                        <!-- <div id="card-studyingbooks-child-2"> -->
                        <label class="texttitlechapter">Lecture 2
                            System Models
                            </label>

                    </div>
                    <div id="card-studyingbooks-child-2">
                        <div class="form-group">
                            <!-- <label for="usr">Name:</label> -->
                            <input type="file" class="form-control-file border" id="uploadefile" name="file">
                        </div>

                    </div>
                    <div id="card-studyingbooks-child-three">
                        <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModdelete" style="margin-left: 30px;">  <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button>
                        <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModaledite" style="margin-left: 50px;">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button>

                    </div>
                </div>


                <div id="card-studyingbooks" class="card">
                    <div id="card-studyingbooks-child">
                        <img src="{{Vite::image("chapter 3.png")}}" class="chapters" >
                        <!-- <div id="card-studyingbooks-child-2"> -->
                        <label class="texttitlechapter">Lecture 3
                            System Models 2
                            </label>

                    </div>

                    <div id="card-studyingbooks-child-2">
                        <div class="form-group">
                            <!-- <label for="usr">Name:</label> -->
                            <input type="file" class="form-control-file border" id="uploadefile" name="file">
                        </div>

                    </div>
                    <div id="card-studyingbooks-child-three">
                        <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModdelete" style="margin-left: 30px;">  <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button>
                        <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModaledite" style="margin-left: 50px;">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button>

                    </div>
                </div>




                <div id="card-studyingbooks" class="card">
                    <div id="card-studyingbooks-child">
                        <img src="{{Vite::image("chapter 4.png")}}" class="chapters" >

                        <!-- <div id="card-studyingbooks-child-2"> -->
                        <label class="texttitlechapter">Lecture 4
                            Interprocess communication (IPC)
                            </label>

                    </div>

                    <div id="card-studyingbooks-child-2">
                        <div class="form-group">
                            <!-- <label for="usr">Name:</label> -->
                            <input type="file" class="form-control-file border" id="uploadefile" name="file">
                        </div>

                    </div>

                    <div id="card-studyingbooks-child-three">
                        <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModdelete" style="margin-left: 30px;">  <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button>
                        <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModaledite" style="margin-left: 50px;">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button>

                    </div>
                </div> --}}
            </div>
        </div>

        <!-- The ModalEdite -->
        <div class="modal fade" id="myModaledite">
            <div class="modal-dialog">
                <div class="modal-content" id="modal-content2">

                    <!-- Modal Header -->
                    <div class="modal-header" id="modheader">
                         تعديل
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" style="display: block;">
                            <div class="form-group">
                                <!-- <label for="usr">Name:</label> -->
                                <input type="text" class="form-control" id="inputtextfile" name="username" placeholder="اسم الملف " style="height: 30px; margin-top:-6px">

                                <input type="file" class="form-control-file border" id="file" name="file" style="height: 30px; margin-top:8px">
                            </div>
                            <!-- <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div> -->
                        </form>
                    </div>

                    <!-- Modal footer -->

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btnsave-file" style="float: left; margin-left:30px;">حفظ</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel-file">إلغاء</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content" id="modal-content2">

                    <!-- Modal Header -->
                    <div class="modal-header" id="modheader">
                        رفع ملف
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" style="display: block;">
                            <div class="form-group">
                                <!-- <label for="usr">Name:</label> -->
                                <input type="text" class="form-control" id="inputtextfile" name="username" placeholder="اسم الملف " style="height: 30px; margin-top:-6px">

                                <input type="file" class="form-control-file border" id="file" name="file" style="height: 30px; margin-top:8px">
                            </div>
                            <!-- <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div> -->
                        </form>
                    </div>

                    <!-- Modal footer -->

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btnsave-file" style="float: left; margin-left:30px;">حفظ</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel-file">إلغاء</button>
                    </div>
                </div>
            </div>
        </div>


         <!-- The ModalDelete -->
         <div class="modal fade" id="myModdelete">
            <div class="modal-dialog ">
                <div class="modal-content" style="height: 150px;">

                    <!-- Modal Header -->
                    <div class="modal-header" style="padding-left:50%; height: 40px; padding-top:6px;">
                        تنبيه!
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body" style="text-align:center ;">
                        <form action="" style="display: block;">

                            هل تريد حذف الملف بالفعل؟


                            <!-- <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div> -->
                        </form>
                    </div>

                    <!-- Modal footer -->

                    <div class="modal-footer" style="height: 40px;">
                        <button type="submit" class="btn btn-primary" id="btnOkYes">نعم</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnNO">لا</button>
                    </div>
                </div>
            </div>
        </div>

</div>
