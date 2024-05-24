<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-blue-100 flex justify-center items-start sm:pt-3.5 h-screen">
    <div class="bg-white p-8 rounded w-full min-h-screen sm:min-h-0 max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl md:shadow-md relative">
        
        
        
        @yield('content')



    </div>
</body>
</html>