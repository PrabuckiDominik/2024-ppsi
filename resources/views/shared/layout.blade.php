<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

@auth
<body class="bg-blue-100">
    <nav id="navbar" class="bg-gray-800 py-4 w-full z-10 top-0">
        <div class="container mx-auto flex justify-between items-center flex-col sm:flex-row px-4">
            <div class="text-white font-bold mb-4 sm:mb-0 sm:mr-4 flex flex-col sm:flex-row">
                <a href="{{ route('dashboard') }}" class="text-white text-4xl sm:text-xl block sm:inline-block mb-4 sm:mb-0 hover:text-indigo-400 px-2">{{ __('mainpage.mainPage') }}</a>
                <a href="{{ route('leaves.index') }}" class="text-white text-4xl sm:text-xl block sm:inline-block mb-4 sm:mb-0 mr-4 hover:text-indigo-400 px-2">{{ __('leaves.leaves') }}</a>
                <a href="{{ route('employees.index') }}" class="text-white text-4xl sm:text-xl block sm:inline-block mb-4 sm:mb-0 mr-4 hover:text-indigo-400 px-2">{{ __('employees.employees') }}</a>
                <a href="{{ route('statistics.index') }}" class="text-white text-4xl sm:text-xl block sm:inline-block mb-4 sm:mb-0 mr-4 hover:text-indigo-400 px-2">{{ __('statistics.statistics') }}</a>
                <a href="{{ route('transactions.index') }}" class="text-white text-4xl sm:text-xl block sm:inline-block mb-4 sm:mb-0 hover:text-indigo-400 px-2">{{ __('transactions.transaction') }}</a>
            </div>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-800 hover:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ __('auth.logout') }}</button>
            </form>
        </div>
    </nav>

    <button id="hideButton" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-600 sm:hidden fixed top-4 left-4 z-20">
        {{ __('mainpage.hide') }}
    </button>
    
    <style>
        @media (min-width: 640px) {
            #navbar {
                display: block !important;
            }
        }
    </style>
    
    <script>
        document.getElementById('hideButton').addEventListener('click', function() {
            var navbar = document.getElementById('navbar');
            var hideButton = document.getElementById('hideButton');
            if (navbar.style.display === 'none') {
                navbar.style.display = 'block';
                hideButton.textContent = "{{ __('mainpage.hide') }}";
            } else {
                navbar.style.display = 'none';
                hideButton.textContent = "{{ __('mainpage.show') }}";
            }
        });
    </script>
    
    <div class="min-h-full flex justify-center">
        <div class="w-full max-w-6xl bg-white shadow-md rounded p-10 relative min-h-screen sm:min-h-full">
            <div class="absolute top-2 right-6 py-5">
                <form action="{{ route('lang.switch', 'en') }}" method="post" class="inline-block">
                    @csrf
                    <input type="submit" value="pl" name="language" class="text-gray-800 text-sm font-medium underline px-1 bg-transparent border-none">
                    <input type="submit" value="en" name="language" class="text-gray-800 text-sm font-medium underline px-1 bg-transparent border-none">
                </form>
            </div>

            @yield('content')

        </div>
    </div>
</body>
@endauth
