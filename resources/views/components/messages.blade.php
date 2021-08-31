@if(session()->has('success'))
    <div id="status-message" class="absolute z-40 w-full m-4 p-4 bg-green-50 font-bold text-green-900 rounded shadow-sm">
        {{ session()->get('success') }}
    </div>
@endif
@if(count($errors))
    @foreach($errors->all() as $error)
    <div id="status-message" class="absolute z-40 w-full m-4 p-4 bg-red-50 font-bold text-red-900 rounded shadow-sm">
            {{ $error }}
        </div>
    @endforeach
@endif

@if(session()->has('error'))
    <div id="status-message" class="absolute z-40 w-full m-4 p-4 bg-red-50 font-bold text-red-900 rounded shadow-sm">
        {{ session()->get('error') }}
    </div>
@endif