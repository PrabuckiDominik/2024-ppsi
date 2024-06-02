@include('shared.return-message')
@extends('shared.layout')

@section('title')
{{ __('transactions.transaction') }}
@endsection

@section('content')
        <form action="{{ route('transactions.store') }}" method="post" class="space-y-4">
            @csrf
            <div>
                <label for="material_id" class="block">{{ __('transactions.material') }}</label>
                <select name="material_id" id="material_id" class="block border border-gray-300 rounded-md w-full">
                    @foreach ($materials as $material)
                    <option value="{{ $material->id }}">{{ $material->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="type" class="block">{{ __('transactions.transaction') }}</label>
                <select name="type" id="type" class="block border border-gray-300 rounded-md w-full">
                    <option value="buy">{{ __('transactions.buy') }}</option>
                    <option value="sell">{{ __('transactions.sell') }}</option>
                </select>
            </div>
            <div>
                <label for="pricePerUnit" class="block">{{ __('transactions.priceKg') }}</label>
                <input type="number" step="0.01" name="pricePerUnit" id="pricePerUnit" class="block border border-gray-300 rounded-md w-full">
            </div>
            <div>
                <label for="quantity" class="block">{{ __('transactions.quantityKg') }}</label>
                <input type="number" step="0.01" name="quantity" id="quantity" class="block border border-gray-300 rounded-md w-full">
            </div>
            <div>
                <input type="submit" value="{{ __('transactions.save') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right">
                <br>
            </div>
        </form>

        <table class="w-full border-collapse border border-gray-300 mt-8 text-center odd:bg-gray-400">
            <thead>
                <tr>
                    <th class="border border-gray-300 bg-gray-500 text-white">{{ __('transactions.material') }}</th>
                    <th class="border border-gray-300 bg-gray-500 text-white">{{ __('transactions.transaction') }}</th>
                    <th class="border border-gray-300 bg-gray-500 text-white">{{ __('transactions.priceKg') }}</th>
                    <th class="border border-gray-300 bg-gray-500 text-white">{{ __('transactions.totalWeight') }}</th>
                    <th class="border border-gray-300 bg-gray-500 text-white">{{ __('transactions.totalPrice') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    <td class="border border-gray-300">{{ $transaction->material->name }}</td>
                    <td class="border border-gray-300">{{ $transaction->type }}</td>
                    <td class="border border-gray-300">{{ $transaction->pricePerUnit }} $</td>
                    <td class="border border-gray-300">{{ $transaction->quantity }} kg</td>
                    <td class="border border-gray-300">{{ $transaction->pricePerUnit * $transaction->quantity }} $</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if (session('success'))
            <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{ session('success') }}</strong>
            </div>
            @endif
@endsection
