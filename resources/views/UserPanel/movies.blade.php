@extends('layouts.userApp')

@section('title', 'ReelBuzz | Movies')

@section('content')
<section class="projects">
    <div class="max-width"> 
        <h2 class="title">All Movies</h2> 
        <div class="movie-grid" style="display: grid; 
                    grid-template-columns: repeat(3, 1fr); 
                    gap: 20px;"> 
            @forelse($movies as $movie)
                <div class="movie-card"> 
                    <div class="poster">
                        <img src="{{ asset('storage/' . $movie->image) }}" alt="{{ $movie->name }}">
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
            @empty
                <p>No movies found.</p>
            @endforelse
        </div> 

        <div style="margin-top: 50px; display: flex; flex-direction: column; align-items: center; width: 100%; font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">
            <div style="margin-bottom: 8px; display: flex; gap: 12px; align-items: center;">
                @if ($movies->onFirstPage())
                    <span style="color: #555; cursor: not-allowed; font-size: 16px; font-weight: 500;">« Previous</span>
                @else
                    <a href="{{ $movies->previousPageUrl() }}" style="color: #1e90ff; text-decoration: none; font-size: 16px; font-weight: 600;">« Previous</a>
                @endif

                @if ($movies->hasMorePages())
                    <a href="{{ $movies->nextPageUrl() }}" style="color: #1e90ff; text-decoration: none; font-size: 16px; font-weight: 600;">Next »</a>
                @else
                    <span style="color: #555; cursor: not-allowed; font-size: 16px; font-weight: 500;">Next »</span>
                @endif
            </div>

            <div style="color: #ffffff; font-size: 24px; font-weight: 400; letter-spacing: 0.5px;">
                Showing <span style="font-weight: 700;">{{ $movies->firstItem() }}</span> to 
                <span style="font-weight: 700;">{{ $movies->lastItem() }}</span> of 
                <span style="font-weight: 700;">{{ $movies->total() }}</span> results
            </div>
        </div>
    </div> 
</section>
@endsection
