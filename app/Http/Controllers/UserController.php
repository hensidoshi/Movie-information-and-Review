<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Display all users
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Show form to create a new user
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    // Store a new user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required|integer',
        ], [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'email.unique' => 'This email is already registered!',
            'password.required' => 'Password is required.',
            'password.confirmed' => 'Passwords do not match.',
            'role_id.required' => 'Please select a role.',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('users.index')
            ->with('success', 'User added successfully.');
    }

    // Show form to edit user
    public function edit(User $user)
    {
        $roles = Role::all(); // get all roles
        return view('users.edit', compact('user', 'roles'));
    }

    // Update user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'role_id' => 'required|integer',
        ], [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'email.unique' => 'This email is already registered!',
            'password.required' => 'Password is required.',
            'password.confirmed' => 'Passwords do not match.',
            'role_id.required' => 'Please select a role.',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully.');
    }

    // Delete user
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully.');
    }

    // Show user by ID via query param
    public function showById(Request $request)
    {
        $id = $request->query('id');

        if (!$id) {
            return redirect()->route('users.index')
                ->with('error', 'Please enter a User ID.');
        }

        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')
                ->with('error', 'User not found.');
        }

        return redirect()->route('users.edit', $user->id);
    }

    // Show user details
    public function show(User $user)
    {
        $user->load('role');
        return view('users.view', compact('user'));
    }
}
