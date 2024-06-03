@if (session()->has('success') || session()->has('error') || session()->has('errors'))
    <div class="fixed bottom-0 left-0 w-full flex justify-center items-center">
        @if (session()->has('success'))
            <div class="mt-4 mb-8 bg-green-100 border border-green-600 text-green-800 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{ session('success') }}</strong>
            </div>
        @elseif (session()->has('error') || session()->has('errors'))
            <div class="mt-4 mb-8 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{ session('error') ?? session('errors') }}</strong>
            </div>
        @endif
    </div>
@endif