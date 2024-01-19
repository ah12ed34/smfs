<div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session()->get('success') }}</strong>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            <strong>{{ session()->get('error') }}</strong>
        </div>
        @endif
        @if (session()->has('message'))
        <div class="alert " role="alert">
            <strong>{{ session()->get('message') }}</strong>
        </div>
        @endif
    @if ($status == '')
        <form wire:submit='save' >
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $key => $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            @endif
            <div class="form-group">
                <label for="department_id">القسم</label>
                <select wire:model="department_id" wire:change='dpc'  id="department_id" class="form-control">
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>



            <div class="form-group">
                <label for="level_id">المستوى</label>
                <select wire:model="level_id" id="level_id" class="form-control">
                    @foreach ($levels as $level)
                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="file">تحميل ملف Excel</label>
                <input type="file" class="form-control-file" id="file" wire:model="file">
                @error('file')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">تقديم</button>

        </form>
@else
<div class="file-progress text-center">
    <samp id="fill_name_progress">حالة: {{ $status }}</samp>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated"
            role="progressbar" aria-valuenow="75" aria-valuemin="10" aria-valuemax="100"
            style="width: {{ $progress }}%;">
            {{ $progress }}%
        </div>
    </div>
    <div class="box-log">
 @if ($status === 'completed')
        <div class="alert alert-success" role="alert">
            <strong>{!! nl2br(e($message)) !!}</strong>
        </div>
    @elseif ($status === 'failed')
        <div class="alert alert-danger" role="alert">
            <strong>{!! nl2br(e($message)) !!}</strong>
        </div>
    @else
        <div class="alert alert-info" role="alert">
            <strong>{!! nl2br(e($message)) !!}</strong>
        </div>
    @endif
    </div>

</div>

@endif
@section('style')
<style>
.file-progress {
    margin: 0 auto; /* Center the element horizontally */
    max-width: 600px; /* Set a maximum width if needed */
}

.progress {
    margin-bottom: 20px; /* Add margin to the progress bar */
}
.box-log{

    height: 250px;
    overflow: auto;
}
    </style>
@endsection
@push('scripts')
    <script>

        document.addEventListener('livewire:load', function () {
            Livewire.hook('message.processed', (message, component) => {
                if (component.fingerprint.name === 'create-exc') {
                    if (component.polling) {
                        setTimeout(() => {
                            component.pollLivewire();
                        }, 500); // Set your desired polling interval
                    }
                }
            });
        });


    </script>
@endpush
