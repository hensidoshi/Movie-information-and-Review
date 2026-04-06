<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/brand-logos/favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/brand-logos/favicon.png') }}" type="image/png">
    
    <link rel="stylesheet" href="{{ asset('assets/css/user-style.css') }}">
    <title>ReelBuzz | Admin Login | Dashboard Access</title>
</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-card">

            <!-- Logo -->
            <div class="auth-logo">
                <img src="{{ asset('assets/images/logo.png') }}" alt="ReelBuzz Logo">
            </div>

            <h2 class="auth-title">Admin Panel Access</h2>
            <p class="auth-subtitle">Login to manage movies, users & reviews</p>
            <form method="POST" action="{{ route('admin.login') }}" novalidate>
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter admin email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter admin password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn-primary">
                    Login as Admin
                </button>
            </form>
            <div class="auth-footer">
                Not an admin? 
                <a href="{{ route('login') }}">User Login</a>
            </div>
        </div>
    </div>
</body>
</html>
