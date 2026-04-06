<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Display all roles
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    // Show form to create a new role
    public function create()
    {
        return view('admin.roles.create');
    }

    // Store a new role
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
        ], [
            'name.required' => 'Role name is required.',
            'name.unique'   => 'This role already exists!',
        ]);

        Role::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role added successfully.');
    }

    // Show form to edit role
    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    // Update role
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
        ], [
            'name.required' => 'Role name is required.',
            'name.unique'   => 'This role already exists!',
        ]);

        $role->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role updated successfully.');
    }

    // Delete role
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role deleted successfully.');
    }

    // Show a role by ID via query param
    public function showById(Request $request)
    {
        $id = $request->query('id');

        if (!$id) {
            return redirect()->route('admin.roles.index')
                ->with('error', 'Please enter a Role ID.');
        }

        $role = Role::find($id);

        if (!$role) {
            return redirect()->route('admin.roles.index')
                ->with('error', 'Role not found.');
        }

        return redirect()->route('admin.roles.edit', $role->id);
    }

    // Show role details
    public function show(Role $role)
    {
        return view('admin.roles.view', compact('role'));
    }
}
