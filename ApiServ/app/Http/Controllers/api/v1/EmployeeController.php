<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EmployeeController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->get('q'); // Get the search query from the request

        // If a search query is provided, use it to filter the posts
        if ($query) {
            $employees = Employee::where('name', 'like', '%' . $query . '%')
                                 ->orWhere('dob', 'like', '%' . $query . '%')
                                 ->orWhere('departement', 'like', '%' . $query . '%')
                                 ->orWhere('gender', 'like', '%' . $query . '%')
                                 ->get();
        } else {            
            $employees = Employee::all();
        }

        // Update the date format for each item in the collection
        $employees = $employees->map(function ($item) {
            $carbonDate = Carbon::parse($item['dob']);
            $customDate = $carbonDate->format('d F Y'); 
            $item['dob'] = $customDate;
            return $item;
        });

        return response()->json($employees);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name'          => 'required|string',
            'gender'        => 'required|string',
            'departement'   => 'required|string',
            'dob'           => 'required|date|date_format:Y-m-d'
        ]);

        $employee = Employee::create($request->all());
        return response()->json([
            'isSuccess' => true,
            'message'   => "Success Create New Employee",
            'data'      => $employee
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return response()->json($employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        // Validate the request data
        $request->validate([
            'name'          => 'required|string',
            'gender'        => 'required|string',
            'departement'   => 'required|string',
            'dob'           => 'required|date|date_format:Y-m-d'
        ]);
        
        $employee->update($request->all());
        return response()->json([
            'isSuccess' => true,
            'message'   => "Success Update New Employee",
            'data'      => $employee
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json([
            'isSuccess' => true,
            'message'   => "Success Delete Employee"
        ]);
    }
}
