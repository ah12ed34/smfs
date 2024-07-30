@section('nav')
@livewire('components.nav.manager_of_depart.managedepartlevel.depart-level-main-page-header',
['level' => $level,'typeGroup' => $typeGroup,])
@endsection
@section('homeLayout')
@include('components.sidebar.HOD')
@endsection
@section('homeLayoutM')
@include('components.sidebar.HODMO')
@endsection
<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

        <div class="container"  style="padding-top: 20px;" >

            <div class="table-responsive-xl">
                <table class="table" style=" width:100%;">
                    <thead class="table-header" style="font-size: 12px;">
                        <tr class="table-light" id="modldetials">
                            <th>عرض الطلاب</th>
                            <th>طلاب\طالبات</th>
                            <th> النظام </th>
                            <th> عدد الطلاب</th>
                            @if($typeGroup == 'sub')
                            <th>الرئيسية</th>
                            @endif
                            <th>  اسم المجموعة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($groups as $group)
                            <tr class="table-light" id="modldetials" style="margin-top:7px;">
                                <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModal2" onclick="location.href='{{route('students_group_information',[$level->id,$group->id])}}'">عرض</button> </td>
                                <td>{{ myapp::getStudentGender($group->gender) }}</td>
                                <td>{{ myapp::getSystem($group->system) }}</td>
                                <td>{{ $group->students->count() }}</td>
                                @if($typeGroup == 'sub')
                                <td>{{ $group->group->name }}</td>
                                @endif
                                <td>{{ $group->name }}</td>
                            </tr>
                            @empty
                            <tr class="table-light" id="modldetials" style="margin-top:7px;">
                                <td @if ($typeGroup == 'sub')
                                    colspan="6"
                                @else
                                    colspan="5"
                                @endif >{{ __('No data') }}</td>
                            </tr>
                        @endforelse
                        {{-- <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <!-- <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" data-toggle="modal" data-target="#myModalEdite">تعديل  <img src="../../images/edit.png" id=""  width="15px" ></button> </td>-->
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModal2" onclick="location.href='{{route('students_group_information',[$level->id,1])}}'">عرض</button> </td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                        </tr> --}}
                        {{-- <tr class="table-light">
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModal2" onclick="location.href='{{route('students_group_information')}}'">عرض</button> </td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                        </tr>
                        <tr class="table-light">
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModal2" onclick="location.href='{{route('students_group_information')}}'">عرض</button> </td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                        </tr>
                        <tr class="table-light">
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModal2" onclick="location.href='{{route('students_group_information')}}'">عرض</button> </td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
