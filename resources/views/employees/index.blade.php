@include('shared.return-message')
@extends('shared.layout')

@section('title')
{{ __('employees.employees') }}
@endsection

@auth
@section('content')
<div class="space-y-6">
    <h1 class="text-2xl font-bold">{{ __('employees.listEmployees') }}</h1>
    <div class="overflow-auto">
        <table class="w-full border-collapse border border-gray-300 mt-8 text-center odd:bg-gray-400 min-w-max">
            <thead>
                <tr>
                    <th class="border border-gray-300 bg-gray-500 text-white">{{ __('employees.firstname') }}</th>
                    <th class="border border-gray-300 bg-gray-500 text-white">{{ __('employees.lastname') }}</th>
                    <th class="border border-gray-300 bg-gray-500 text-white">{{ __('employees.phoneNumber') }}</th>
                    <th class="border border-gray-300 bg-gray-500 text-white">{{ __('employees.hireDate') }}</th>
                    <th class="border border-gray-300 bg-gray-500 text-white">{{ __('employees.position') }}</th>
                    <th class="border border-gray-300 bg-gray-500 text-white">{{ __('employees.email') }}</th>
                    <th class="border border-gray-300 bg-gray-500 text-white">{{ __('employees.edit') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    @if($employee->user->role == "user")
                        <tr>
                            <td class="border border-gray-300">{{ $employee->firstname }}</td>
                            <td class="border border-gray-300">{{ $employee->lastname }}</td>
                            <td class="border border-gray-300">{{ $employee->phoneNumber }}</td>
                            <td class="border border-gray-300">{{ $employee->hireDate }}</td>
                            <td class="border border-gray-300">{{ $employee->position->name }}</td>
                            <td class="border border-gray-300">{{ $employee->user->email }}</td>
                            <td class="border border-gray-300">
                                <a href="{{ route('employees.edit', $employee) }}" class="max-h-1 px-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-700 hover:bg-green-800">{{ __('employees.edit') }}</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>


    <h1 class="text-2xl font-bold">{{ __('employees.unverifiedUsers') }}</h2>
    <div class="overflow-auto">
        <table class="w-full border-collapse border border-gray-300 mt-8 text-center min-w-max">
            <thead>
                <tr>
                    <th class="border border-gray-300 bg-gray-500 text-white">ID</th>
                    <th class="border border-gray-300 bg-gray-500 text-white">{{ __('employees.name') }}</th>
                    <th class="border border-gray-300 bg-gray-500 text-white">{{ __('employees.email') }}</th>
                    <th class="border border-gray-300 bg-gray-500 text-white" style="width: 100px;">{{ __('employees.verify') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($unverifiedUsers as $unverifiedUser)
                    @if($unverifiedUser->role == "user")
                    <tr>
                        <td class="border border-gray-300">{{ $unverifiedUser->id }}</td>
                        <td class="border border-gray-300">{{ $unverifiedUser->name }}</td>
                        <td class="border border-gray-300">{{ $unverifiedUser->email }}</td>
                        <td class="border border-gray-300">
                            <a href="{{ route('employees.create_from_user', $unverifiedUser->id) }}" class="max-h px-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-700 hover:bg-green-800">{{ __('employees.verify') }}</a>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endauth
@endsection
