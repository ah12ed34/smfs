<div>
    <div class="container">

        <div class="table-responsive">
            <table class="table" width='100%' dir="rtl">
                <thead>
                    <tr>
                        <th>{{ __('general.subjectnameArabic') }}</th>
                        <th>{{ __('general.subjectnameEnglish') }}</th>
                        {{-- <th>{{ __("general.Type_subject") }}</th> --}}
                        @foreach ($groups as $group)
                            <th>{{ $group->name }}</th>
                            @foreach ($group->groups as $gro)
                                <th>{{ $gro->name }}</th>
                            @endforeach
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @forelse ($subjects as $subject)
                        <tr>
                            <td>{{ $subject->name_ar }}</td>
                            <td>{{ $subject->name_en }}</td>
                            @forelse ($groups as $group)
                                <td><select class="form-control" id="{{ $subject->id . $group->id }}"
                                        wire:model.lazy="sup_teacher_subject.{{ $group->id . ' ' . $subject->id }}">
                                        <option value="">{{ __('general.choose') }}</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->user_id }}">{{ $teacher->user->full_name }}
                                            </option>
                                        @endforeach
                                    </select></td>
                                @if ($subject->has_practical)
                                    @foreach ($group->groups as $grou)
                                        <td><select class="form-control" id="{{ $subject->id . '' . $grou->id }}"
                                                wire:model.lazy="sup_teacher_subject.{{ $grou->id . ' ' . $subject->id }}">
                                                <option value="">{{ __('general.choose') }}</option>
                                                @foreach ($teachers as $teacher)
                                                    <option value="{{ $teacher->user_id }}">
                                                        {{ $teacher->user->full_name }}</option>
                                                @endforeach
                                            </select></td>
                                    @endforeach
                                @elseif($group?->groups?->count() > 0)
                                    <td colspan="{{ $group?->groups?->count() }}">
                                        المادة لا تحتوي على عملي
                                    </td>
                                @endif

                            @empty
                            @endforelse
                            {{-- <td><select class="form-control" id="{{ $subject->id }}"
                                    wire:model.lazy="teacher_subject.{{ $subject->id }}">
                                    <option value="">{{ __('general.choose') }}</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->user_id }}">{{ $teacher->user->full_name }}
                                        </option>
                                    @endforeach
                                </select></td> --}}
                            {{-- @if ($subject->has_practical)
                                @foreach ($group->groups as $grou)
                                    <td><select class="form-control" id="{{ $subject->id . '' . $grou->id }}"
                                            wire:model.lazy="sup_teacher_subject.{{ $grou->id . ' ' . $subject->id }}">
                                            <option value="">{{ __('general.choose') }}</option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->user_id }}">
                                                    {{ $teacher->user->full_name }}</option>
                                            @endforeach
                                        </select></td>
                                @endforeach
                            @else
                                <td colspan="{{ $group?->groups?->count() }}">
                                    المادة لا تحتوي على عملي
                                </td>
                            @endif --}}


                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ count($groups) + count($groups->pluck('groups')->flatten()) + 2 }}"
                                class="text-center">{{ __('general.no_data') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


    </div>
</div>
</div>
