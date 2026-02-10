<nav class="navbar">
    <div class="max-width nav-wrapper">

        <!-- Logo -->
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
            </a>
        </div>

        <!-- Menu -->
        <ul class="menu">
            <li><a href="{{ url('/userIndex') }}">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="{{ url('/userMovies') }}">Movies</a></li>
            <li><a href="{{ url('/userReviews') }}">Reviews</a></li>
        </ul>

        <!-- Right actions -->
        <div class="nav-actions">
            <form action="{{ route('movies.search') }}" method="GET" class="nav-actions">
                <input type="text" name="q" class="nav-search" placeholder="Search movies..." value="{{ request('q') }}">
                <button type="submit" style="display:none;">Search</button> 
            </form>
            
            @guest
                <a href="{{ route('login') }}" class="btn-login" style="color: #1e90ff; margin-right: 10px;">Login</a>
                <a href="{{ route('register') }}" class="btn-register" style="color: #1e90ff;">Register</a>
            @else
                <!-- Profile Dropdown -->
                <div class="profile">
                    <button id="profileBtn">
                        <i class="fas fa-user-circle"></i>{{ Auth::user()->name }}
                    </button>

                    <div class="profile-dropdown" id="profileDropdown">
                        <p class="profile-name">
                            <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                        </p>

                        <a href="{{ url('/userProfile') }}">👤 Profile</a>
                        <a href="{{ url('/userReview') }}">⭐ My Reviews</a>
                        <a href="{{ url('/userWatchlist') }}">🔖 Watchlist</a>
                        <a href="{{ url('/userSettings') }}">⚙️ Settings</a>

                        <form action="{{ route('logout') }}" method="POST" class="logout-form">
                            @csrf
                            <button type="submit">🚪 Logout</button>
                        </form>
                    </div>
                </div>
            @endguest

            <!-- Hamburger -->
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>

    </div>
</nav>
