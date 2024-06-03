<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-blue-100 flex justify-center items-start sm:pt-3.5 h-screen">
    <div class="bg-white p-8 rounded w-full min-h-screen sm:min-h-0 max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl md:shadow-md relative">
        <form action="{{ route('lang.switch', 'en') }}" method="post">
            @csrf
            <input type="submit" value="pl" name="language" class="absolute top-2 left-6 text-gray-800 text-sm font-medium underline bg-transparent border-none ">
            <input type="submit" value="en" name="language" class="absolute top-2 left-16 text-gray-800 text-sm font-medium underline bg-transparent border-none ">
        </form>
        
        
        
        @yield('content')


        <a href="{{ route('dashboard') }}" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 mt-5">
            {{__('auth.back')}} 
        </a>
    </div>
</body>
</html>