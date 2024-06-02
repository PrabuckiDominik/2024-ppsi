<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmployeesController extends Controller
{
    public function index(){
        $employees = Employee::with('position')->get();
        $unverifiedUsers = User::leftJoin('employees', 'users.id', '=', 'employees.user_id')
        ->whereNull('employees.user_id')
        ->get(['users.*']);
        return view('employees.index', compact('employees', 'unverifiedUsers'));
    }

    public function edit(Employee $employee){
        return view('employees.edit', compact('employee'));
    }

    public function create_from_user($userId){
        
        $employee = (object)[
            'user_id' => $userId,
            'firstname' => "",
            'lastname' => "",
            'gender' => "",
            'phoneNumber' => "",
            'country' => "",
            'city' => "",
            'zipCode' => "",
            'street' => "",
            'buildingNumber' => "",
            'apartmentNumber' => "",
            'position_id' => "",
            'dateOfBirth' => "",
            'hireDate' => ""
        ];
        return view('employees.create', compact('employee'));
    }
    
    public function store(CreateEmployeeRequest $request){  
        $validated = $request->validated();
        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Wprowadzono dane pracownika');
        
    }
    
    public function destroy(CreateEmployeeRequest $request){
        $validated = $request->validated();
        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Wprowadzono dane pracownika');
        
    }
    public function update(UpdateEmployeeRequest $request, Employee $employee){
        Log::channel('activities')->info(auth()->user()->email .' (ID:' . auth()->id() . ') edited user: ' . $employee->firstname . ' ' . $employee->lastname . ' (ID: ' . $employee->id . ')');
        $validated = $request->validated();
        $employee->update($validated);
        return redirect()->route('employees.index')->with('success', 'Zaktualizowano dane pracownika');
    }
}
