@include('shared.return-message')
@extends('shared.layout')

@section('title')
{{ __('leaves.leaves') }}
@endsection


@section('content')
<div class="min-h-full flex justify-center">
    <div class="w-full max-w-4xl bg-white shadow-md rounded p-10 relative">
        <div class="absolute top-2 right-6">
            <form action="{{ route('lang.switch', 'en') }}" method="post" class="inline-block">
                @csrf
                <input type="submit" value="pl" name="language" class="text-gray-800 text-sm font-medium underline px-1 bg-transparent border-none">
                <input type="submit" value="en" name="language" class="text-gray-800 text-sm font-medium underline px-1 bg-transparent border-none">
            </form>
        </div>
        <div class="space-y-6">
            <form action="{{ route('leaves.store') }}" method="post" class="space-y-4">
                @csrf
                <div>
                    <label for="start_date" class="block">{{ __('leaves.startDate') }}</label>
                    <input type="date" name="start_date" id="start_date" class="block border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <label for="end_date" class="block">{{ __('leaves.endDate') }}</label>
                    <input type="date" name="end_date" id="end_date" class="block border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <input type="submit" name="submit" value="{{ __('leaves.enterLeave') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                </div>
            </form>

            <table class="w-full border-collapse border border-gray-300 mt-8 text-center odd:bg-gray-400">
                <thead>
                    <tr>
                        <th class="border border-gray-300 bg-gray-500 text-white">{{ __('leaves.firstnameAndLastname') }}</th>
                        <th class="border border-gray-300 bg-gray-500 text-white">{{ __('leaves.startDate') }}</th>
                        <th class="border border-gray-300 bg-gray-500 text-white">{{ __('leaves.endDate') }}</th>
                        <th class="border border-gray-300 bg-gray-500 text-white">{{ __('leaves.cancelLeave') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($leaves as $leave)
                    <tr>
                        <td class="border border-gray-300">{{ $leave->user ? $leave->user->name : '---' }}</td>
                        <td class="border border-gray-300">{{ $leave->start_date }}</td>
                        <td class="border border-gray-300">{{ $leave->end_date }}</td>
                        <td class="border border-gray-300 flex justify-center items-center"> <!-- Added styling here -->
                            <form method="POST" action="{{ route('leaves.destroy', $leave->id) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">X</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            
        </div>
    </div>
</div>

@endsection