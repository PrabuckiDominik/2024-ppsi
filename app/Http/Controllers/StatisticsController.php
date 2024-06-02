<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class StatisticsController extends Controller
{
    public function index(){

        $materials = $this->getMaterialsStatistics();
        $employeesCount = Employee::count();

        $apiKey = env('ALPHA_VANTAGE_API_KEY');
        $baseUrl = 'https://www.alphavantage.co/query';
        $commodity = 'AAPL';

        $response = Http::get($baseUrl, [
            'function' => 'ALUMINUM',
            'interval' => 'monthly',
            'apikey' => $apiKey,
        ]);

        if ($response->successful()) {
            $result = $response->json();
            return view('statistics', compact('result', 'materials', 'employeesCount'));
        }else{
            return view('statistics', compact('materials', 'employeesCount'))->withErrors(
                [
                    'API' => "Couldnt load data from API"
                ]
            );;
        }
    }
    public function statistics(){

        $materials = $this->getMaterialsStatistics();
        $employeesCount = Employee::count();
        return [
            'employees_count' => $employeesCount,
            'purchase_cost' => $materials->purchaseCost,
            'sell_cost' => $materials->sellCost,
            'sold_quantity' => $materials->soldQuantity,
            'bought_quantity' => $materials->boughtQuantity,
            'owned_material' => $materials->ownedMaterial
        ];
    }
    public function getMaterialsStatistics(){
        $totalPurchaseCost = Transaction::where('type', 'buy')
            ->sum(DB::raw('"pricePerUnit" * "quantity"'));
        $totalSellCost = Transaction::where('type', 'sell')
            ->sum(DB::raw('"pricePerUnit" * "quantity"'));
        $totalQuantityByType = Transaction::select('type', DB::raw('SUM(quantity) as total_quantity'))
            ->groupBy('type')
            ->get();
        $soldQuantity = $totalQuantityByType->where('type', 'sell')->sum('total_quantity');
        $boughtQuantity = $totalQuantityByType->where('type', 'buy')->sum('total_quantity');

        $ownedMaterial = $boughtQuantity - $soldQuantity;

        return (object)[
            'purchaseCost' => $totalPurchaseCost,
            'sellCost' => $totalSellCost,
            'soldQuantity' => $soldQuantity,
            'boughtQuantity' => $boughtQuantity,
            'ownedMaterial' => $ownedMaterial
        ];
    }
}