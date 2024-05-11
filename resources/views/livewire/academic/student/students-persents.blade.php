<div>

    <div class="responsive"></div>


    <div class="container" id="container-project" style="  padding-top: 30px;">

        <div class="table-responsive">


            <table class="table table-bordered" style="font-size:10px;border:1px solid rgb(72, 72, 72); ">




                <thead class="table-header">

                    <tr class="table-light" id="modldetials" style="font-size:10px; margin-left:5px; ">
                        <th id="th1" colspan="4 " style="font-size:10px;margin-left:5px;">(12)المحاضرة </th>
                        <th id="th1" colspan="4 " style="font-size:10px;margin-left:5px;">(11)المحاضرة</th>
                        <th id="th1" colspan="4 ">(10)المحاضرة </th>
                        <th id="th1" colspan="4 ">(9)المحاضرة </th>
                        <th id="th1" colspan="4 ">المحاضرة(8)</th>
                        <th id="th1" colspan="4 ">المحاضرة(7) </th>
                        <th id="th1" colspan="4 ">المحاضرة(6) </th>
                        <th id="th1" colspan="4 ">المحاضرة(5) </th>
                        <th id="th1" colspan="4 ">المحاضرة(4)</th>
                        <th id="th1" colspan="4 ">المحاضرة(3) </th>
                        <th id="th1" colspan="4 ">المحاضرة(2)</th>
                        <th id="th1" colspan="4 ">المحاضرة(1) </th>
                        <th colspan="5 " rowspan="2" style="padding-left:40px;padding-right:40px;padding-top:10px;">
                            <label style="margin-top:10px;">اسم الطالب</label></th>
                        <th colspan="5 " rowspan="2" style="padding-left:40px;padding-right:40px;padding-top:10px; "> <label style="margin-top:10px;">الرقم الأكاديمي</label></th>

                    </tr>
                    <tr class="table-light">


                        <th>حاضر </th>
                        <th>متأخز </th>
                        <th>مستأذن</th>
                        <th>غائب</th>

                        <th>حاضر </th>
                        <th>متأخز </th>
                        <th>مستأذن</th>
                        <th>غائب</th>
                        <th>حاضر </th>
                        <th>متأخز </th>
                        <th>مستأذن</th>
                        <th>غائب</th>
                        <th>حاضر </th>
                        <th>متأخز </th>
                        <th>مستأذن</th>
                        <th>غائب</th>
                        <th>حاضر </th>
                        <th>متأخز </th>
                        <th>مستأذن</th>
                        <th>غائب</th>
                        <th>حاضر </th>
                        <th>متأخز </th>
                        <th>مستأذن</th>
                        <th>غائب</th>
                        <th>حاضر </th>
                        <th>متأخز </th>
                        <th>مستأذن</th>
                        <th>غائب</th>
                        <th>حاضر </th>
                        <th>متأخز </th>
                        <th>مستأذن</th>
                        <th>غائب</th>
                        <th>حاضر </th>
                        <th>متأخز </th>
                        <th>مستأذن</th>
                        <th>غائب</th>
                        <th>حاضر </th>
                        <th>متأخز </th>
                        <th>مستأذن</th>
                        <th>غائب</th>
                        <th>حاضر </th>
                        <th>متأخز </th>
                        <th>مستأذن</th>
                        <th>غائب</th>
                        <th>حاضر </th>
                        <th>متأخز </th>
                        <th>مستأذن</th>
                        <th>غائب</th>
                    </tr>
                </thead>


                <tbody>

                @forelse ($students as $student)
                {{-- @dd($student) --}}
                    <tr class="table-light" id=" " >
                    @for ($i = 12; $i > 0; $i--)
                        <td><label class="persent">
                            <input type="radio" id="{{ $i.$student->user_id }}" value="present" wire:model="lecture.{{ $student->user_id.'.'.$i }}" />
                        </label> </td>
                        <td><label class="late">
                            <input type="radio" id="{{ $i.$student->user_id }}" value="late" wire:model="lecture.{{ $student->user_id.'.'.$i }}" />
                        </label> </td>

                        <td> <label class="permit">
                            <input type="radio" id="{{ $i.$student->user_id }}" value="permit" wire:model="lecture.{{ $student->user_id.'.'.$i }}" />
                        </label></td>

                        <td> <label class="absent">
                            <input type="radio" id="{{ $i.$student->user_id }}" value="absent" wire:model="lecture.{{ $student->user_id.'.'.$i }}" />
                        </label></td>
                    @endfor

                        <td colspan="5 " style="font-size: 12px;">{{ $student->user->full_name }}</td>
                        <td colspan="5 " style="font-size: 12px;">{{ $student->user_id }}</td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="55" style="text-align: center;">{{ __('general.no_students') }}</td>
                    </tr>
                @endforelse

                </tbody>
            </table>
        </div>
        <button type="submit" wire:click='sevePersents' class="btn btn-primary btn-sm" >حفظ</button>
    </div>

    <nav>
        {{ $students->links(myapp::viewPagination) }}
    </nav>


    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content2">

                <!-- Modal Header -->
                <div class="modal-header" id="modheader">
                    رفع الدرجات
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" style="display: block;">
                        <div class="form-group">
                            <!-- <label for="usr">Name:</label> -->

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
    <!-- <img src="../images/allocation (1).png" class="" width="150px">
        <div class="card-child-1"> Distributed System نظم تشغيل <br> تقنية معلومات - مستوى رابع<br>أ.منال العريقي
        </div>
    </div>
    <div class="card" style="margin-left: 22px;">
        <img src="../images/allocation (1).png" class="" width="150px">
        <div class="card-child-1"> Networks Management إدارة شبكات <br> تقنية معلومات - مستوى رابع<br>أ.منال العريقي
        </div> -->

</div>
