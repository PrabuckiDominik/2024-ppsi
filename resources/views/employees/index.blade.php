Lista pracowników

<table>
    <tr>
        <th>Imie</th>
        <th>Nazwisko</th>
        <th>Płeć</th>
        <th>Numer telefonu</th>
        <th>Państwo</th>
        <th>Miasto</th>
        <th>Kod Pocztowy</th>
        <th>Ulica</th>
        <th>Budynek</th>
        <th>Mieszkanie</th>
        <th>Stanowisko</th>
        <th>Data urodzenia</th>
        <th>Data zatrudnienia</th>
        <th>Edytuj</th>
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
                <a href="{{ route('employees.edit', $employee) }}">Edytuj</a>
            </th>
        </tr>
    @endforeach
</table>