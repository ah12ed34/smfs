@section('style')
    <style>
       /* center pagination */
        .pagination {
            justify-content: center;
            background-color: #E9EEEF;
        }

        .pagination .page-item.active {
            border-bottom: none;
        }

    </style>
@endsection
<div>
    {{-- add students to practical_group --}}
    <div class="container" dir="rtl" >
        <a class="btn btn-primary" href="{{ route("practical_group",[$group->id]) }}">الرجوع</a>
        <h1>اضافة طلاب</h1>
        <form wire:submit.prevent="addStudents">
            <div class="form-group">
                <label for="practical_group_name">اسم المجموعة</label>
                <input type="text" class="form-control" id="practical_group_name" name="practical_group_name" value="{{$group->level->department->name.'>'.$group->level->name.'>'.$group->name.'>'. $practical_group->name}}" disabled>
            </div>
            {{-- @dump($selectedStudents) --}}
            @forelse ($students as $student)

                <div class="form-check">
                    <input class="form-check" type="checkbox" value="{{$student->user_id}}" id="student_{{$student->user_id}}" wire:model="selectedStudents">
                    <label class="form-check" for="student_{{$student->user_id}}">
                        {{$student->name}}
                    </label>
                </div>

            @empty
                <p>لا يوجد طلاب</p>
            @endforelse
            <button type="submit" class="btn btn-primary">اضافة</button>
        </form>
        <div class="mt-3" dir="ltr">
            {{$students->links(myapp::viewPagination)}}
        </div>
    </div>



</div>
