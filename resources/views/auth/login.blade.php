<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('assets/css/user-style.css') }}">
    <title>ReelBuzz | Login | Movie Information & Reviews</title>
</head>
<body>
    <div class="auth-wrapper">
    <div class="auth-card">
         <!-- Logo -->
        <div class="auth-logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="ReelBuzz Logo">
        </div>

        <h2 class="auth-title">Welcome Back</h2>
        <p class="auth-subtitle">Login to access your movie reviews and watchlist</p>
        <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" value="{{ old('password') }}" placeholder="Enter your password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn-primary">Login</button>
        </form>
        <div class="auth-footer">
            Don't have an account? <a href="{{ route('register') }}">Register</a>
        </div>
    </div>
</div>
</body>
</html>