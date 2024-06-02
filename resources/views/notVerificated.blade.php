@include('shared.return-message')
@include('shared.guest-layout')
@extends('shared.layout')

@section('title')
{{ __('mainpage.mainPage') }}
@endsection


@section('content')
@auth

            <h1 class="text-2xl font-bold mb-4 text-center">{{ __('mainpage.notVerified') }}</h1>
            <p class="mb-4 text-gray-700 text-center">{{ __('mainpage.notVerifiedMessage') }}</p>
@endauth
@endsection
