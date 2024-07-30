<div>
    {{-- The best athlete wants his opponent at his best. --}}
    @if ($message)
        <div class="position-fixed top-50 start-50 translate-middle" style="z-index: 2000;" wire:ignore.self>
            <div class="alert alert-{{ $type }} alert-dismissible fade show text-center
         {{ $darkMode ? 'bg-dark text-light' : '' }}"
                role="alert">
                {{ $message }}
                <button type="button" id='closeAlert' class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

</div>
