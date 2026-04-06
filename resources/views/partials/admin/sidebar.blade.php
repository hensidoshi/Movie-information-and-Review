<!-- Start::app-sidebar -->
<aside class="app-sidebar sticky" id="sidebar">

    <!-- Sidebar Header -->
    <div class="main-sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="header-logo d-flex align-items-center p-2">
            <img src="{{ asset('assets/images/brand-logos/desktop-logo.png') }}"
                 alt="ReelBuzz Logo"
                 style="height: 70px; width: auto; object-fit: contain;">
        </a>
    </div>

    <div class="main-sidebar" id="sidebar-scroll">
        <nav class="main-menu-container nav nav-pills flex-column">

            <ul class="main-menu list-unstyled">

                <!-- Dashboard -->
                <li class="slide__category px-3 mt-3 text-uppercase small text-white-50">
                    Dashboard
                </li>

                <li class="slide">
                    <a href="{{ route('admin.dashboard') }}" class="side-menu__item">
                        <i class="ri-home-4-line side-menu__icon me-2"></i>
                        Dashboard
                    </a>
                </li>

                <!-- User Management -->
                <li class="slide__category px-3 mt-4 text-uppercase small text-white-50">
                    User Management
                </li>

                <li class="slide">
                    <a href="{{ route('admin.users.index') }}" class="side-menu__item">
                        <i class="ri-user-line me-2"></i> Users
                    </a>
                </li>

                <li class="slide">
                    <a href="{{ route('admin.reviews.index') }}" class="side-menu__item">
                        <i class="ri-star-line me-2"></i> Reviews
                    </a>
                </li>

                <li class="slide">
                    <a href="{{ route('admin.watchlists.index') }}" class="side-menu__item">
                        <i class="ri-bookmark-line me-2"></i> Watchlists
                    </a>
                </li>

                <!-- Movie Management -->
                <li class="slide__category px-3 mt-4 text-uppercase small text-white-50">
                    Movie Management
                </li>

                <li class="slide">
                    <a href="{{ route('admin.movies.index') }}" class="side-menu__item">
                        <i class="ri-movie-2-line me-2"></i> Movies
                    </a>
                </li>

                <li class="slide">
                    <a href="{{ route('admin.genres.index') }}" class="side-menu__item">
                        <i class="ri-price-tag-3-line me-2"></i> Genres
                    </a>
                </li>

                <li class="slide">
                    <a href="{{ route('admin.movieGenres.index') }}" class="side-menu__item">
                        <i class="ri-links-line me-2"></i> Movie Genres
                    </a>
                </li>

                <li class="slide">
                    <a href="{{ route('admin.actors.index') }}" class="side-menu__item">
                        <i class="ri-user-star-line me-2"></i> Actors
                    </a>
                </li>

                <li class="slide">
                    <a href="{{ route('admin.movieActors.index') }}" class="side-menu__item">
                        <i class="ri-team-line me-2"></i> Movie Actors
                    </a>
                </li>

                <li class="slide">
                    <a href="{{ route('admin.directors.index') }}" class="side-menu__item">
                        <i class="ri-video-line me-2"></i> Directors
                    </a>
                </li>

                <li class="slide">
                    <a href="{{ route('admin.languages.index') }}" class="side-menu__item">
                        <i class="ri-translate-2 me-2"></i> Languages
                    </a>
                </li>

                <li class="slide">
                    <a href="{{ route('admin.roles.index') }}" class="side-menu__item">
                        <i class="ri-shield-user-line me-2"></i> Roles
                    </a>
                </li>

                <!-- Account -->
                <li class="slide__category px-3 mt-4 text-uppercase small text-white-50">
                    Account
                </li>

                <li class="slide">
                    <a href="javascript:void(0);" 
                       class="side-menu__item text-danger"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="ri-logout-box-r-line me-2"></i>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
    </div>
</aside>
