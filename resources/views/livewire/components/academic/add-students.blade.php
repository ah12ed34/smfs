<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <!-- The MoadalAddStudentsToProject -->
    <div class="modal fade" id="MoadalAddStudentsToProject" wire:ignore style="top:45px; left:60px;">
        <div class="modal-dialog ">
            <div class="modal-content modal_content_css" style="height:40%; width:350px; border-radius:20px;" >

                <!-- Modal Header -->
                <div class="modal-header" style=" height: 50px; padding-top:6px; background-color:#0E70F2;" >


                                    <div id="" class="input-group mb-3" style="top:15px; height:30px;">
                                        <input type="text" class="form-control"  placeholder="Search">
                                        <div class="input-group-append">
                                            <button id="form-control" class="btn btn-light" type="submit"  ><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
                                        </div>
                                    </div>

                            {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}

                </div>

                <!-- Modal body -->
                <div class="modal-body" style="overflow: auto;">
                    {{-- <form action="/action_page.php" style="display: block;"> --}}
                            <div class="table-responsive">
                                <table class="table" style="width:100%;" >
                                    {{-- <thead>
                                        <tr class="table-light" id="">
                                            <th colspan="2">

                                            </th>
                                        </tr>
                                    </thead> --}}
                                    <tbody style="overflow: auto;">
                                        @forelse ($students as $student)

                                            <tr class="table-light">
                                                <td style="text-align: right;">{{$student['name']}}</td>
                                                <td style="width: 7%"><input type="checkbox" class="" name="raido"
                                                    wire:model="students_id" value="{{$student['id']}}"
                                                    ></td>
                                            </tr>
                                        @empty

                                        @endforelse

                                        {{-- <tr class="table-light">
                                            <td style="text-align: right;">********</td>
                                            <td style="width: 7%"><input type="checkbox" class="" name="raido"></td>
                                        </tr>
                                        <tr class="table-light">
                                            <td style="text-align: right;">********</td>
                                            <td style="width:7%"><input type="checkbox" class="" name="raido"></td>
                                        </tr>
                                        <tr class="table-light">
                                            <td style="text-align: right;">********</td>
                                            <td style="width: 7%"><input type="checkbox" class="" name="raido"></td>
                                        </tr>
                                        <tr class="table-light">
                                            <td style="text-align: right;">********</td>
                                            <td style="width:7%"><input type="checkbox" class="" name="raido"></td>
                                        </tr>
                                        <tr class="table-light">
                                            <td style="text-align: right;">********</td>
                                            <td style="width: 7%"><input type="checkbox" class="" name="raido"></td>
                                        </tr>
                                        <tr class="table-light">
                                            <td style="text-align: right;">********</td>
                                            <td style="width:7%"><input type="checkbox" class="" name="raido"></td>
                                        </tr>
                                        <tr class="table-light">
                                            <td style="text-align: right;">********</td>
                                            <td style="width: 7%"><input type="checkbox" class="" name="raido"></td>
                                        </tr> --}}
                                    </tbody>
                                </table>

                            </div>
<nav>
                                    {{ $students->links("vendor.livewire.bootstrap") }}
                                </nav>

                    {{-- </form> --}}
                </div>

                <!-- Modal footer -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" style="height:30px; width:60px; "
                    wire:click="addStudentsToProject"
                    >حفظ</button>
                    <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="" style="height:30px; width:60px; ">إلغاء</button>
                </div>
            </div>
        </div>
    </div>
    <!-- The MoadalAddStudentsToProject -->

</div>
<script>

    //show massage

        alert("hello");

    window.addEventListener('closeModal', event => {
        $('#MoadalAddStudentsToProject').modal('hide');
    })
    window.addEventListener('openModal', event => {
        // console.log('openModal');
        // consle.log(event.detail);
        consle.log("openModal");
        $('#MoadalAddStudentsToProject').modal('show');
    })
</script>
