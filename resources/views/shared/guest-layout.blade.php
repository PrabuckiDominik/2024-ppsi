@guest
<body class="bg-blue-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-lg w-full bg-white shadow-md rounded p-6 relative">
            <div class="absolute top-2 left-6">
                <form action="{{ route('lang.switch', 'en') }}" method="post" class="inline-block">
                    @csrf
                    <input type="submit" value="pl" name="language" class="text-gray-800 text-sm font-medium underline px-1 bg-transparent border-none">
                    <input type="submit" value="en" name="language" class="text-gray-800 text-sm font-medium underline px-1 bg-transparent border-none">
                </form>
            </div>
            <h1 class="text-2xl font-bold mb-4 text-center">{{ __('mainpage.appName') }}</h1>
            <p class="mb-4 text-gray-700 text-center">{{ __('mainpage.toAccess') }}</p>
            <div class="space-y-4">
                <a href="{{ route('login') }}" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-800 hover:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('auth.login') }}
                </a>
                <p class="mb-4 text-gray-700 text-center">{{ __('mainpage.or') }}</p>
                <a href="{{ route('register') }}" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    {{ __('auth.register') }}
                </a>
            </div>
        </div>
    </div>
</body>


@endguest