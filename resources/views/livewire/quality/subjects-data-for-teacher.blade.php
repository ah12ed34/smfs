@section('nav')
    @livewire('components.nav.quality.subjects-data-for-teacher-header', compact('level', 'active', 'terms'))
@endsection

<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="container" style="padding-top: 30px; ">


        {{-- @livewire('global.group-subject.index') --}}
        @livewire('components.group-subjects-in-level', ['level' => $level, 'term' => $active['term'] ?? null])


    </div>
</div>
