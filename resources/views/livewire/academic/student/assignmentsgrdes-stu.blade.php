<div>
@section('nav')
    @livewire('components.nav.academic.students'
    ,['group_subject'=>$group_subject,'active'=>'assignmentsgrdes-stu'])
@endsection
    <div class="container" id="container-project" style="  padding-top: 30px;">

        <div class="table-responsive-xl">
            <table class="table" style=" width:100%;">
                <thead class="table-header" style="font-size: 12px;">
                    <tr class="table-light" id="modldetials">
                        {{-- <th>ملاحظة</th> --}}
                        <th>الدرجة </th>
                        <th>لم يتم تسليمها ({{ sizeof($columnsName) }}) </th>
                        <th>تم تسليمها ({{ sizeof($columnsName) }}) </th>
                        @foreach ($columnsName as $column)
                        <th>{{ $column['name'] }}</th>
                        @endforeach
                        <th>اسم الطالب</th>
                        <th>الرقم الأكاديمي </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                    <tr class="table-light" id="modldetials" style="margin-top:7px;">

                        {{-- <td>*******</td> --}}
                        <td>{{ $student->grade }}</td>
                        <td>{{ $student->count_not_deliveries }}</td>
                        <td>{{$student->count_deliveries}}</td>
                        @for ($i = 0; $i < sizeof($columnsName); $i++)
                            @if (isset($student->assignments[$i]))
                            <td>{{ $student->assignments[$i]->delivery->grade ?? 0}}</td>
                            @else
                            <td>{{ 'لم يتم تسليمها' }}</td>
                            @endif
                            {{-- <td> ******</td> --}}

                        @endfor
                        <td>{{ $student->user->full_name }}</td>
                        <td>{{ $student->user_id }}</td>
                    </tr>
                    @empty

                    @endforelse


                </tbody>
            </table>
        </div>
    </div>

    <nav>
        {{ $students->links(myapp::viewPagination) }}
    </nav>





</div>
