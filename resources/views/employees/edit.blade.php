@include('shared.return-message')
@include('shared.guest-layout')
@extends('shared.layout')

@section('title')
{{ __('employees.employees') }}
@endsection


@section('content')
@auth

<div class="space-y-6">
    <h1 class=" text-2xl bold font-bold">{{ __('employees.employeesEdit') }}</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="post" class="space-y-4">
        @csrf
        @method('put')
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 text-center">
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th>{{ __('employees.firstname') }}</th>
                        <th>{{ __('employees.lastname') }}</th>
                        <th>{{ __('employees.gender') }}</th>
                        <th>{{ __('employees.phoneNumber') }}</th>
                        <th>{{ __('employees.country') }}</th>
                        <th>{{ __('employees.city') }}</th>
                        <th>{{ __('employees.zipCode') }}</th>
                        <th>{{ __('employees.street') }}</th>
                        <th>{{ __('employees.buildingNumber') }}</th>
                        <th>{{ __('employees.apartmentNumber') }}</th>
                        <th>{{ __('employees.position') }}</th>
                        <th>{{ __('employees.dateOfBirth') }}</th>
                        <th>{{ __('employees.hireDate') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><label id="firstnameLabel" for="firstname"> <input type="text" name="firstname" aria-labelledby="firstnameLable" id="firstname" value="{{ $employee->firstname }}" class="block border border-gray-300 rounded-md w-full"></td>
                        <td><input type="text" name="lastname" id="lastname" value="{{ $employee->lastname }}" class="block border border-gray-300 rounded-md w-full"></td>
                        <td><input type="text" name="gender" id="gender" value="{{ $employee->gender }}" class="block border border-gray-300 rounded-md w-full"></td>
                        <td><input type="text" name="phoneNumber" id="phoneNumber" value="{{ $employee->phoneNumber }}" class="block border border-gray-300 rounded-md w-full"></td>
                        <td><input type="text" name="country" id="country" value="{{ $employee->country }}" class="block border border-gray-300 rounded-md w-full"></td>
                        <td><input type="text" name="city" id="city" value="{{ $employee->city }}" class="block border border-gray-300 rounded-md w-full"></td>
                        <td><input type="text" name="zipCode" id="zipCode" value="{{ $employee->zipCode }}" class="block border border-gray-300 rounded-md w-full"></td>
                        <td><input type="text" name="street" id="street" value="{{ $employee->street }}" class="block border border-gray-300 rounded-md w-full"></td>
                        <td><input type="number" name="buildingNumber" id="buildingNumber" value="{{ $employee->buildingNumber }}" class="block border border-gray-300 rounded-md w-full"></td>
                        <td><input type="number" name="apartmentNumber" id="apartmentNumber" value="{{ $employee->apartmentNumber }}" class="block border border-gray-300 rounded-md w-full"></td>
                        <td><input type="number" name="position_id" id="position_id" value="{{ $employee->position_id }}" class="block border border-gray-300 rounded-md w-full"></td>
                        <td><input type="date" name="dateOfBirth" id="dateOfBirth" value="{{ $employee->dateOfBirth }}" class="block border border-gray-300 rounded-md w-full"></td>
                        <td><input type="date" name="hireDate" id="hireDate" value="{{ $employee->hireDate }}" class="block border border-gray-300 rounded-md w-full"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex justify-end px-2">
            <button type="submit" class="bg-indigo-800 hover:bg-indigo-900 text-white font-bold py-2 px-4 rounded ml-3">{{ __('employees.employee_data_update') }}</button>
            <a href="{{ route('employees.index') }}" class=" ml-3 justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-700 hover:bg-green-800">
                {{__('auth.back')}} 
            </a>
        </div>
    </form>

    @if (session('success'))
        <div class="mt-4 bg-green-100 border border-green-600 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ session('success') }}</strong>
        </div>
    @endif
</div>

@endsection
@endauth