<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('assets/css/user-style.css') }}">
    <title>ReelBuzz | Change Password | Movie Information & Reviews</title>
</head>
<body>
<div class="auth-wrapper">
    <div class="auth-card">
        <!-- Logo -->
            <div class="auth-logo">
                <img src="{{ asset('assets/images/logo.png') }}" alt="ReelBuzz Logo">
            </div>
        <h3>Change Password</h3>
        <form method="POST" action="{{ route('UserPanel.password.update') }}">
            @csrf

            @if(session('password_success'))
                <div class="custom-alert-success" id="successMessage">
                    {{ session('password_success') }}
                </div>
            @endif

            <div class="form-group">
                <label>Current Password</label>
                <input type="password" name="current_password" placeholder="Enter current password" required>
            </div>

            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="new_password" placeholder="Enter new password" required>
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="new_password_confirmation" placeholder="Confirm new password" required>
            </div>

            <button type="submit" class="btn-auth">Update Password</button>
        </form>
    </div>
</div>
</body>
</html>
