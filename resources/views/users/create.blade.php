<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #f8f9fa;
        }
        .form-label {
            color: #f8f9fa;
        }
        .form-control {
            background-color: #2c2c2c;
            color: #f8f9fa;
            border: 1px solid #444;
            padding-right: 2.5rem; /* space for eye icon */
        }
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: none;
            background-color: #2c2c2c;
            color: #f8f9fa;
        }
        .invalid-feedback {
            font-size: 0.875rem;
        }
        .btn-success {
            color: #28a745;
            border: 1px solid #28a745;
            background-color: transparent;
            border-radius: 6px;
            padding: 8px 20px;
        }
        .btn-success:hover {
            background-color: #28a745;
            color: #fff;
        }
        .btn-secondary {
            color: #6c757d;
            border: 1px solid #6c757d;
            background-color: transparent;
            border-radius: 6px;
            padding: 8px 20px;
        }
        .btn-secondary:hover {
            background-color: #6c757d;
            color: #fff;
        }
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
        h2 {
            margin-bottom: 30px;
        }
        .container {
            max-width: 100%; 
            padding-left: 10%;
            padding-right: 10%;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>Add New User</h2>

    <!-- Flash messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST" novalidate>
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
            <button class="btn btn-success">Save</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>

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
</body>
</html>
