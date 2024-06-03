<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Leave;
use App\Http\Requests\CreateLeaveRequest;
use App\Models\User;

class LeaveController extends Controller
{
    public function index(){   
        $leaves = Leave::with('user')->get();
        $employees = Employee::select('user_id', 'firstname', 'lastname')->get();
        $usersNames = [];
        foreach ($employees as $key => $value) {
            $usersNames[$value->user_id] = [
                'firstname' => $value->firstname,
                'lastname' => $value->lastname
            ]; 
        }
        return view('leaves', compact('leaves', 'usersNames'));
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
