<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Display all roles
    public function index()
    {
        $roles = Role::all();
        return response()->json($roles);
    }

    // Show one role
    public function show(Role $role)
    {
        return response()->json($role);
    }

    // Store a new role
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $role = Role::create($request->all());
        return response()->json($role, 201);
    }

    // Update an existing role
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'string|max:255',
            'description' => 'nullable|string',
        ]);

        $role->update($request->all());
        return response()->json($role);
    }

    // Delete a role
    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json(null, 204);
    }
}
