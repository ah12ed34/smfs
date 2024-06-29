<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <!-- The MoadalAddStudentsToProject -->
    <div class="modal fade" id="MoadalAddStudentsToProject" wire:ignore.self style="top:45px; left:60px;">
        <div class="modal-dialog ">
            <div class="modal-content modal_content_css" style="height:40%; width:350px; border-radius:20px;" >

                <!-- Modal Header -->
                <div class="modal-header" style=" height: 50px; padding-top:6px; background-color:#0E70F2;" >


                                    <div id="" class="input-group mb-3" style="top:15px; height:30px;">
                                        <input type="text" class="form-control"  placeholder="Search" wire:model.lazy='search'
                                        id="search">
                                        <div class="input-group-append">
                                            <button id="form-control" class="btn btn-light" type="submit"  ><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
                                        </div>
                                    </div>


                </div>

                <!-- Modal body -->
                <div class="modal-body" style="overflow: auto;">
                            <div class="table-responsive">
                                {{-- error --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <table class="table" style="width:100%;" >
                                    <!--  <thead>
                                        <tr class="table-light" id="">
                                            <th colspan="2">

                                            </th>
                                        </tr>
                                    </thead> -->
                                    <tbody style="overflow: auto;">
                                        @forelse ($students as $student)

                                            <tr class="table-light">
                                                <td style="text-align: right;">{{$student['name']}}</td>
                                                <td style="width: 7%"><input type="checkbox" class="" name="raido"
                                                    id="raido{{$student['id']}}"
                                                    wire:model="students_id" value="{{$student['id_group']}}"
                                                    ></td>
                                            </tr>
                                        @empty
                                            <tr class="table-light">
                                                <td style="text-align: right;" colspan="2"
                                                >لا يوجد طلاب</td>
                                            </tr>

                                        @endforelse

                                        <!-- <tr class="table-light">
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
                                        </tr> -->
                                    </tbody>
                                </table>

                            </div>
<nav>
                                    {{ $students->links(
                                        "vendor.livewire.bootstrap"
                                        ) }}
                                </nav>
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


        {{-- <div class="table-responsive">
            <table class="table" style="width:100%;" >
                <tbody style="overflow: auto;">
                    @forelse ($students as $student)

                        <tr class="table-light">
                            <td style="text-align: right;">{{$student['name']}}</td>
                            <td style="width: 7%"><input type="checkbox" class="" name="raido"
                                wire:model="students_id" value="{{$student['id']}}"
                                ></td>
                        </tr>
                    @empty
                        <tr class="table-light">
                            <td style="text-align: right;" colspan="2"
                            >لا يوجد طلاب</td>
                        </tr>

                    @endforelse

                </tbody>
            </table>

            <nav>
                {{ $students->links("vendor.livewire.bootstrap") }}
            </nav>
        </div> --}}
</div>

{{-- <script>
    $('#MoadalAddStudentsToProject').modal('show');

</script> --}}
