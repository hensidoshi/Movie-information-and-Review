@extends('layouts.userApp')

@section('title', 'ReelBuzz | Profile')

@section('content')
<!-- Profile Page -->
<main class="profile-page">
    <div class="container">
        <div class="page-header">
            <h2>Updated Profile</h2>
        </div>

    <div class="grid-container">
        
        <!-- Basic Info Card -->
        <div class="compact-card">
            @if(session('success'))
                <div class="custom-alert-success" id="successMessage">
                    {{ session('success') }}
                </div>
            @endif
            <div class="top-section">
                <div class="user-info">
                    <div class="avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <span>{{ Auth::user()->name }}</span>
                </div>
                <button class="btn-main-blue">Change</button>
            </div>

            <form method="POST" action="{{ route('UserPanel.profile.update') }}">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ Auth::user()->email }}">
                </div>
                <button type="submit" class="btn-main-blue">Save changes</button>
            </form>
        </div>

        <!-- Security Card -->
        <div class="compact-card">
            <form>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="display_name" placeholder="Enter your name" value="{{ Auth::User()->name }}">
                </div>
                <div class="form-group">
                    <label>Account Password</label>
                    <div class="password-section">
                        <input type="password" value="********" readonly>
                        <a href="{{ route('UserPanel.password.change') }}" class="btn-main-blue">Change Password</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
    </div>
</main>
@endsection