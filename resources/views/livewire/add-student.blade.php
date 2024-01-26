<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <table class="table">
        <thead>
            <tr>
                <th>{{ __("general.level") }}</th>
                <th>{{ __("general.namestudent") }}</th>
                <th>{{ __("general.id") }}</th>
                <th>{{ __("general.add") }}</th>
            </tr>
        </thead>
        <tbody>
            <form wire:submit='save'>
                @csrf
            @forelse ($students as $student)
            <tr>
                <td>{{ $student->level->name }}</td>
                <td>{{ $student->user->name }}</td>
                <td>{{ $student->user_id }}</td>
                <td><input type="checkbox" wire:model='selected' value="{{ $student->user_id }}"
                    /></td>
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
</div>
@push('scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            const checkboxes = document.querySelectorAll('[wire\\:model="selected"]');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', () => {
                    const selected = Array.from(checkboxes)
                        .filter(checkbox => checkbox.checked)
                        .map(checkbox => checkbox.value);

                    @this.set('selected', selected);
                });
            });
        });
    </script>
@endpush
