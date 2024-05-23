<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-blue-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded w-full min-h-screen sm:min-h-0 max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl md:shadow-md sm:-mt-96 relative">
        <a href="{{ route('register') }}" class="absolute top-2 right-2 text-indigo-600 hover:text-indigo-800 text-sm font-medium">Don't have an account? Register.</a>
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
        <form action="{{ route('login') }}" method="post" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="text" name="email" id="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('email')
                    <span class="text-red-300 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('password')
                    <span class="text-red-300 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <input type="submit" value="Login" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            </div>
        </form>
    </div>
</body>
</html>