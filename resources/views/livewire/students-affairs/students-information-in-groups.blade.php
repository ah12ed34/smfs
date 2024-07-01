@section('nav')
@livewire('components.nav.students-affairs.students-information-in-groups-header'
,['level'=>$level,'isP' => $group->IsPractical()])
@endsection
<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

        <div class="container" style="padding-top: 20px;" >

            <div class="table-responsive-xl">
                <table class="table" style=" width:100%;">
                    <thead class="table-header" style="font-size: 12px;">
                        <tr class="table-light" id="modldetials">
                            <th> تعديل </th>
                            <th>{{ __('general.gender') }}</th>
                            <th> النظام </th>
                            <th>  اسم الطالب</th>
                            <th style="width: 140px;">   الرقم الأكاديمي</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <td style="width: 10%;">
                                <div class="dropdown">
                                    <button type="button"  class="btn btn-light moveStudent_to_anotherGroup_dropdown  dropdown-toggle" data-toggle="dropdown" >
                                            <div class="textdropdown">{{ $group->name }}</div>
                                        </button>
                                        <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                                            @forelse ($groups->where('id','!=',$student->group?->id??$group->id) as $groupD)
                                                <a id="" class="dropdown-item" style="padding-left:30px; "
                                                wire:click="moveStudent('{{ $student->user_id }}','{{ $groupD->id }}')"
                                                >{{ $groupD->name }}</a>
                                            @empty

                                            @endforelse
                                        </div>
                                </div>
                                </td>
                            <td>{{ $student->user->gender_ar() }}
                            <td>{{ $student->system() }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->user_id }}</td>

                        </tr>
                        @empty
                            <tr class="table-light" id="modldetials" style="margin-top:7px;">
                                <td colspan="5">No students found</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

            </div>
            <nav>
                    {{ $students->links(myapp::viewPagination) }}
                </nav>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

                @endif
        </div>

        <livewire:components.academic.students-affairs.add-students-in-group :group="$group" :groups="$groups" />
@section('script')
<script>
    window.addEventListener('refreshStudentsInGroup', event => {
        $('#AddStudentsIntoGroupModal').modal('hide');
        window.livewire.emit('refreshStudentsInGroup');
    });
</script>
@endsection
</div>
