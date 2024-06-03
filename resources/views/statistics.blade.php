@include('shared.return-message')
@include('shared.guest-layout')
@extends('shared.layout')
{{Session::forget('error')}}

@section('title')
{{ __('statistics.statistics') }}
@endsection

@section('content')
@auth

<script>
    const UPDATE_INTERVAL = 600000
    let timeToUpdate = UPDATE_INTERVAL/1000
    setInterval(() => {
        fetch('/api/statistics')
        .then(response => response.json())
        .then(data => {
            console.log("data updated", data.json)
            console.log("data updated", data.json[0])
            const nameDiv = document.getElementById('name')
            const intervalDiv = document.getElementById('interval')
            const unitDiv = document.getElementById('unit')
            const dateDiv = document.getElementById('date')
            const valueDiv = document.getElementById('value')
            const purchaseCostDiv = document.getElementById('purchaseCost')
            const sellCostDiv = document.getElementById('sellCost')
            const boughtQuantityDiv = document.getElementById('boughtQuantity')
            const soldQuantityDiv = document.getElementById('soldQuantity')
            const ownedMaterialDiv = document.getElementById('ownedMaterial')
            const averagePriceDiv = document.getElementById('averagePrice')
            nameDiv.innerHTML = data.json.name
            intervalDiv.innerHTML = data.json.interval
            unitDiv.innerHTML = data.json.unit
            dateDiv.innerHTML = data.json.data[0].date
            valueDiv.innerHTML = data.json.data[0].value
            purchaseCostDiv.innerHTML = data.materials.purchaseCost
            sellCostDiv.innerHTML = data.materials.sellCost
            boughtQuantityDiv.innerHTML = data.materials.boughtQuantity
            soldQuantityDiv.innerHTML = data.materials.soldQuantity
            ownedMaterialDiv.innerHTML = data.materials.ownedMaterial
            averagePriceDiv.innerHTML = data.materials.ownedMaterial * (data.json.data[0].value/1000)
            timeToUpdate = UPDATE_INTERVAL/1000
        })
    }, UPDATE_INTERVAL);
    setInterval(() => {
        if(timeToUpdate >= 0){
            const timeToUpdateDiv = document.getElementById("timeToUpdate")
            timeToUpdateDiv.innerHTML = formatTime(timeToUpdate)
            timeToUpdate--
        }
    }, 1000);

    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const remainingSeconds = seconds % 60;
        return `${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;
    }

</script>

<style>
    .hidden-row {
        display: none;
    }
</style>

<div class="container mx-auto p-4">
    <h1 class=" text-2xl bold font-bold m-3">{{ __('statistics.statistics') }}</h1>
    <table class="w-full table-auto">
        <thead>
            <tr>
                <th class="border border-gray-300 bg-gray-500 text-white px-4 py-2">{{ __('statistics.attribute') }}</th>
                <th class="border border-gray-300 bg-gray-500 text-white px-4 py-2">{{ __('statistics.value') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border px-4 py-4">{{ __('statistics.time_to_next_update') }}</td>
                <td class="border px-4 py-4"><div id="timeToUpdate">-</div></td>
            </tr>
            <tr class="hidden-row">
                <td class="border px-4 py-4">{{ __('statistics.name') }}</td>
                <td class="border px-4 py-4"><div id="name">{{$data->json['name']}}</div></td>
            </tr>
            <tr class="hidden-row">
                <td class="border px-4 py-4">{{ __('statistics.interval') }}</td>
                <td class="border px-4 py-4"><div id="interval">{{$data->json['interval']}}</div></td>
            </tr>
            <tr class="hidden-row">
                <td class="border px-4 py-4">{{ __('statistics.unit') }}</td>
                <td class="border px-4 py-4"><div id="unit">{{$data->json['unit']}}</div></td>
            </tr>
            <tr>
                <td class="border px-4 py-4">{{ __('statistics.date') }}</td>
                <td class="border px-4 py-4"><div id="date">{{$data->json['data'][0]['date']}}</div></td>
            </tr>
            <tr>
                <td class="border px-4 py-4">{{ __('statistics.value') }}</td>
                <td class="border px-4 py-4"><div id="value">{{$data->json['data'][0]['value']}} $</div></td>
            </tr>
            <tr>
                <td class="border px-4 py-4">{{ __('statistics.total_purchase_cost') }}</td>
                <td class="border px-4 py-4"><div id="purchaseCost">{{$data->materials->purchaseCost}} $</div></td>
            </tr>
            <tr>
                <td class="border px-4 py-4">{{ __('statistics.total_sell_cost') }}</td>
                <td class="border px-4 py-4"><div id="sellCost">{{$data->materials->sellCost}} $</div></td>
            </tr>
            <tr>
                <td class="border px-4 py-4">{{ __('statistics.bought_quantity') }}</td>
                <td class="border px-4 py-4"><div id="boughtQuantity">{{$data->materials->boughtQuantity}} kg</div></td>
            </tr>
            <tr>
                <td class="border px-4 py-4">{{ __('statistics.sold_quantity') }}</td>
                <td class="border px-4 py-4"><div id="soldQuantity">{{$data->materials->soldQuantity}} kg</div></td>
            </tr>
            <tr>
                <td class="border px-4 py-4">{{ __('statistics.owned_quantity') }}</td>
                <td class="border px-4 py-4"><div id="ownedMaterial">{{$data->materials->ownedMaterial}} kg</div></td>
            </tr>
            <tr>
                <td class="border px-4 py-4">{{ __('statistics.average_price_owned_material') }}</td>
                <td class="border px-4 py-4"><div id="averagePrice">{{$data->materials->ownedMaterial * ($data->json['data'][0]['value'])/1000}} $</div></td>
            </tr>
            <tr>
                <td class="border px-4 py-4">{{ __('statistics.employees_count') }}</td>
                <td class="border px-4 py-4"><div id="employeesCount">{{$data->employeesCount}}</div></td>
            </tr>
        </tbody>
    </table>

@endauth
@endsection
