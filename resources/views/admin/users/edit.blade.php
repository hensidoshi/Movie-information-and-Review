@extends('layouts.admin.edit-app')

@section('title', 'Edit User')

@section('content')

@section('name', 'User')

<form action="{{ route('admin.users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- Name -->
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" 
               value="{{ old('name', $user->name) }}" required>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <!-- Email -->
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" 
               value="{{ old('email', $user->email) }}" required>
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <!-- Password -->
    <div class="mb-3">
        <label class="form-label">Password (leave blank to keep current)</label>
        <div class="password-wrapper" style="position: relative; display: flex; align-items: center;">
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter new password" style="padding-right: 40px;">
            <i class="bi bi-eye-fill toggle-password" 
            style="position: absolute; right: 12px; cursor: pointer; color: #6c757d; z-index: 10;" 
            onclick="togglePassword('password', this)"></i>
        </div>
        @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <!-- Confirm Password -->
    <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <div class="password-wrapper" style="position: relative; display: flex; align-items: center;">
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm new password" style="padding-right: 40px;">
            <i class="bi bi-eye-fill toggle-password" 
            style="position: absolute; right: 12px; cursor: pointer; color: #6c757d; z-index: 10;" 
            onclick="togglePassword('password_confirmation', this)"></i>
        </div>
    </div>
    <!-- Role -->
    <div class="mb-3">
        <label class="form-label">Role</label>
        <input type="text" class="form-control" value="{{ $user->role->name ?? 'User' }}" readonly>
        <input type="hidden" name="role_id" value="{{ $user->role_id ?? 2 }}">
        @error('role_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-outline-primary">Update</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Back</a>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function togglePassword(fieldId, icon) {
    const field = document.getElementById(fieldId);
    if (field.type === "password") {
        field.type = "text";
        icon.classList.remove('bi-eye-fill');
        icon.classList.add('bi-eye-slash-fill');
    } else {
        field.type = "password";
        icon.classList.remove('bi-eye-slash-fill');
        icon.classList.add('bi-eye-fill');
    }
}
</script>
@endsection