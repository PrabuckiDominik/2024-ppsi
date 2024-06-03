@extends('shared.login-layout')
@include('shared.return-message')

    
@section('title')
{{__('auth.forgotPasswordHeader')}}
@endsection


@section('content')    
    <h2 class="text-2xl font-bold mb-6 text-center">{{__('auth.forgotPasswordHeader')}}</h2>
    <form action="{{ route('changePassword', $token) }}" method="post" class="space-y-6">
        @csrf
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">{{__('auth.passwordInput')}}</label>
            <input type="password" name="password" id="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('password')
                <span class="text-red-300 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">{{__('auth.confirmPasswordInput')}}</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('password_confirmation')
                <span class="text-red-300 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <input type="submit" value="{{__('auth.forgotPasswordHeader')}} " class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">            
        </div>
    </form>
@endsection