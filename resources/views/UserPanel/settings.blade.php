@extends('layouts.userApp')

@section('title', 'ReelBuzz | Settings')

@section('content')

<div class="container">
    <h2 class="page-title">Settings</h2>

    <div class="settings-layout">
        {{-- Sidebar --}}
        <aside class="sidebar">
            <ul>
                <li class="active">Account</li>
                <li>Notifications</li>
                <li>Appearance</li>
            </ul>
        </aside>

        {{-- Main Form --}}
        <main class="form-area">
            <form method="POST" action="{{ route('settings.update') }}">
                @csrf

                {{-- Account --}}
                <h3 class="section-title">Account</h3>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="text-input"
                        value="{{ old('name', Auth::user()->name) }}">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="text-input"
                        value="{{ old('email', Auth::user()->email) }}">
                </div>

                {{-- Preferences --}}
                <h3 class="preferences-title">Preferences</h3>

                <div class="checkbox-group">
                    <input type="checkbox" name="dark_mode"
                        {{ Auth::user()->dark_mode ? 'checked' : '' }}>
                    <span>Enable Dark Mode</span>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" name="email_notifications"
                        {{ Auth::user()->email_notifications ? 'checked' : '' }}>
                    <span>Email Notifications</span>
                </div>

                {{-- Buttons --}}
                <div class="button-group mt-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </form>
        </main>
    </div>
</div>

@endsection
<script>
document.addEventListener("DOMContentLoaded", () => {

    const form = document.querySelector("form");
    const cancelBtn = document.querySelector(".button-group .btn[type='reset']");

    // Save button alert after form submit
    form.addEventListener("submit", (e) => {
        alert("Settings saved successfully!");
    });

    // Cancel button reset fields to original values
    cancelBtn.addEventListener("click", (e) => {
        e.preventDefault();

        const inputs = document.querySelectorAll(".text-input");
        inputs.forEach(input => {
            input.value = input.defaultValue;
        });

        const checkboxes = document.querySelectorAll("input[type='checkbox']");
        checkboxes.forEach(cb => {
            cb.checked = cb.defaultChecked;
        });

        alert("Changes cancelled");
    });

});
</script>
