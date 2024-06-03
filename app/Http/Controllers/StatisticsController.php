<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class StatisticsController extends Controller
{
    protected const TWO_HOUR_IN_SECOND = 7200;
    protected const DEFAULT_JSON = [
        'defaultValues' => true,
        'name' => 'Price of aluminum',
        'interval' => 'Month',
        'unit' => 'Metric tone',
        'data' => [
            [
                'date' => '01.06.2024',
                'value' => '2501'
            ]
        ]
    ];
    public function index(){
        $data = $this->statistics();
        $json = $data->json;
        $materials = $data->materials;
        $employeesCount = $data->employeesCount;
        if(array_key_exists('defaultValues', $json)){
            session(['error' => 'Couldnt load data from API. Loaded default values']);
        }
        return view('statistics', compact('data'));
    }
    public function statistics(){
        $materials = $this->getMaterialsStatistics();
        $employeesCount = Employee::count();
        
        $json = Cache::remember('aluminum', $this::TWO_HOUR_IN_SECOND, function () {
            
            $apiKey = env('ALPHA_VANTAGE_API_KEY');
            $baseUrl = 'https://www.alphavantage.co/query';
            
            $response = Http::get($baseUrl, [
                'function' => 'ALUMINUM',
                'interval' => 'monthly',
                'apikey' => $apiKey,
            ]);
            if ($response->successful()) {
                $json = $response->json();
                if(
                    array_key_exists('name', $json) &&
                    array_key_exists('interval', $json) &&
                    array_key_exists('unit', $json) &&
                    array_key_exists('data', $json)
                ){
                        return $json;
                }
                return $this::DEFAULT_JSON;
            }
            
            return $this::DEFAULT_JSON;
        });
        return (object)[
            'materials' => $materials,
            'employeesCount' => $employeesCount,
            'json' => $json
        ];
    }
    public function simple_statistics(){
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
