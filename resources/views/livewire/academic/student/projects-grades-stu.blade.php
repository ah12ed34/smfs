<div>

    <div class="responsive"></div>


    <div class="container" id="container-project" style="  padding-top: 30px;">

        <div class="table-responsive-xl">
            <table class="table" style=" width:100%;">
                <thead class="table-header" style="font-size: 12px;">
                    <tr class="table-light" id="modldetials">
                        <th>ملاحظة</th>
                        <th>مجموع الدرجة </th>
                        <th> درجة المشروع</th>
                        <th> درجة المناقشة </th>
                        <th> المشروع </th>
                        <th>اسم الطالب</th>
                        <th>الرقم الأكاديمي </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                    <tr class="table-light" id="modldetials" style="margin-top:7px;">
                        <td>*******</td>
                        <td> ******</td>
                        <td>*******</td>
                        <td> ******</td>
                        <td>*******</td>
                        <td>{{ $student->user->full_name }}</td>
                        <td>{{ $student->user_id }}</td>
                    </tr>
                    @empty
                    <tr >
                        <td colspan="7" style="text-align: center;">{{ __('general.no_students') }}</tr>
                    </tr>
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>

    <nav>
        {{ $students->links(myapp::viewPagination) }}
    </nav>

</div>
