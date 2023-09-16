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
        $per_page = $request->query('per_page') ? $request->query('per_page') : 10;

        $roles = Role::withCount('users')
            ->where('deleted_at', null)
            ->where('name', 'like', '%' . $search . '%' )
            ->orderBy($sort, $direction)
            ->paginate($per_page);

        return response()->json($roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $checkRole = Role::where('name', $request->name)->where('deleted_at', '!=', null)->first();

        $validated = $request->validate([
            'name' => 'required|max:30' . ($checkRole ? '' : '|unique:roles,name'),
        ]);

        if($checkRole) {
            $checkRole->update(['deleted_at' => null]);
            $role = $checkRole;
        } else {
            $role = Role::create($validated);
        }

        return response()->json(['data' => $role,  'message' => 'Role Added'], 201);
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

        return response()->json(['data' => $role,  'message' => 'Role Updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        $deleted = Role::where('id', $id)->update(['deleted_at' => date('Y-m-d H:i:s')]);

        return response()->json(['deleted' => $deleted,  'message' => 'Role Deleted']);
    }
}
