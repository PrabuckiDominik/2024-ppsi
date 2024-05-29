@include('shared.return-message')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Strona Główna</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

@auth
    {{ __('auth.loggedInAs') }} {{ Auth::user()->email }}
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">{{ __('auth.logout') }}</button>
    </form>
    <br>
    <a href="{{ route('leaves.index') }}">{{ __('leaves.leaves') }}</a>
    <br>
    <a href="{{ route('employees.index') }}">{{ __('employees.employees') }}</a>
    <br>
    <a href="{{ route('transactions.index') }}">Transactions</a>
@endauth

@guest
<body class="antialiased bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-lg w-full bg-white shadow-md rounded p-6">
            <h1 class="text-2xl font-bold mb-4 text-center">Company Management</h1>
            <p class="mb-4 text-gray-700 text-center">To access the contents of this page, you need to either</p>
            <div class="space-y-4">
                <a href="{{ route('login') }}" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('auth.login') }}
                </a>
                <p class="mb-4 text-gray-700 text-center">or</p>
                <a href="{{ route('register') }}" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    {{ __('auth.register') }}
                </a>
            </div>
        </div>
    </div>
</body>

@endguest