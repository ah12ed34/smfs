@section('title', 'التكاليف')
@section('nav')
    @livewire('components.nav.student.nav-stud-assignements', ['practical' => $filter['practical'],'subjects' => $subjects,'subject' => $filter['subject']??null])
@endsection

<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="container"  style="padding-top:30px;">
        @forelse ($assignements as $assignement)
        <div id="card-send-assignments" class="card bg-light text-dark" style=" color: #0E70F2;">
            <div class="card-body">
                <!-- <div id="input-send-HW" class="container">
                    <input type="file" class="form-control" id="file-assignment" name="file">
                    <textarea type="text" class="form-control" rows="5" id="commit-sendassigne" name="commit"></textarea>
                    <button type="submit" class="btn btn-primary" id="btn-send-hw">تسليم </button>
                </div> -->
                {{-- @dd($assignement->group_file->deliverys->filter(function($delivery) {
                    return $delivery->groupStudents;
                })
                ) --}}
                {{-- @dd($assignement->group_file->deliverys->filter(function($delivery) {
                    return $delivery->groupStudent->where('student_id', auth()->user()->id);
                })->first()
                ) --}}
                {{-- @dd() --}}
                 {{-- ) --}}

                <table id="table-details-assignements" dir="rtl">
                    <tr>
                        <th id="table-header">اسم المادة</th>
                        <td id="text-table">{{ $assignement->group_file->group_subject->subject()->name_ar }}</td>
                    </tr>
                    <tr>
                        <th id="table-header">اسم التكاليف</th>
                        <td id="text-table">{{ $assignement->name }}</td>
                    </tr>
                    <tr>
                        <th id="table-header">الدرجة</th>
                        <td id="text-table">{{ $assignement->group_file->grade }}</td>
                    </tr>
                    <tr>
                        <th id="table-header">الوصف</th>
                        <td id="text-table">{{ $assignement->description  }}</td>
                    </tr>

                    <tr>
                        <th id="table-header">الملف</th>
                        <td id="text-table">@if ($assignement->file)
                            <a wire:click="download({{ $assignement->id }})" href="#" id="download-file">تحميل الملف</a>
                            @else
                            لا يوجد ملف
                        @endif</td>
                    </tr>
                    <tr>
                        <th id="table-header">تاريخ التسليم</th>
                        <td id="text-table">{{ $assignement->group_file->due_date }}</td>
                    </tr>


                </table>
                <div id="input-send-HW" class="container">

                    @if($assignement->delivery)
                    <button type="submit" class="btn btn-primary" id="btn-send-hw"
                    disabled
                    title="تم تسليم التكليف مسبقا"
                    style="cursor: not-allowed;"
                    >تم التسليم </button>
                    @elseif($assignement->group_file->due_date < now())
                    <button type="submit" class="btn btn-primary" id="btn-send-hw"
                    disabled
                        title="تم انتهاء موعد التسليم"
                        style="cursor: not-allowed;"
                        >تم انتهاء موعد التسليم </button>
                    @else
                    <input type="file" class="form-control" id="file-assignment.{{ $assignement->id }}" wire:model="file.{{ $assignement->id }}">
                    @error('file.' . $assignement->id)
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <textarea type="text" class="form-control" rows="5" id="commit-sendassigne.{{ $assignement->id }}" wire:model="comment.{{ $assignement->id }}"></textarea>
                    @error('comment.' . $assignement->id)
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary" id="btn-send-hw" wire:click="send({{ $assignement->id }})">تسليم </button>
                        @endif
                </div>
            </div>
        </div>
        @empty

        <div class="alert alert-warning" role="alert">
            No assignements found
        </div>

        @endforelse
        <nav>
        {{ $assignements->links(myapp::viewPagination) }}
    </nav>
</div>

</div>
