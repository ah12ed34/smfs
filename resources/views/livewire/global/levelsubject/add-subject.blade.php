<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    {{-- @dump($selected,$selectedRealey,$count,$page,$perPage) --}}
    {{-- @dump($page,$subjects->currentPage()) --}}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for='perPage'>{{ __("general.per_page") }}</label>
                <select id="perPage" wire:model.lazy='perPage' class="form-control">
                    <option value="5" >5</option>
                    <option value="10" >10</option>
                    <option value="15" >15</option>
                    <option value="20" >20</option>
                    {{-- <option value="{{ $group->max_students }}" >{{ __("general.all") }}</option> --}}
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for='search'>{{ __("general.search") }}</label>
                <input id="search" type="text" wire:model.lazy='search' class="form-control" />
            </div>
        </div>
    </div>
    {{-- @dump($select) --}}
    <div class="response col-md-11">
    <table class="table">
        <thead>
            <tr>
                <th>{{ __('general.active') }}</th>
                <th>{{ __('general.practical') }}</th>
                <th>{{ __('general.semester') }}</th>
                <th>{{ __("general.subjectname") }}</th>
                <th>{{ __("general.subjectname") }}</th>
                <th>{{ __("general.code_subject") }}</th>
                <th ><input type="checkbox"  wire:model.lazy='selectAll' ></th>
            </tr>
        </thead>
        <tbody>
            <form wire:submit='save'  >
            {{-- @php
                $i = $perPage * ($page -1);
            @endphp --}}
            @forelse($subjects as $subject)
            <tr>

                <td><input type="checkbox" wire:model.lazy='isActivated.{{ $subject->id }}' id='isActivated.{{ $subject->id }}' ></td>
                <td><input type="checkbox" wire:model.lazy='has_practical.{{ $subject->id }}' id='has_practical.{{ $subject->id }}' ></td>
                <td><input type="number" value="1" wire:model='semester.{{ $subject->id }}' id='semester.{{ $subject->id }}' placeholder="semester" ></td>
                <td>{{ $subject->name_en }}</td>
                <td>{{ $subject->name_ar }}</td>
                <td>{{ $subject->id }}</td>
                <td>
                    <input type="checkbox" id='{{ $subject->id }}' wire:model.lazy='select.{{ $subject->id }}' />
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="7">{{ __("general.no_data") }}</td>
            </tr>
            @endforelse
            <tr>
                <td colspan="7"><button type="submit" class="btn btn-primary">{{ __("general.add") }}</button></td>
            </tr>
            </form>

            <!-- Add more rows for other students -->
        </tbody>
    </table>
    {{ $subjects->links() }}
    </div>
</div>
