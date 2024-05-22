<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(){
        $employees = Employee::with('position')->get();
        return view('employees', compact('employees'));
    }
}
