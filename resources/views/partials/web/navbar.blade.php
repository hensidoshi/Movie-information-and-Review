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
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/movies') }}">Movies</a></li>
            <li><a href="{{ url('/reviews') }}">Reviews</a></li>
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
                    <button id="profileBtn" style="display: flex; align-items: center; border: none; background: transparent; cursor: pointer; padding: 5px 10px; border-radius: 8px; font-family: inherit;">
                    <div style="margin-right: 12px; display: flex; align-items: center;">
                        <span style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; background-color: rgba(13, 110, 253, 0.15); color: #0d6efd; 
                            font-weight: 700; border-radius: 50%; font-size: 14px; text-transform: uppercase;">
                            {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
                        </span>
                    </div>
                    <span style="font-size: 15px; font-weight: 500; color: #9ca3af;">
                        {{ Auth::user()->name }}
                    </span>
                    <i class="fas fa-chevron-down" style="margin-left: 10px; font-size: 11px; color: #9ca3af;"></i>
                </button>

                    <div class="profile-dropdown" id="profileDropdown">
                        <div class="profile-name" style="display: flex; align-items: center; padding: 10px 12px; margin-bottom: 5px;">
    
                        <div style="margin-right: 12px; flex-shrink: 0;">
                            <span style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; background-color: rgba(13, 110, 253, 0.15); color: #0d6efd; 
                                font-weight: 700; border-radius: 50%; font-size: 14px; text-transform: uppercase;">
                                {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
                            </span>
                        </div>
                        <span style="font-size: 15px; font-weight: 600; color: #9ca3af; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            {{ Auth::user()->name }}
                        </span>
                    </div>
                        <a href="{{ url('/profile') }}">👤 Profile</a>
                        <a href="{{ url('/review') }}">⭐ My Reviews</a>
                        <a href="{{ url('/watchlist') }}">🔖 Watchlist</a>
                        <a href="{{ url('/settings') }}">⚙️ Settings</a>

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
