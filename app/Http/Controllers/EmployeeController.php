<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->query('search');
        $sort = $request->query('sort') ? $request->query('sort') : 'name';
        $direction = $request->query('direction') ? $request->query('direction') : 'asc';

        $employees = Employee::with('employeePosition')
            ->where('name', 'like', '%' . $search . '%')
            ->orderBy($sort, $direction)
            ->paginate(10);

        return response()->json($employees);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:30',
            'employee_position_id' => 'required|exists:employee_positions,id'
        ]);

        $employee = Employee::create($validated);

        return response()->json(['data' => $employee], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        $employee = Employee::with('employeePosition')->find($id);
        return response()->json(['data' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        $validated = $request->validate([
            'name' => 'required|max:30',
            'employee_position_id' => 'required|exists:employee_positions,id'
        ]);

        Employee::where('id', $id)->update($validated);
        $employee = Employee::with('employeePosition')->find($id);

        return response()->json(['data' => $employee]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        $deleted = Employee::where('id', $id)->delete();

        return response()->json(['deleted' => $deleted]);
    }
}
