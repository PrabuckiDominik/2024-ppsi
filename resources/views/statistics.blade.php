@include('shared.return-message')
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
Time to next update <div id="timeToUpdate">-</div>
name: <div id="name">{{$data->json['name']}}</div> <br>
interval <div id="interval">{{$data->json['interval']}}</div> <br>
unit <div id="unit">{{$data->json['unit']}}</div> <br>
date <div id="date">{{$data->json['data'][0]['date']}}</div> <br>
value <div id="value">{{$data->json['data'][0]['value']}}</div> <br>
<br><br>

totalPurchaseCost <div id="purchaseCost">{{$data->materials->purchaseCost}}</div> $<br>
totalSellCost <div id="sellCost">{{$data->materials->sellCost}}</div> $<br>
boughtQuantity <div id="boughtQuantity">{{$data->materials->boughtQuantity}}</div> kg<br>
soldQuantity <div id="soldQuantity">{{$data->materials->soldQuantity}}</div> kg<br>
owned quantity <div id="ownedMaterial">{{$data->materials->ownedMaterial}}</div> kg <br>

average price of owned material <div id="averagePrice">{{$data->materials->ownedMaterial * ($data->json['data'][0]['value'])/1000}}</div> $

<br><br>

Employees count {{$data->employeesCount}}