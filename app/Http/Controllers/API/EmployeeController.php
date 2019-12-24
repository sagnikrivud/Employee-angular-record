<?php

namespace App\Http\Controllers\API;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EmployeeController extends Controller
{
    public function index()
    {
        return response()->json([
            'error' => false,
            'employees'  => Employee::all(),
        ], 200);
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[ 
            'name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'contact_number' => 'required',
            'position' => 'required',
        ]);

        if($validation->fails()){
            return response()->json([
                'error' => true,
                'messages'  => $validation->errors(),
            ], 200);
        }
        else
        {
            $employee = new Employee;
            $employee->name = $request->input('name');
            $employee->email = $request->input('email');
            $employee->contact_number = $request->input('contact_number');
            $employee->position = $request->input('position');
            $employee->save();
    
            return response()->json([
                'error' => false,
                'employee'  => $employee,
            ], 200);
        }
    }

    public function show($id)
    {
        $employee = Employee::find($id);

        if(is_null($employee)){
            return response()->json([
                'error' => true,
                'message'  => "Record with id # $id not found",
            ], 404);
        }

        return response()->json([
            'error' => false,
            'employee'  => $employee,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),[ 
            'name' => 'required',
            'email' => 'required|email',
            'contact_number' => 'required',
            'position' => 'required',
        ]);

        if($validation->fails()){
            return response()->json([
                'error' => true,
                'messages'  => $validation->errors(),
            ], 200);
        }
        else
        {
            $employee = Employee::find($id);
            $employee->name = $request->input('name');
            $employee->email = $request->input('email');
            $employee->contact_number = $request->input('contact_number');
            $employee->position = $request->input('position');
            $employee->save();
    
            return response()->json([
                'error' => false,
                'employee'  => $employee,
            ], 200);
        }
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);

        if(is_null($employee)){
            return response()->json([
                'error' => true,
                'message'  => "Record with id # $id not found",
            ], 404);
        }

        $employee->delete();
    
        return response()->json([
            'error' => false,
            'message'  => "Employee record successfully deleted id # $id",
        ], 200);
    }
}