<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    {{-- @dump($selected,$selectedRealey,$count,$page,$perPage) --}}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for='perPage'>{{ __("general.per_page") }}</label>
                <select wire:model.lazy='perPage' class="form-control">
                    <option value="5" >5</option>
                    <option value="10" >10</option>
                    <option value="15" >15</option>
                    <option value="20" >20</option>
                    <option value="{{ $group->max_students }}" >{{ __("general.all") }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for='perPage'>{{ __("general.search") }}</label>
                <input type="text" wire:model.lazy='search' class="form-control" />
            </div>
        </div>
    </div>
    {{-- @dump($selected) --}}
    <table class="table">
        <thead>
            <tr>
                <th>{{ __("general.level") }}</th>
                <th>{{ __("general.namestudent") }}</th>
                <th>{{ __("general.id") }}</th>
                <th ><input type="checkbox"  wire:model.lazy='selectedAll' ></th>
            </tr>
        </thead>
        <tbody>
            <form wire:submit='save'  >
            {{-- @php
                $i = $perPage * ($page -1);
            @endphp --}}
            @forelse($students as $student)
            <tr>
                <td>{{ $student->level->name }}</td>
                <td>{{ $student->user->name }}</td>
                <td>{{ $student->user_id }}</td>
                <td>
                    <input type="checkbox" id='{{ $student->user_id }}' wire:model.lazy='selected.{{ $student->user_id }}' />
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="4">{{ __("general.no_data") }}</td>
            </tr>
            @endforelse
            <tr>
                <td colspan="4"><button type="submit" class="btn btn-primary">{{ __("general.add") }}</button></td>
            </tr>
            </form>

            <!-- Add more rows for other students -->
        </tbody>
    </table>
    {{ $students->links() }}
</style>
