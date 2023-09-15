<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->query('search');
        $sort = $request->query('sort') ? $request->query('sort') : 'email';
        $direction = $request->query('direction') ? $request->query('direction') : 'asc';
        $per_page = $request->query('per_page') ? $request->query('per_page') : 10;

        $userRoles = User::with(['roles'])
            ->join('employees', 'employees.id', '=', 'users.employee_id')
            ->where('email', 'like', '%' . $search .'%' )
            ->select('users.id', 'email', 'employees.name')
            ->orderBy($sort, $direction)
            ->paginate($per_page);

        return response()->json($userRoles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::find($validated['user_id']);
        $user->roles()->sync([$validated['role_id']], false);

        return response()->json(['message' => 'User Role Added'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        $userRole = User::with(['roles', 'employee'])->find($id);

        return response()->json(['data' => $userRole]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        $request->validate([
            'role_id.*' => 'exists:roles,id',
        ]);

        $user = User::find($id);
        $user->roles()->sync($request->role_id);

        return response()->json(['message' => 'User Role Updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
    }
}