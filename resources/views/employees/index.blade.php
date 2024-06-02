{{ __('employees.listEmployees') }}

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
        <th>{{ __('employees.edit') }}</th>
    </tr>
    @foreach ($employees as $employee)
        <tr>
            <th>{{ $employee->firstname }}</th>
            <th>{{ $employee->lastname }}</th>
            <th>{{ $employee->gender }}</th>
            <th>{{ $employee->phoneNumber }}</th>
            <th>{{ $employee->country }}</th>
            <th>{{ $employee->city }}</th>
            <th>{{ $employee->zipCode }}</th>
            <th>{{ $employee->street}}</th>
            <th>{{ $employee->buildingNumber}}</th>
            <th>{{ $employee->apartmentNumber}}</th>
            <th>{{ $employee->position->name }}</th>
            <th>{{ $employee->dateOfBirth }}</th>
            <th>{{ $employee->hireDate }}</th>
            <th>
                <a href="{{ route('employees.edit', $employee) }}">{{ __('employees.edit') }}</a>
            </th>
        </tr>
    @endforeach
</table>