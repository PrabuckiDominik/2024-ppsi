
name: {{$result['name']}} <br>
interval {{$result['interval']}} <br>
unit {{$result['unit']}} <br>
date {{$result['data'][0]['date']}} <br>
value {{$result['data'][0]['value']}} <br>
<br><br>

totalPurchaseCost {{$materials->purchaseCost}} $<br>
totalSellCost {{$materials->sellCost}} $<br>
boughtQuantity {{$materials->boughtQuantity}} kg<br>
soldQuantity {{$materials->soldQuantity}} kg<br>
owned quantity {{$materials->ownedMaterial}} kg <br>

average price of owned material {{$materials->ownedMaterial * ($result['data'][0]['value'])/1000}} $

<br><br>

Employees count {{$employeesCount}}