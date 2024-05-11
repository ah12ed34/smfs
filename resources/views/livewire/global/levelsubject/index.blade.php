<div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Level</th>
                <th>Department</th>
                <th>Number of Subjects</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($levels as $level)
                <tr>
                <td>{{ $level->name }}</td>
                <td>{{ $level->department->name }}</td>
                <td>{{ $level->subjects->count() }}</td>
                <td>
                                                            {{-- location.href --}}
                    <button class="btn btn-primary" onclick="window.location.href='{{ route('level.addsubject', $level->id) }}'">Add Subject</button>
                </td>
            </tr>
            @empty

            @endforelse


            <!-- Add more rows for other levels and departments -->
        </tbody>
    </table>
    {{ $levels->links(myapp::viewPagination) }}

</div>
