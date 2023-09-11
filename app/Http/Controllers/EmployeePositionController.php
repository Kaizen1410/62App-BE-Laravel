<?php

namespace App\Http\Controllers;

use App\Models\EmployeePosition;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeePositionController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->query('search');
        $sort = $request->query('sort') ? $request->query('sort') : 'name';
        $direction = $request->query('direction') ? $request->query('direction') : 'asc';

        $employeePositions = EmployeePosition::where('name', 'like', '%' . $search . '%' )
            ->orderBy($sort, $direction)
            ->paginate(10);

        return response()->json($employeePositions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:30|unique:employee_positions,name',
        ]);

        $employeePosition = EmployeePosition::create($validated);

        return response()->json(['data' => $employeePosition, 'message' => 'Employee Position Added'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(EmployeePosition $employeePosition) {
        return response()->json(['data' => $employeePosition]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        $validated = $request->validate([
            'name' => [
                'required',
                'max:30',
                Rule::unique('employee_positions', 'name')->ignore($id),
            ]
        ]);

        EmployeePosition::where('id', $id)->update($validated);
        $employeePosition = EmployeePosition::find($id);

        return response()->json(['data' => $employeePosition]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        $deleted = EmployeePosition::where('id', $id)->delete();

        return response()->json(['deleted' => $deleted]);
    }
}
