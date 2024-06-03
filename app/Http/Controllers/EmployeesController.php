<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Mail\VerifyMail;
use App\Models\Employee;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
        $positions = Position::get();
        return view('employees.edit', compact('employee', 'positions'));
    }

    public function create_from_user($userId){

        $positions = Position::get();
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
        return view('employees.create', compact('employee', 'positions'));
    }

    public function store(CreateEmployeeRequest $request){
        $validated = $request->validated();
        $employee = Employee::create($validated);
        Mail::to($employee-> user ->email)->send(new VerifyMail($employee));
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
