@include('shared.return-message')

Pracownik
<form action="{{ route('employees.store') }}" method="post">
    @csrf
    @dump($employee)
    <input type="hidden" name="user_id" value="{{ $employee->user_id }}">
    <table>
        <tr>
            <th>{{ __('employees.firstname') }}</th>
            <th>{{ __('employees.lastname') }}</th>
            <th>{{ __('employees.gender') }}</th>
            <th>{{ __('employees.phoneNumber') }}</th>
            <th>{{ __('employees.country') }}</th>
            <th>{{ __('employees.city') }}</th>
            <th>{{ __('employees.zipCode') }} </th>
            <th>{{ __('employees.street') }}</th>
            <th>{{ __('employees.buildingNumber') }}</th>
            <th>{{ __('employees.apartmentNumber') }}</th>
            <th>{{ __('employees.position') }}</th>
            <th>{{ __('employees.dateOfBirth') }}</th>
            <th>{{ __('employees.hireDate') }}</th>
        </tr>
        <tr>
            <th><input type="text" name="firstname" id="firstname" value="{{ $employee->firstname }}"></th>
            <th><input type="text" name="lastname" id="lastname" value="{{ $employee->lastname }}"></th>
            <th><input type="text" name="gender" id="gender" value="{{ $employee->gender }}"></th>
            <th><input type="text" name="phoneNumber" id="phoneNumber" value="{{ $employee->phoneNumber }}"></th>
            <th><input type="text" name="country" id="country" value="{{ $employee->country }}"></th>
            <th><input type="text" name="city" id="city" value="{{ $employee->city }}"></th>
            <th><input type="text" name="zipCode" id="zipCode" value="{{ $employee->zipCode }}"></th>
            <th><input type="text" name="street" id="street" value="{{ $employee->street}}"></th>
            <th><input type="number" name="buildingNumber" id="buildingNumber" value="{{ $employee->buildingNumber }}"></th>
            <th><input type="number" name="apartmentNumber" id="apartmentNumber" value="{{ $employee->apartmentNumber }}"></th>
            <th><input type="text" name="position_id" id="position_id" value="{{ $employee->position_id }}"></th>
            <th><input type="date" name="dateOfBirth" id="dateOfBirth" value="{{ $employee->dateOfBirth }}"></th>
            <th><input type="date" name="hireDate" id="hireDate" value="{{ $employee->hireDate }}"></th>
        </tr>
    </table>
    <button type="submit">{{ __('employees.employee_data_update') }}</button>
</form>