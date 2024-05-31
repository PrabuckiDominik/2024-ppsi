@include('shared.return-message')

<form action="{{ route('transactions.store') }}" method="post">
    @csrf
    Material <br>
    <select name="material_id" id="material_id">
        @foreach ($materials as $material)
            <option value="{{$material->id}}">{{$material->name}}</option>
        @endforeach
    </select>
    Transaction <br>
    <select name="type" id="type">
        <option value="buy">Buy</option>
        <option value="sell">Sell</option>
    </select>
    <br>
    Price per unit in $/kg<br>
    <input type="number" step=0.01 name="pricePerUnit" id="pricePerUnit"><br>
    Quantity in kg <br>
    <input type="number" step=0.01 name="quantity" id="quantity"><br>
    <input type="submit" value="Zapisz">
</form>

<table>
    <tr>
        <th>Material</th>
        <th>Transaction</th>
        <th>Price per unit $/kg</th>
        <th>Total weight</th>
        <th>Total price</th>
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