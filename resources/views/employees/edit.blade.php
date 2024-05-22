@include('shared.return-message')

Pracownik
<form action="{{ route('employees.update', $employee->id) }}" method="post">
    @csrf
    @method('put')
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
            <th>Numer bloku</th>
            <th>Number mieszkania</th>
            <th>Stanowisko</th>
            <th>Data urodzenia</th>
            <th>Data zatrudnienia</th>
        </tr>
        <tr>
            <th> <input type="text" name="firstname" id="firstname" value="{{ $employee->firstname }}"> </th>
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
    <button type="submit">Aktualizuj dane pracownika</button>
</form>