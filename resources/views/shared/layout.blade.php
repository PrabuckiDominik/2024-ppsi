<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Strona Główna</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

@auth
<body class="bg-blue-100">
    {{ __('auth.loggedInAs') }} {{ Auth::user()->email }}
    <nav class="bg-gray-800 py-4 fixed w-full z-10 top-0">
        <div class="container mx-auto flex justify-between items-center flex-col sm:flex-row px-4">
        <div class="text-white font-bold mb-4 sm:mb-0 sm:mr-4 flex flex-col sm:flex-row">
            <a href="{{ route('leaves.index') }}" class="text-white text-4xl sm:text-xl block sm:inline-block mb-4 sm:mb-0 mr-4 hover:text-indigo-400">{{ __('leaves.leaves') }}</a>
            <a href="{{ route('employees.index') }}" class="text-white text-4xl sm:text-xl block sm:inline-block mb-4 sm:mb-0 mr-4 hover:text-indigo-400">{{ __('employees.employees') }}</a>
            <a href="{{ route('transactions.index') }}" class="text-white text-4xl sm:text-xl block sm:inline-block mb-4 sm:mb-0 hover:text-indigo-400">Transactions</a>
        </div>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ __('auth.logout') }}</button>
        </form>
    </div>
    </nav>
    
    
    @yield('content')


    
</body>
@endauth