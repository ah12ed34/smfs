    @section('nav')
        @livewire('components.nav.academic.subject.recive-assignments'
        ,['group_subject'=>$group_subject,'tabActive'=>$tabActive])
    @endSection
<div>

    <div class="responsive"></div>
    <div class="container" id="container-project" style="  padding-top: 30px;" >


        <div class="table-responsive-xl">
            <table class="table" id="table" style=" margin-right: -30px; " >
                <thead class="table-header" style="font-size: 12px;">
                    <tr class="table-light" id="modldetials">
                        <th>ملاحظة </th>
                        <th>الدرجة</th>
                        <th>الملف</th>
                        <th> حالة التسليم</th>
                        <th>تاريخ التسليم</th>
                        <th> اسم الطالب</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($deliverys as $delivery)
                    {{-- @dd($delivery) --}}
                        <tr class="table-light" id="modldetials">
                            <td>{{ $delivery->comment }}</td>
                            <td>{{ $delivery->grade }}</td>
                            <td>
                                @if($delivery->file)
                                <a wire:click='download({{ $delivery->id }})' style="
                                    color: #007bff;
                                    text-decoration: none;
                                    cursor: pointer;
                                ">
                                    <i class="bi bi-download"></i>
                                </a>
                                @else
                                    <i class="bi bi-file-x"></i>
                                @endif
                            </td>
                            <td>{{ $delivery->status }}</td>
                            <td>{{ $delivery->delivery_date }}</td>
                            <td>{{ $delivery->student
                             }}</td>
                        </tr>
                    @empty

                    @endforelse
                    {{-- <tr class="table-light" id="modldetials" style="margin-top:7px;">

                        <td>*******</td>
                        <td>10</td>
                        <td> ***</td>
                        <td>*******</td>
                        <td>***** </td>
                        <td>SFMS</td>
                    </tr>
                    <tr class="table-light">
                        <td>*******</td>
                        <td>10</td>
                        <td> ***</td>
                        <td>*******</td>
                        <td>***** </td>
                        <td>SFMS</td>
                    </tr>
                    <tr class="table-light">
                        <td>*******</td>
                        <td>10</td>
                        <td> ***</td>
                        <td>*******</td>
                        <td>***** </td>
                        <td>SFMS</td>
                    </tr>
                    <tr class="table-light">
                        <td>*******</td>
                        <td>10</td>
                        <td> ***</td>
                        <td>*******</td>
                        <td>***** </td>
                        <td>SFMS</td>
                    </tr> --}}

                </tbody>
            </table>
        </div>
        <nav>
            {{ $deliverys->links(myapp::viewPagination) }}
        </nav>
    </div>
</div>
