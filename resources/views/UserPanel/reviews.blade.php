@extends('layouts.userApp')

@section('title', 'ReelBuzz | Movies')

@section('content')
<section class="movies" id="reviews">
    <div class="max-width">
        <h2 class="title" style="margin-top: 50px">User Reviews</h2>
            @if(session('success'))
                <div class="custom-alert-success" id="successMessage">
                    {{ session('success') }}
                </div>
            @endif
            
        <div class="movie-grid" style="display: grid; 
                    grid-template-columns: repeat(3, 1fr); 
                    gap: 20px;">
            @foreach($movies as $movie)
                <div class="movie-card">
                    <!-- Movie Poster -->
                    <div class="poster">
                        <img src="{{ asset('storage/' . $movie->image) }}" alt="{{ $movie->name }}">
                    </div>

                    <!-- Movie Info -->
                    <div class="movie-info">
                        <h3>{{ $movie->name }}</h3>
                        <p class="genre">
                            @if($movie->genres->count() > 0)
                                @foreach($movie->genres as $genre)
                                    {{ $genre->name }}@if(!$loop->last), @endif
                                @endforeach
                            @else
                                Genre
                            @endif
                            | {{ $movie->release_year ?? 'Year' }}
                        </p>                    
                    </div>

                    <!-- Reviews Box -->
                    <div class="reviews-box">
                        <h4>Reviews</h4>
                        <div class="reviews-list">
                            @forelse($movie->reviews as $review)
                                <div class="review-box">
                                    <h5>
                                        {!! str_repeat('★', $review->rating) . str_repeat('☆', 5 - $review->rating) !!}
                                    </h5>
                                    <p>{{ $review->comment }}</p>
                                    <small>By: {{ $review->user->name ?? 'Anonymous' }}</small>
                                </div>
                            @empty
                                <p>No reviews yet.</p>
                            @endforelse
                        </div>

                        <!-- Review Form -->
                        @auth
                            <form method="POST" action="{{  url('/review/store/'.$movie->id) }}">
                                @csrf
                                <select name="rating" required>
                                    <option value="5">★★★★★</option>
                                    <option value="4">★★★★☆</option>
                                    <option value="3">★★★☆☆</option>
                                    <option value="2">★★☆☆☆</option>
                                    <option value="1">★☆☆☆☆</option>
                                </select>
                                <textarea name="comment" placeholder="Write your review..." required></textarea>
                                <button type="submit">Submit</button>
                            </form>
                        @else
                            <p>Please <a href="{{ route('login') }}" style="color: #1e90ff;">login</a> to submit a review.</p>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
        <div style="margin-top: 40px; margin-bottom: 40px; display: flex; flex-direction: column; align-items: center; width: 100%; font-family: sans-serif;">
    
    <div style="margin-bottom: 10px; display: flex; gap: 15px; align-items: center;">
        @if ($movies->onFirstPage())
            <span style="color: #444; cursor: not-allowed; font-size: 16px;">« Previous</span>
        @else
            <a href="{{ $movies->previousPageUrl() }}" style="color: #1e90ff; text-decoration: none; font-size: 16px; font-weight: bold;">« Previous</a>
        @endif

        @if ($movies->hasMorePages())
            <a href="{{ $movies->nextPageUrl() }}" style="color: #1e90ff; text-decoration: none; font-size: 16px; font-weight: bold;">Next »</a>
        @else
            <span style="color: #444; cursor: not-allowed; font-size: 16px;">Next »</span>
        @endif
    </div>

    <div style="color: #ffffff; font-size: 28px; font-weight: 400; text-align: center;">
        Showing <span style="font-weight: 700;">{{ $movies->firstItem() }}</span> to 
        <span style="font-weight: 700;">{{ $movies->lastItem() }}</span> of 
        <span style="font-weight: 700;">{{ $movies->total() }}</span> results
    </div>
</div>
    </div>
</section>
@endsection