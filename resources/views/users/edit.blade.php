<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #f8f9fa;
        }
        .form-label { color: #f8f9fa; }
        .form-control {
            background-color: #2c2c2c;
            color: #f8f9fa;
            border: 1px solid #444;
        }
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: none;
            background-color: #2c2c2c;
            color: #f8f9fa;
        }
        .btn-primary {
            color: #0d6efd;
            border: 1px solid #0d6efd;
            background-color: transparent;
            border-radius: 6px;
            padding: 8px 20px;
        }
        .btn-primary:hover { background-color: #0d6efd; color: #fff; }
        .btn-secondary {
            color: #6c757d;
            border: 1px solid #6c757d;
            background-color: transparent;
            border-radius: 6px;
            padding: 8px 20px;
        }
        .btn-secondary:hover { background-color: #6c757d; color: #fff; }
        .text-danger { font-size: 0.875rem; margin-top: 5px; display: block; }
        h2 { margin-bottom: 30px; }
        .container { max-width: 100%; padding-left: 10%; padding-right: 10%; }
        .password-container {
            position: relative;
            display: flex;
            align-items: center;
        }
        .password-container .form-control {
            padding-right: 2.5rem;
        }
        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c757d;
            font-size: 1.1rem;
            z-index: 10;
        }
        .toggle-password:hover {
            color: #f8f9fa;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-4">Edit User</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
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
            <div class="password-wrapper">
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
            <div class="password-wrapper">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm new password">
                <i class="bi bi-eye-fill toggle-password" onclick="togglePassword('password_confirmation', this)"></i>
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
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
