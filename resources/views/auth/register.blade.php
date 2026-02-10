<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('assets/css/user-style.css') }}">
    <title>ReelBuzz | Register | Movie Information & Reviews</title>
</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-card">
            <!-- Logo -->
            <div class="auth-logo">
                <img src="{{ asset('assets/images/logo.png') }}" alt="ReelBuzz Logo">
            </div>

            <h2 class="auth-title">Create Your Account</h2>
            <p class="auth-subtitle">Sign up to track your favorite movies and write reviews</p>

            <form method="POST" action="{{ route('register') }}" novalidate>
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Full Name" required>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" value="{{ old('password') }}" placeholder="Create Password" required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Repeat Password" required>
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <button type="submit" class="btn-primary">Register</button>
            </form>

            <div class="auth-footer">
                Already have an account? <a href="{{ route('login') }}">Login</a>
            </div>
        </div>
    </div>
</body>
</html>