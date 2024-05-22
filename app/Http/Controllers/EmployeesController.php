<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(){
        $employees = Employee::with('position')->get();
        return view('employees.index', compact('employees'));
    }

    public function edit(Employee $employee){
        return view('employees.edit', compact('employee'));
    }
    public function update(UpdateEmployeeRequest $request, Employee $employee){
        $validated = $request->validated();
        $employee->update($validated);
        return redirect()->route('employees.index')->with('success', 'Zaktualizowano dane pracownika');
    }
}
