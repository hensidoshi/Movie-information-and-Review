@extends('layouts.web.app')

@section('title', 'ReelBuzz | Movie Details')

@section('content')

<section class="movies" style="padding-top: 150px;">
  <div class="max-width">

    <!-- Movie Info -->
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
            {{-- Full Stars --}}
            @for ($i = 0; $i < $fullStars; $i++)
                <i class="bi bi-star-fill text-warning"></i>
            @endfor
            {{-- Half Star --}}
            @if ($halfStar)
                <i class="bi bi-star-half text-warning"></i>
            @endif
            {{-- Empty Stars --}}
            @for ($i = $fullStars + ($halfStar ? 1 : 0); $i < 5; $i++)
                <i class="bi bi-star text-warning"></i>
            @endfor
            <span class="numeric">({{ number_format($avgRating, 1) }}/5)</span>
            <br/><br/>
            <div style="margin-top: 10px; display:flex; gap:10px; flex-wrap: wrap;">
              <button onclick="window.open('{{ $movie->trailer_link }}','_blank')" 
                      style="display:inline-flex;align-items:center;justify-content:center;gap:5px;
                            width:180px;height:40px;background:#ff4500;color:white;border:none;border-radius:5px;">
                  ▶ Watch Trailer
              </button>

              <!-- Watchlist / Login Button -->
              @auth
                @php
                    $alreadyAdded = $movie->watchlists
                        ->where('user_id', auth()->id())
                        ->count() > 0;
                @endphp

                @if($alreadyAdded)
                    <form method="POST" action="{{ route('watchlist.remove', $movie->slug) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            style="display:inline-flex;align-items:center;justify-content:center;gap:5px;
                                    width:220px;height:40px;background:#ff4d4f;color:white;border:none;border-radius:5px;cursor:pointer;font-weight:600;">
                            ✕ Remove from Watchlist
                        </button>
                    </form>
                @else
                    <form method="POST" action="{{ route('watchlist.add', $movie->slug) }}" style="display:inline;">
                        @csrf
                        <button type="submit"
                            style="display:inline-flex;align-items:center;justify-content:center;gap:5px;
                                    width:220px;height:40px;background:#1e90ff;color:white;border:none;border-radius:5px;cursor:pointer;font-weight:600;">
                            + Add to Watchlist
                        </button>
                    </form>
                @endif
            @else
                <a href="{{ route('login') }}" 
                    style="display:inline-flex; align-items:center; justify-content:center; gap:5px;
                            width:220px; height:40px; background:#1e90ff; color:white; text-decoration:none;
                            border-radius:8px; font-weight:600; font-family:sans-serif;">
                        + Login to Add to Watchlist
                </a>
            @endauth
          </div>
        </div>
      </div>
    </div>

    <div class="movie-details-wrapper">

      <!-- Actors -->
      <div style="margin-top: 30px;">
          <h3>Actors & Directors</h3>
          <div class="actors">
              @foreach($movie->actors->unique('id') as $actor)
              <div class="actor-card">
                  <img src="{{ asset('storage/' . $actor->image) }}" 
                       alt="{{ $actor->name }}">
                  <p class="actor-name">{{ $actor->name }}</p>
              </div>
              @endforeach
              @if($movie->director)
                  <div class="actor-card">
                      <div style="width:70px; height:70px; border-radius:50%; overflow:hidden; border:2px solid #1e90ff; margin: 0 auto;">
                          <img src="{{ asset('storage/'.$movie->director->image) }}" 
                              alt="{{ $movie->director->name }}" 
                              style="width:100%; height:100%; object-fit:cover;">
                      </div>
                      <p class="actor-name">{{ $movie->director->name }}</p>
                  </div>
              @endif
          </div>

      <!-- Reviews -->
      <div style="margin-top: 30px;">
          <h3>Reviews</h3>
          @forelse($reviews as $review)
              <div class="review-box">
                  <p class="review-stars">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="bi bi-star{{ $i <= $review->rating ? '-fill' : '' }} text-warning"></i>
                        @endfor
                        <strong>by {{ $review->user->name ?? 'Anonymous' }}</strong>
                    </p>
                  <p>{{ $review->comment }}</p>
              </div>
          @empty
              <p>No reviews yet.</p>
          @endforelse
        <div class="pagination-wrapper">
            <div class="pagination-info">
                Showing <span>{{ $reviews->firstItem() ?? 0 }}</span> to 
                <span>{{ $reviews->lastItem() ?? 0 }}</span> of 
                <span>{{ $reviews->total() }}</span> results
            </div>

            <div class="pagination-buttons">
                @if ($reviews->onFirstPage())
                    <span class="page-link disabled">« Previous</span>
                @else
                    <a href="{{ $reviews->previousPageUrl() }}" class="page-link btn-dark">« Previous</a>
                @endif

                @if ($reviews->hasMorePages())
                    <a href="{{ $reviews->nextPageUrl() }}" class="page-link btn-blue">Next »</a>
                @else
                    <span class="page-link disabled">Next »</span>
                @endif
            </div>
        </div>
          @auth
          <span style="font-weight: bold; font-size: 18px; margin-top: 20px; display: block;">Submit Your Review:</span>
          <form class="review-form" style="margin-top: 5px" method="POST" action="{{ route('reviews.store', $movie->slug) }}">
        @csrf
        <div class="star-rating">
            @for ($i = 5; $i >= 1; $i--)
            <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }}>
            <label for="star{{ $i }}" class="bi bi-star-fill"></label>
            @endfor
        </div>
        @error('rating')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
        <textarea name="comment" placeholder="Write your review..." required>{{ old('comment') }}</textarea>
        @error('comment')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
        <button type="submit">Submit Review</button>
        </form>
          @else
            <p>Please <a href="{{ route('login') }}" style="color: #1e90ff;">login</a> to submit a review.</p>
          @endauth
      </div>
      </div>

      <!-- Top Rated Reviews -->
      <div style="margin-top: 30px;">
          <h3>Top Rated Reviews</h3>
          @foreach($movie->reviews->sortByDesc('rating')->take(3) as $topReview)
            <div class="review-box">
                <p>
                    @for ($i = 1; $i <= 5; $i++)
                        <i class="bi bi-star{{ $i <= $topReview->rating ? '-fill' : '' }} text-warning"></i>
                    @endfor 
                    {{ $topReview->comment }}
                </p>
            </div>
          @endforeach
      </div>

    </div>
  </div>
</section>

@endsection