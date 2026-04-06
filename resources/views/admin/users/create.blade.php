@extends('layouts.admin.create-app')

@section('title', 'Add User')

@section('content')

@section('name', 'User')

<form action="{{ route('admin.users.store') }}" method="POST" novalidate>
    @csrf
    <!-- Name -->
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" 
               name="name" 
               class="form-control @error('name') is-invalid @enderror" 
               placeholder="Enter user name" 
               value="{{ old('name') }}">
        @error('name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Email -->
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" 
               name="email" 
               class="form-control @error('email') is-invalid @enderror" 
               placeholder="Enter email" 
               value="{{ old('email') }}">
        @error('email')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Password -->
    <div class="mb-3">
        <label class="form-label">Password</label>
        <div class="password-container">
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter new password">
            <i class="bi bi-eye-fill toggle-password" onclick="togglePassword('password', this)"></i>
        </div>
        @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <!-- Confirm Password -->
    <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <div class="password-container">
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm new password">
            <i class="bi bi-eye-fill toggle-password" onclick="togglePassword('password_confirmation', this)"></i>
        </div>
    </div>
    <!-- Role -->
    <div class="mb-3">
        <label class="form-label">Role</label>
        <input type="text" name="role_name" class="form-control" value="User" readonly>
        <input type="hidden" name="role_id" value="2">
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-outline-success">Save</button>
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