@extends('layouts.userApp')

@section('title', 'ReelBuzz | Movie information & Reviews')

@section('content')
<!-- Home -->
<section class="home" id="home">
    <div class="carousel-container">

        @foreach($allMovies as $index => $movie)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}"
            style="background-image: url('{{ asset('storage/' . $movie->image) }}')">

            <div class="hero-content">
                <img src="{{ asset('storage/' . $movie->image) }}"
                    class="hero-poster"
                    alt="{{ $movie->title }}">

                <div class="hero-info">
                    <h1>{{ $movie->name }}</h1>
                    <p>{{ Str::limit($movie->description, 150) }}</p>
                <a href="{{ $movie->trailer_link }}" target="_blank" class="watch-btn">
                    ▶ Watch Trailer
                </a>
                </div>
            </div>

        </div>
        @endforeach

        <!-- Navigation Buttons -->
        <button class="slider-btn prev" onclick="changeSlide(-1)">&#10094;</button>
        <button class="slider-btn next" onclick="changeSlide(1)">&#10095;</button>

        <!-- Dots -->
        <div class="dots-container">
            @foreach($allMovies as $index => $movie)
                <span class="dot {{ $index == 0 ? 'active' : '' }}"
                      onclick="currentSlide({{ $index }})"></span>
            @endforeach
        </div>

    </div>
</section>

<!-- About -->
<section class="about" id="about">
    <div class="max-width">
        <h2 class="title">About ReelBuzz</h2>
        <div class="about-content">
            <div class="column left">
                <img src="{{ asset('assets/images/about-movie.jpeg') }}" alt="ReelBuzz" class="about-image">
            </div>
            <div class="column right">
                <p>
                    <strong>ReelBuzz</strong> is a platform for movie enthusiasts where you can explore detailed information about movies, read genuine reviews from users, rate films, and maintain a personal watchlist.  
                    <br><br>
                    Our mission is to make movie discovery fun, social, and interactive by providing a community-driven experience for cinema lovers.
                </p>
                <a href="{{ route('UserPanel.movies') }}" class="btn-explore">Explore Movies</a>
            </div>
        </div>
    </div>
</section>


<!-- Features -->
<section class="services">
    <div class="max-width">
        <h2 class="title">Features</h2>

        <div class="serv-content">
            <div class="card">
                <div class="box">
                    <i class="fas fa-film"></i>
                    <div class="text">Movie Information</div>
                    <p>Detailed movie descriptions, cast, genre & release info.</p>
                </div>
            </div>

            <div class="card">
                <div class="box">
                    <i class="fas fa-star"></i>
                    <div class="text">User Reviews</div>
                    <p>Read and write honest reviews with ratings.</p>
                </div>
            </div>

            <div class="card">
                <div class="box">
                    <i class="fas fa-bookmark"></i>
                    <div class="text">Watchlist</div>
                    <p>Save movies and track what to watch next.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest Movies -->
<section class="projects">
    <div class="max-width"> 
        <h2 class="title">Latest Movies</h2> 
        <div class="movie-grid" 
             style="display: grid; 
                    grid-template-columns: repeat(3, 1fr); 
                    gap: 20px;">

            @foreach($latestMovies as $movie)
                <div class="movie-card">
                    <div class="poster">
                        <img src="{{ asset('storage/' . $movie->image) }}" 
                             alt="{{ $movie->name }}" 
                             style="width: 100%; height: auto;">
                    </div> 
                    <div class="movie-info">
                        <h3>{{ $movie->name }}</h3>
                        <p class="meta">
                            @if($movie->genres->count() > 0)
                                @foreach($movie->genres as $genre)
                                    {{ $genre->name }}@if(!$loop->last), @endif
                                @endforeach
                            @else
                                Genre
                            @endif
                            | {{ $movie->release_year ?? 'Year' }}
                        </p>
                        @php
                            $avgRating = $movie->reviews->avg('rating') ?? 0;
                            $fullStars = floor($avgRating);
                            $halfStar = ($avgRating - $fullStars >= 0.5) ? 1 : 0;
                        @endphp

                        <div class="rating">
                            @for ($i = 0; $i < $fullStars; $i++) ★ @endfor
                            @if ($halfStar) ☆ @endif
                            @for ($i = $fullStars + $halfStar; $i < 5; $i++) ☆ @endfor
                            <span class="numeric">({{ number_format($avgRating, 1) }}/5)</span>
                        </div>

                        <button onclick="window.location.href='{{ url('/movie-details/' . $movie->id) }}'">
                            View Details
                        </button> 
                    </div>
                </div> 
            @endforeach
        </div> 
    </div> 
</section>

@endsection