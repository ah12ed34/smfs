@extends('layouts.home')

@section('nav')
@endsection

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="{{ route('group.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="groupname">{{ __('general.groupname') }}</label>
                        <input type="text" class="form-control" id="groupname" name="groupname">
                    </div>
                    <div class="form-group">
                        <label for="maxstudent">{{ __('general.maxstudent') }}</label>
                        <input type="number" class="form-control" id="student_count" name="maxstudent">
                    </div>
                    <div class="form-group">
                        <label for="level">{{ __('general.level') }}</label>
                        <select class="form-control" id="level" name="level">
                            @foreach ($departments as $departman)
                                <optgroup label="{{ $departman->name }}">
                                    @foreach ($departman->levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                            <!-- Add options for other groups -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="parent_group">{{ __('general.group') }}</label>
                        <select class="form-control" id="parent_group" name="parent_group">
                            <option value="">{{ __('general.nathing') }}</option>
                            @foreach ($departments as $departmant)
                                <optgroup label="{{ $departmant->name }}">
                                    @foreach ($departmant->levels as $level)
                                        <optgroup label="{{ $level->name }}">
                                            @foreach ($level->groups as $group)
                                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </optgroup>

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="table_file">{{ __('general.schedule') }}</label>
                        <input type="file" class="form-control-file" id="table_file" name="table_file">
                    </div>
                    <!-- Add more form groups as needed -->
                    <button type="submit" class="btn btn-primary">{{ __('general.create') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection

