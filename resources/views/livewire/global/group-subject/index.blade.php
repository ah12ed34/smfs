<div>
    <div class="container">
        <h1>بيانات المواد</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="crad">
                    <div class="card-header">
                        <h1>المجموعة</h1>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">اسم المجموعة: {{$group->name}}</h5>
                        <p class="card-text">عدد الطلاب: {{$group->students->count()}}</p>
                        <p class="card-text">اقصى عدد للطلاب: {{$group->max_students}}</p>
                        <p class="card-text">التخصص: {{$group->level->department->name}}</p>
                        <p class="card-text">المستوى: {{$group->level->name}}</p>
                        {{-- <p class="card-text">المجموعة الرئيسية: {{$group->group->name??__("general.no_groups")}}</p> --}}

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __("general.subjectname") }}</th>
                                <th>{{ __("general.subjectname") }}</th>
                                <th>{{ __("general.add") }}</th>
                                @foreach ($group->groups as $gro)
                                <th>{{ $gro->name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subjects as $subject)
                            <tr>
                                <td>{{ $subject->name_ar }}</td>
                                <td>{{ $subject->name_en }}</td>
                                <td><select class="form-control" id="{{ $subject->id }}" wire:model.lazy="teacher_subject.{{ $subject->id }}">
                                    <option value="">{{ __("general.choose") }}</option>
                                    @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->user_id }}">{{ $teacher->user->full_name }}</option>
                                    @endforeach
                                </select></td>
                                @if($subject->has_practical)
                                @foreach ($group->groups as $grou)
                                <td><select class="form-control" id="{{ $subject->id.''.$grou->id }}" wire:model.lazy="sup_teacher_subject.{{ $grou->id.' '.$subject->id }}">
                                    <option value="">{{ __("general.choose") }}</option>
                                    @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->user_id }}">{{ $teacher->user->full_name }}</option>
                                    @endforeach
                                </select></td>
                                @endforeach
                                @else
                                <td colspan="{{ ($group->groups)->count() }}">
                                    المادة لا تحتوي على عملي
                                </td>
                                @endif


                                {{-- <td><a href="{{ route('groupsubject.create', $subject->id) }}" class="btn btn-primary">{{ __("general.add") }}</a></td> --}}
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2">{{ __("general.no_data") }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
