@section('nav')
    @livewire('components.nav.quality.depart-levels-quality')
@endsection


<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="container" style="padding-top: 30px">
        @foreach ($levels as $level)
            <div class="card  cards-departments depart-level-quality" id=""
                onclick="window.location='{{ route('quality_board_main', [$level->id]) }}'">
                @if (4 <= $loop->index)
                    <img src="{{ $level->image ? asset('storage/' . $level->image) : Vite::image('level4.png') }}"
                        class="" width="150px">
                @else
                    <img src="{{ $level->image ? asset('storage/' . $level->image) : Vite::image('level' . ($loop->index + 1) . '.png') }}"
                        class="" width="150px">
                @endif
                <div class="card-departments-child">{{ $level->name }}
                </div>
            </div>
        @endforeach
        {{-- <div class="card  cards-departments depart-level-quality" id="" onclick="window.location='{{ route('quality_board_main')}}'">
                <img src="{{Vite::image("level1.png")}}" class="" width="150px">
                <div class="card-departments-child">  مستوى  اول
                </div>
            </div>

            <div class="card  cards-departments depart-level-quality" id="" onclick="window.location='{{ route('quality_board_main')}}'">
                <img src="{{Vite::image("level2.png")}}" class="" width="150px">
                <div class="card-departments-child"> مستوى ثاني
                </div>
            </div>

            <div class="card  cards-departments depart-level-quality" id="" onclick="window.location='{{ route('quality_board_main')}}'">
                <img src="{{Vite::image("level3.png")}}" class="" width="150px">
                <div class="card-departments-child">   مستوى ثالث
                </div>
            </div>

            <div class="card  cards-departments depart-level-quality" id="" onclick="window.location='{{ route('quality_board_main')}}'">
                <img src="{{Vite::image("level4.png")}}" class="" width="150px">
                <div class="card-departments-child"> مستوى  رابع
                </div>
            </div> --}}

    </div>
</div>
