@include('shared.return-message')
@extends('shared.layout')

@section('title')
{{ __('transactions.transaction') }}
@endsection

@section('content')
<form action="{{ route('transactions.store') }}" method="post">
    @csrf
    {{ __('transactions.material') }} <br>
    <select name="material_id" id="material_id">
        @foreach ($materials as $material)
            <option value="{{$material->id}}">{{$material->name}}</option>
        @endforeach
    </select>
    {{ __('transactions.transaction') }} <br>
    <select name="type" id="type">
        <option value="buy">{{ __('transactions.buy') }}</option>
        <option value="sell">{{ __('transactions.sell') }}</option>
    </select>
    <br>
    {{ __('transactions.priceKg') }}<br>
    <input type="number" step=0.01 name="pricePerUnit" id="pricePerUnit"><br>
    {{ __('transactions.quantityKg') }} <br>
    <input type="number" step=0.01 name="quantity" id="quantity"><br>
    <input type="submit" value="{{ __('transactions.save') }}">
</form>

<table>
    <tr>
        <th>{{ __('transactions.material') }}</th>
        <th>{{ __('transactions.transaction') }}</th>
        <th>{{ __('transactions.priceKg') }}</th>
        <th>{{ __('transactions.totalWeight') }}</th>
        <th>{{ __('transactions.totalPrice') }}</th>
    </tr>
    @foreach ($transactions as $transaction)
        <tr>
            <th>{{ $transaction->material->name }}</th>
            <th>{{ $transaction->type }}</th>
            <th>{{ $transaction->pricePerUnit }} $</th>
            <th>{{ $transaction->quantity }} kg</th>
            <th>{{ $transaction->pricePerUnit * $transaction->quantity }} $</th>
        </tr>
    @endforeach
</table>
@endsection