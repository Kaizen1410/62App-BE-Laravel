<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserRoleController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->query('search');
        $sort = $request->query('sort') ? $request->query('sort') : 'email';
        $direction = $request->query('direction') ? $request->query('direction') : 'asc';

        $userRoles = User::with('roles')
            ->where('email', 'like', '%' . $search .'%' )
            ->orderBy($sort, $direction)
            ->paginate(10);

        return response()->json(['data' => $userRoles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        $userRoles = UserRole::where('user_id', $validated['user_id'])->get();

        // Check if the user already has the role
        foreach ($userRoles as $value) {
            if($value->role_id === $validated['role_id']) {
                return response()->json(['message' => 'User already have the role'], 400);
            }
        }

        $data = UserRole::create($validated);

        return response()->json(['data' => $data,  'message' => 'User Role Added'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        $userRole = User::with('roles')->find($id);

        return response()->json(['data' => $userRole]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        $deleted = UserRole::where('id', $id)->delete();
        return response()->json(['deleted' => $deleted,  'message' => 'User Role Deleted']);
    }
}