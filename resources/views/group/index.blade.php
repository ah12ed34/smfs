@extends('layouts.home')

@section('nav')
@endsection

@section('content')
<div class="container">
    <h1>بيانات المجموعة</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group" style="margin-bottom: 0px;">
                <a href="{{ route('group.create') }}" class="btn btn-primary">{{ __("general.add") }}</a>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>{{ __("general.groupname") }}</th>
                <th>{{ __('general.department') }}</th>
                <th>{{ __("general.level") }}</th>
                <th>{{ __("general.group") }}</th>
                <th>{{ __("general.maxstudent") }}</th>
                <th>{{ __("general.createAt") }}</th>
                <th>{{ __("general.add_student") }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($groups as $group)
            <tr>
                <td>{{ $group->name }}</td>
                <td>{{ $group->level->department->name }}</td>
                <td>{{ $group->level->name }}</td>
                <td>{{ $group->group->name??__("general.no_groups") }}</td>
                <td>{{ $group->max_students }}</td>
                <td>{{ $group->created_at }}</td>
                <td><a href="{{ route('group.add-student', $group->id) }}" class="btn btn-primary">{{ __("general.add_student") }}</a></td>
            </tr>
            @empty
            <tr>
                <td colspan="7">{{ __("general.no_data") }}</td>
                <td colspan="2"><a href="{{ route('group.create') }}" class="btn btn-primary">{{ __("general.add") }}</a></td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>


@endsection
