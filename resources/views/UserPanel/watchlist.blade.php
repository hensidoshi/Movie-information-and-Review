@extends('layouts.userApp')

@section('title', 'ReelBuzz | Watchlist')

@section('content')
<div class="container">
    <div class="page-header">
        <h2 class="page-title">My Watchlist</h2>
        <div class="header-controls">
            <select class="sort-dropdown">
                <option>Sorted by : Date Added</option>
            </select>
        </div>
    </div>
    @if(session('success'))
        <div class="custom-alert-success" id="successMessage">
            {{ session('success') }}
        </div>
    @endif

    @forelse($watchlistItems as $item)
        <div class="watchlist-card">
            <div class="card-main-row">
                <div class="movie-poster">
                    @if($item->movie && $item->movie->image)
                        <img src="{{ asset('storage/' . $item->movie->image) }}" alt="{{ $item->movie->name }}">
                    @endif
                </div>

                <div class="movie-details">
                    <div class="info-top">
                        <div class="title-section">
                            <h3 class="movie-title">{{ $item->movie->name ?? 'Movie Title' }}</h3>
                            <p class="genre-year">
                                @if($item->movie->genres->count() > 0)
                                    @foreach($item->movie->genres as $genre)
                                        {{ $genre->name }}@if(!$loop->last), @endif
                                    @endforeach
                                @else
                                    Genre
                                @endif
                                | {{ $item->movie->release_year ?? 'Year' }}
                            </p>
                        </div>
                        <div class="date-display">
                            {{ $item->created_at->format('d M Y') }}
                        </div>
                    </div>

                    <hr class="divider">

                    <div class="card-footer">
                        <p class="rating-label">
                            Rating : 
                            <span class="stars">
                                @php
                                    $rating = round($item->movie->reviews->avg('rating') ?? 0);
                                @endphp
                                {!! str_repeat('★', $rating) !!}{!! str_repeat('☆', 5 - $rating) !!}
                            </span>
                        </p>
                        <div class="btn-group">
                            <form action="{{ route('watchlist.move', $item->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-edit" style="background-color:#007bff; color:white; border:none;">Move</button>
                            </form>
                            <form action="{{ route('watchlist.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <p class="movie-description">
                {{ Str::limit($item->movie->description ?? 'No description available.', 200) }}
            </p>
        </div>
    @empty
        <div class="no-items">No movies in your watchlist yet.</div>
    @endforelse
</div>
@endsection