@section('nav')
@livewire('components.nav.manager_of_depart.managedepartlevel.booksChapters-header')
@endsection
<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="container"  style="padding-top:30px;">
    <div class="card" id="contents-book">
        <div class="container" style="padding-top:30px; ">
            <div id="card-studyingbooks-student" class="card">
                <div id="card-studyingbooks-child">
                    <img src="{{Vite::image("chapter.png")}}" class="chapters-image" width="180px">

                    <!-- <div id="card-studyingbooks-child-2"> -->
                    <label class="texttitlechapter">Lecture 1</label>
                </div>


                <div id="card-studyingbooks-child-three">

                    <button type="submit" class="btn btn-primary" id="btn-download"  ><img src="{{Vite::image("download-file.png")}}" id="image-download"  width="15px" ></button>

                    <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModal3" style="margin-left: 30px;">  <img src="../images/delete (1).png")}}" id=""  width="15px" ></button> -->
                    <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModal3" style="margin-left: 50px;">تعديل  <img src="../images/edit.png")}}" id=""  width="15px" ></button> -->

                </div>
                <!-- </div> -->

            </div>

            <div id="card-studyingbooks-student" class="card">
                <div id="card-studyingbooks-child">
                    <img src="{{Vite::image("chapter (2).png")}}" class="chapters-image" width="180px">

                    <!-- <div id="card-studyingbooks-child-2"> -->
                    <label class="texttitlechapter">Lecture 2
                    System Models
                    </label>

                </div>

                <div id="card-studyingbooks-child-three">

                    <button type="submit" class="btn btn-primary" id="btn-download" data-toggle="modal" data-target="#myModal3"><img src="{{Vite::image("download-file.png")}}" id="image-download"  width="15px" ></button>
                    <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModal3" style="margin-left: 30px;">  <img src="../images/delete (1).png")}}" id=""  width="15px" ></button>
                <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModal3" style="margin-left: 50px;">تعديل  <img src="../images/edit.png")}}" id=""  width="15px" ></button> -->

                </div>
            </div>


            <div id="card-studyingbooks-student" class="card">
                <div id="card-studyingbooks-child">
                    <img src="{{Vite::image("chapter 3.png")}}" class="chapters-image" width="180px">
                    <!-- <div id="card-studyingbooks-child-2"> -->
                    <label class="texttitlechapter">Lecture 3
                    System Models 2
                    </label>

                </div>

                <div id="card-studyingbooks-child-2">
                    <div class="form-group">
                        <!-- <label for="usr">Name:</label> -->
                        <!-- <input type="file" class="form-control-file border" id="uploadefile" name="file"> -->
                    </div>

                </div>
                <div id="card-studyingbooks-child-three">
                    <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModal3" style="margin-left: 30px;">  <img src="../images/delete (1).png")}}" id=""  width="15px" ></button> -->
                    <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModal3" style="margin-left: 50px;">تعديل  <img src="../images/edit.png")}}" id=""  width="15px" ></button> -->

                    <button type="submit" class="btn btn-primary" id="btn-download" data-toggle="modal" data-target="#myModal3"><img src="{{Vite::image("download-file.png")}}" id="image-download"  width="15px" ></button>

                </div>
            </div>




            <div id="card-studyingbooks-student" class="card">
                <div id="card-studyingbooks-child">
                    <img src="{{Vite::image("chapter 4.png")}}" class="chapters-image" width="180px">

                    <!-- <div id="card-studyingbooks-child-2"> -->
                    <label class="texttitlechapter">Lecture 4
                    Interprocess communication (IPC)
                    </label>

                </div>

                <div id="card-studyingbooks-child-2">
                    <div class="form-group">
                        <!-- <label for="usr">Name:</label> -->
                        <!-- <input type="file" class="form-control-file border" id="uploadefile" name="file"> -->
                    </div>

                </div>

                <div id="card-studyingbooks-child-three">
                    <button type="submit" class="btn btn-primary" id="btn-download" data-toggle="modal" data-target="#myModal3"><img src="{{Vite::image("download-file.png")}}" id="image-download"  width="15px" ></button>

                    <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModal3" style="margin-left: 30px;">  <img src="../images/delete (1).png")}}" id=""  width="15px" ></button> -->
                    <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModal3" style="margin-left: 50px;">تعديل  <img src="../images/edit.png")}}" id=""  width="15px" ></button> -->

                </div>
            </div>
        </div>
    </div>
</div>
</div>
