<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->query('search');
        $sort = $request->query('sort') ? $request->query('sort') : 'name';
        $direction = $request->query('direction') ? $request->query('direction') : 'asc';

        $roles = Role::where('name', 'like', '%' . $search . '%' )->orderBy($sort, $direction)->paginate(10);

        return response()->json($roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:30|unique:roles,name',
        ]);

        $role = Role::create($validated);

        return response()->json(['data' => $role], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role) {
        return response()->json(['data' => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        $validated = $request->validate([
            'name' => [
                'required',
                'max:30',
                Rule::unique('roles', 'name')->ignore($id),
            ]
        ]);

        Role::where('id', $id)->update($validated);
        $role = Role::find($id);

        return response()->json([
            'message' => 'Updated',
            'data' => $role
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role) {
        $role->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
