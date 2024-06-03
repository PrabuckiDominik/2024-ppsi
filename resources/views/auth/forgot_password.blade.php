@extends('shared.login-layout')
@include('shared.return-message')

    
@section('title')
{{__('auth.loginHeader')}}
@endsection


@section('content')    
    <h2 class="text-2xl font-bold mb-6 text-center">{{__('auth.forgotPasswordHeader')}}</h2>
    <form action="{{ route('sendPasswordResetToken') }}" method="post" class="space-y-6">
        @csrf
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">{{__('auth.emailInput')}}</label>
            <input type="text" name="email" id="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('email')
                <span class="text-red-300 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <input type="submit" value="{{__('auth.forgotPasswordHeader')}} " class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">            
        </div>
    </form>
@endsection