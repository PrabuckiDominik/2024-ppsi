@include('shared.return-message')

<form action="{{ route('leaves.store') }}" method="post">
    @csrf
    {{ __('leaves.startDate') }} <br>
    <input type="date" name="start_date" id="start_date">
    <br>
    {{ __('leaves.endDate') }} <br>
    <input type="date" name="end_date" id="end_date">
    <br>
    <input type="submit" name = "submit" value="{{ __('leaves.enterLeave') }}">
</form>

<table>
    <tr>
        <th>{{ __('leaves.firstnameAndLastname') }}</th>
        <th>{{ __('leaves.startDate') }}</th>
        <th>{{ __('leaves.endDate') }}</th>
        <th>{{ __('leaves.cancelLeave') }}</th>
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