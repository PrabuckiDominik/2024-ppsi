@include('shared.return-message')

<form action="{{ route('leaves.store') }}" method="post">
    @csrf
    Data rozpoczęcia urlopu <br>
    <input type="date" name="start_date" id="start_date">
    <br>
    Data zakończenia urlopu <br>
    <input type="date" name="end_date" id="end_date">
    <br>
    <input type="submit" name = "submit" value="Wypisz urlop">
</form>

<table>
    <tr>
        <th>Osoba</th>
        <th>Data rozpoczęcia</th>
        <th>Data zakończenia</th>
        <th>Anuluj urlop</th>
    </tr>
    @foreach ($leaves as $leave)
    <tr>
        <th>{{ $leave->user ? $leave->user->name : '---' }}</th>
        <th>{{ $leave->start_date }}</th>
        <th>{{ $leave->end_date }}</th>
        <th>
            <form method="POST" action="{{ route('leaves.destroy', $leave->id) }}">
                @csrf
                @method('delete')
                <button> X </button>
            </form>
        </th>
    </tr>
@endforeach

</table>