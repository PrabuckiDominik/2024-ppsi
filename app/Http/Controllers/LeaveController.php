<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Http\Requests\CreateLeaveRequest;

class LeaveController extends Controller
{
    public function index(){   
        $leaves = Leave::with('user')->get();
        return view('leaves', compact('leaves'));
    }
    public function store(CreateLeaveRequest $request){
        $validated = $request->validated();
        $validated['employee_id'] = auth()->id();
        Leave::create($validated);

        return redirect()->route('leaves.index')->with('success', 'Urlop został zapisany');
        
    }

    public function destroy($id){
        $leave = Leave::findOrFail($id);
        $leave->delete();
        return redirect()->route('leaves.index')->with('success', 'Urlop został anulowany');
    }
}
