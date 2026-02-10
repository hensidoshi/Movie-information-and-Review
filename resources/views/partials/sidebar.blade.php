<!-- Start::app-sidebar -->
<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="{{ route('index') }}" class="header-logo" style="display: flex; align-items: center; padding: 10px;">
            <img src="{{ asset('assets/images/brand-logos/desktop-logo.png') }}" 
                alt="ReelBuzz Logo" 
                style="height: 90px !important; width: auto !important; max-width: 180px; display: block !important; object-fit: contain;">
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
            </div>
            <ul class="main-menu" style="list-style: none; padding: 0;">
                <li class="slide__category" style="padding: 10px 20px; font-size: 11px; color: #8c90a7; text-transform: uppercase;">Dashboards</li>
                <li class="slide">
                    <a href="{{ route('index') }}" class="side-menu__item" style="display: flex; align-items: center; padding: 12px 20px; text-decoration: none; color: #a3aed1; transition: 0.3s;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256" style="width: 18px; height: 18px; margin-right: 12px; stroke: currentColor; fill: none;">
                            <rect width="256" height="256" fill="none"/>
                            <path d="M104,216V152h48v64h64V120a8,8,0,0,0-2.34-5.66l-80-80a8,8,0,0,0-11.32,0l-80,80A8,8,0,0,0,40,120v96Z" stroke-width="16" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="side-menu__label" style="font-size: 14px;">Dashboards</span>
                    </a>
                </li>
                <li class="slide__category" style="padding: 10px 20px; font-size: 11px; color: #8c90a7; text-transform: uppercase;">Tables</li>
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item" style="display: flex; align-items: center; padding: 12px 20px; text-decoration: none; color: #a3aed1;">
                        <i class="ri-database-line side-menu__icon" style="font-size: 18px; margin-right: 12px;"></i>
                        <span class="side-menu__label" style="font-size: 14px; flex-grow: 1;">Tables</span>
                        <i class="ri-arrow-right-s-line side-menu__angle" style="font-size: 14px;"></i>
                    </a>
                    <ul class="slide-menu child1" style="list-style: none; padding-left: 45px;">
                        <li class="slide">
                            <a href="{{ route('users.index') }}" class="side-menu__item">Users</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('movies.index') }}" class="side-menu__item">Movies</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('reviews.index') }}" class="side-menu__item">Reviews</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('watchlists.index') }}" class="side-menu__item">Watchlists</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('genres.index') }}" class="side-menu__item">Genres</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('movieGenres.index') }}" class="side-menu__item">Movie Genres</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('actors.index') }}" class="side-menu__item">Actors</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('movieActors.index') }}" class="side-menu__item">Movie Actors</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('directors.index') }}" class="side-menu__item">Directors</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('languages.index') }}" class="side-menu__item">Languages</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('roles.index') }}" class="side-menu__item">Role</a>
                        </li>
                    </ul>
                </li>

                <li class="slide__category" style="padding: 10px 20px; font-size: 11px; color: #8c90a7; text-transform: uppercase;">Account</li>
                <li class="slide">
                    <a href="javascript:void(0);" class="side-menu__item" style="display: flex; align-items: center; padding: 12px 20px; text-decoration: none; color: #ef4444;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="ri-logout-box-r-line side-menu__icon" style="font-size: 18px; margin-right: 12px;"></i>
                        <span class="side-menu__label" style="font-size: 14px;">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>
<!-- End::app-sidebar -->