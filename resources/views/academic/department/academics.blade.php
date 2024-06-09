@extends('layouts.home')
@section('nav')
@include('academic.department.nav')
@endsection

@section('content')


<div class="container" id="container-project" style="padding-top: 20px;">

    <div class="table-responsive-xl">
        <table class="table" style=" width:100%;">
            <thead class="table-header" style="font-size: 12px;">
                <tr class="table-light" id="modldetials">
                    <th>تعديل</th>
                    <th>التفاصيل</th>
                    <th>الصلاحية</th>
                    <th>التلفون</th>
                    <th> نوع الجندر</th>
                    <th>الإيمل الجامعي </th>
                    <th>المسمى الأكاديمي</th>
                    <th> الاسم</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($department->Academics as $academic)
                <tr class="table-light" @if($loop->first) id="modldetials" style="margin-top:7px;" @endif>
                    <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" data-toggle="modal" data-target="#myModalEdite">تعديل  <img src="{{ Vite::image('edit.png') }}" id=""  width="15px" ></button> </td>
                    <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModal2">التفاصيل</button> </td>
                    <!-- <td><button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal1" id="btn-chat-edit">الدردشة <img src="../../images/conversation (3).png" id=""  width="25px" ></button> </td> -->
                    <td>****</td>
                    <td>{{ $academic->user->phone }}</td>
                    <td>{{ $academic->user->gender_ar() }}</td>
                    <td>{{ $academic->user->email }}</td>
                    <td>{{ $academic->academic_name }}</td>
                    <td>{{ $academic->user->name }}</td>
                </tr>

                @empty

                @endforelse
                {{-- <tr class="table-light" id="modldetials" style="margin-top:7px;">
                    <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" data-toggle="modal" data-target="#myModalEdite">تعديل  <img src="../../images/edit.png" id=""  width="15px" ></button> </td>
                    <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModal2">التفاصيل</button> </td>
                    <!-- <td><button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal1" id="btn-chat-edit">الدردشة <img src="../../images/conversation (3).png" id=""  width="25px" ></button> </td> -->
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                </tr>
                <tr class="table-light">
                    <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" data-toggle="modal" data-target="#myModalEdite">تعديل  <img src="../../images/edit.png" id=""  width="15px" ></button> </td>
                    <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModal2">التفاصيل</button> </td>
                    <!-- <td><button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal1" id="btn-chat-edit">الدردشة <img src="../../images/conversation (3).png" id=""  width="25px" ></button> </td> -->
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                </tr> --}}


            </tbody>
        </table>
    </div>
</div>

@endsection
