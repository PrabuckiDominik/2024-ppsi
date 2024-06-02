@include('shared.return-message')
@include('shared.guest-layout')
@extends('shared.layout')

@section('title')
{{ __('mainpage.mainPage') }}
@endsection


@section('content')
@auth
<div class="min-h-full flex justify-center">
    <div class="w-full max-w-4xl bg-white shadow-md rounded p-10 relative">
        <div class="absolute top-2 right-6 py-5">
            <form action="{{ route('lang.switch', 'en') }}" method="post" class="inline-block">
                @csrf
                <input type="submit" value="pl" name="language" class="text-gray-800 text-sm font-medium underline px-1 bg-transparent border-none">
                <input type="submit" value="en" name="language" class="text-gray-800 text-sm font-medium underline px-1 bg-transparent border-none">
            </form>
        </div>
        <div class="space-y-6">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold mb-4">{{ __('mainpage.hello') }} {{ Auth::user()->email }}!</h1>
                <h1 class="text-3xl font-bold">{{ __('mainpage.functionalities') }}</h1>
            </div>
            <div>
                <h2 class="text-xl font-bold mb-4">{{ __('mainpage.employeeManagement') }}</h2>
                <p class="text-gray-700">{{ __('mainpage.employeeManagementDescription') }}</p>
            </div>
            <div>
                <h2 class="text-xl font-bold mb-4">{{ __('mainpage.editData') }}</h2> 
                <p class="text-gray-700">{{ __('mainpage.editDataDescription') }}</p>
            </div>
            <div>
                <h2 class="text-xl font-bold mb-4">{{ __('mainpage.addData') }}</h2>
                <p class="text-gray-700">{{ __('mainpage.addDataDescription') }}</p>
            </div>
            <div>
                <h2 class="text-xl font-bold mb-4">{{ __('mainpage.createAccount') }}</h2>
                <p class="text-gray-700">{{ __('mainpage.createAccountDescription') }}</p>
            </div>
            <div>
                <h2 class="text-xl font-bold mb-4">{{ __('mainpage.loginLogout') }}</h2> 
                <p class="text-gray-700">{{ __('mainpage.loginLogoutDescription') }}</p>
            </div>
            <div>
                <h2 class="text-xl font-bold mb-4">{{ __('mainpage.identifyUser') }}</h2> 
                <p class="text-gray-700">{{ __('mainpage.identifyUserDescription') }}</p>
            </div>
        </div>
    </div>
</div>

@endauth
@endsection