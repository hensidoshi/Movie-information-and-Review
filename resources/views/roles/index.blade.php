@extends('layouts.app')

@section('title', 'Roles List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-white h3 mb-0">Roles List</h2>
    <a href="{{ route('roles.create') }}" class="btn btn-add">
        <i class="bi bi-plus-lg"></i> Add New Role
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="table-card shadow">
    <div class="table-responsive">
        <table id="rolesTable" class="table align-middle text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td class="actions-cell">
                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-sm btn-outline-info me-1">
                            <i class="bi bi-eye"></i> View
                        </a>
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-edit me-1">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-delete" onclick="return confirm('Are you sure?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="py-5 text-muted">No roles found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection