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
            <div class="absolute top-2 right-6">
                <form action="{{ route('lang.switch', 'en') }}" method="post" class="inline-block">
                    @csrf
                    <input type="submit" value="pl" name="language" class="text-gray-800 text-sm font-medium underline px-1 bg-transparent border-none">
                    <input type="submit" value="en" name="language" class="text-gray-800 text-sm font-medium underline px-1 bg-transparent border-none">
                </form>
            </div>
            <h1 class="text-2xl font-bold mb-4 text-center">{{ __('mainpage.notVerified') }}</h1>
            <p class="mb-4 text-gray-700 text-center">{{ __('mainpage.notVerifiedMessage') }}</p>
@endauth
@endsection
