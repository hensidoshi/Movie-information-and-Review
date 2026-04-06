@extends('layouts.web.app')

@section('title', 'ReelBuzz | Settings')

@section('content')

<div class="container">
    <h2 class="page-title">Settings</h2>

    <div class="settings-layout">

        {{-- Sidebar --}}
        <aside class="sidebar">
            <ul>
                <li class="tab-link active" data-tab="account">Account</li>
                <li class="tab-link" data-tab="notifications">Notifications</li>
                <li class="tab-link" data-tab="appearance">Appearance</li>
            </ul>
        </aside>

        {{-- Main Form --}}
        <main class="form-area">
            <form method="POST" action="{{ route('settings.update') }}">
                @csrf

                {{-- Account Tab --}}
                <div id="account" class="tab-content active">

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

                </div>


                {{-- Notifications Tab --}}
                <div id="notifications" class="tab-content">

                    <h3 class="section-title">Notifications</h3>

                    <div class="checkbox-group">
                        <input type="checkbox" name="email_notifications"
                            {{ Auth::user()->email_notifications ? 'checked' : '' }}>
                        <span>Email Notifications</span>
                    </div>

                </div>


                {{-- Appearance Tab --}}
                <div id="appearance" class="tab-content">

                    <h3 class="section-title">Appearance</h3>

                    <div class="checkbox-group">
                        <input type="checkbox" name="dark_mode"
                            {{ Auth::user()->dark_mode ? 'checked' : '' }}>
                        <span>Enable Dark Mode</span>
                    </div>

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

document.addEventListener("DOMContentLoaded", function(){

const tabs = document.querySelectorAll(".tab-link");
const contents = document.querySelectorAll(".tab-content");

tabs.forEach(tab => {

tab.addEventListener("click", function(){

tabs.forEach(t => t.classList.remove("active"));
contents.forEach(c => c.style.display = "none");

tab.classList.add("active");

document.getElementById(tab.dataset.tab).style.display = "block";

});

});

// default
contents.forEach(c => c.style.display = "none");
document.querySelector(".tab-content.active").style.display = "block";

});

</script>