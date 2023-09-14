<?php

namespace App\Http\Controllers;

use App\Imports\LeaveImport;
use App\Models\Leave;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class LeaveController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->query('search') ? $request->query('search') : '';
        $sort = $request->query('sort') ? $request->query('sort') : 'date_leave';
        $direction = $request->query('direction') ? $request->query('direction') : 'desc';

        $leaves = Leave::with(['employee', 'approvedBy'])
            ->whereHas('employee', fn ($q) => $q->where('name', 'like', '%' . $search . '%'))
            ->orderBy($sort, $direction)
            ->paginate(10);

        return response()->json($leaves);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date_leave' => 'required|date',
            'is_approved' => 'boolean',
            $request->is_approved ? 'approved_by' : '' => 'required_if:is_approved,true|exists:employees,id',
        ]);

        $leave = Leave::create($validated);
        return response()->json(['data' => $leave,  'message' => 'Leave Added'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        $leave = Leave::with(['employee', 'approvedBy'])->find($id);
        return response()->json(['data' => $leave]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date_leave' => 'required|date',
            'is_approved' => 'boolean',
            $request->is_approved ? 'approved_by' : '' => 'required_if:is_approved,true|exists:employees,id',
        ]);

        Leave::where('id', $id)->update($validated);
        $leave = Leave::with(['employee', 'approvedBy'])->find($id);

        return response()->json(['data' => $leave,  'message' => 'Leave Edited']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        $deleted = Leave::where('id', $id)->delete();

        return response()->json(['deleted' => $deleted,  'message' => 'Leave Deleted']);
    }

    public function summary(string $year) {
        // $summary = Leave::whereYear('date_leave', $year)
        //     ->get()
        //     ->groupBy(function($val) {
        //         return Carbon::parse($val->date_leave)->format('m');
        //     });

        $summary = Leave::whereYear('date_leave', $year)->selectRaw('month(date_leave) month, monthname(date_leave) monthname, count(*) data_count')
        ->groupBy('month', 'monthname')
        ->orderBy('month', 'asc')
        ->get();

        return response()->json(['data' => $summary]);
    }

    public function import(Request $request) {
        $request->validate([
            'csv' => 'required|mimes:csv'
        ]);

        Excel::import(new LeaveImport, $request->file('csv'));

        return response()->json(['message' => 'Leave Added', 'data' => $request->file('csv')->getClientOriginalName()]);
    }
}
