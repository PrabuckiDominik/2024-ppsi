<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Models\Material;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;




class TransactionsController extends Controller
{
    
    
    public function index(){   
        $materials = Material::get();
        $transactions = Transaction::with('material')->get();

        
        return view('transactions', compact('transactions', 'materials'));
    } 
    public function store(StoreTransactionRequest $request){
        $validated = $request->validated();
        Transaction::create($validated);

        return redirect()->route('transactions.index')->with('success', 'Transakcja została zapisana');
        
    }
}
