@if(session('success'))
    <div class="mb-2 bg-green-700 text-white pl-1.5 py-1.5 shadow-lg border-0 rounded-md" role="alert">
        {{ session('success') }}
    </div>
@endif

@if(session('warning'))
    <div class="mb-2 bg-orange-700 text-white pl-1.5 py-1.5 shadow-lg border-0 rounded-md" role="alert">
        {{ session('warning') }}
    </div>
@endif

@if(session('error'))
    <div class="mb-2 bg-red-700 text-white pl-1.5 py-1.5 shadow-lg border-0 rounded-md" role="alert">
        {{ session('error') }}
    </div>
@endif

@if(session('message'))
    <div class="mb-2 bg-blue-700 text-white pl-1.5 py-1.5 shadow-lg border-0 rounded-md" role="alert">
        {{ session('message') }}
    </div>
@endif

