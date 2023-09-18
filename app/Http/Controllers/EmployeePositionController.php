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
        $per_page = $request->query('per_page') ? $request->query('per_page') : 10;

        $employeePositions = EmployeePosition::where('deleted_at', null)
            ->where('name', 'like', '%' . $search . '%' )
            ->orderBy($sort, $direction)
            ->paginate($per_page);

        return response()->json($employeePositions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $checkPosition = EmployeePosition::where('name', $request->name)->where('deleted_at', '!=', null)->first();

        $validated = $request->validate([
            'name' => 'required|max:30' . ($checkPosition ? '' : '|unique:employee_positions,name'),
        ]);

        if($checkPosition) {
            $checkPosition->update(['deleted_at' => null]);
            $employeePosition = $checkPosition;
        } else {
            $employeePosition = EmployeePosition::create($validated);
        }

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

        return response()->json(['data' => $employeePosition,  'message' => 'Employee Position Updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        $deleted = EmployeePosition::where('id', $id)->update(['deleted_at' => date('Y-m-d H:i:s')]);

        return response()->json(['deleted' => $deleted,  'message' => 'Employee Position Deleted']);
    }
}
