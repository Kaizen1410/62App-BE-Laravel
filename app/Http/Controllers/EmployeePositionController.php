<?php

namespace App\Http\Controllers;

use App\Models\EmployeePosition;
use Illuminate\Http\Request;

class EmployeePositionController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->query('search');
        $sort = $request->query('sort') ? $request->query('sort') : 'name';
        $direction = $request->query('direction') ? $request->query('direction') : 'asc';

        $employeePositions = EmployeePosition::where('name', 'like', '%' . $search . '%' )->orderBy($sort, $direction)->paginate(10);

        return response()->json($employeePositions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EmployeePosition $employeePosition) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmployeePosition $employeePosition) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployeePosition $employeePosition) {
        //
    }
}
