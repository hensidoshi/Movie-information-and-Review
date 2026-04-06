@extends('layouts.admin.edit-app')

@section('title', 'Edit Role')

@section('content')

@section('name', 'Role')
    
<form action="{{ route('admin.roles.update', $role->id) }}" method="POST" novalidate>
    @csrf
    @method('PUT')
    <!-- Role Name -->
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text"
               name="name"
               value="{{ old('name', $role->name) }}"
               class="form-control @error('name') is-invalid @enderror"
               placeholder="Enter role name">
        @error('name')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>
    <!-- Buttons -->
    <button type="submit" class="btn btn-outline-primary">Update</button>
    <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-secondary">Back</a>
</form>
@endsection