@extends('layouts.userApp')

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
            @for ($i = 0; $i < $fullStars; $i++) ★ @endfor
            @if ($halfStar) ☆ @endif
            @for ($i = $fullStars + $halfStar; $i < 5; $i++) ☆ @endfor
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
                      <button type="button" disabled
                          style="display:inline-flex;align-items:center;justify-content:center;gap:5px;
                                width:180px;height:40px;background:gray;color:white;border:none;border-radius:5px;">
                          ✓ Already in Watchlist
                      </button>
                  @else
                      <form method="POST" action="{{ route('watchlist.add', $movie->id) }}" style="display:inline;">
                          @csrf
                          <button type="submit"
                              style="display:inline-flex;align-items:center;justify-content:center;gap:5px;
                                    width:180px;height:40px;background:#1e90ff;color:white;border:none;border-radius:5px;">
                              + Add to Watchlist
                          </button>
                      </form>
                  @endif
              @else
                  <a href="{{ route('login') }}" 
                    style="display:inline-flex;align-items:center;justify-content:center;gap:5px;
                            width:180px;height:40px;background:#1e90ff;color:white;text-decoration:none;
                            border-radius:5px;">
                    + Login to add Watchlist
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
          @if(session('success'))
            <div class="custom-alert-success" id="successMessage">
                {{ session('success') }}
            </div>
          @endif
          @forelse($reviews as $review)
              <div class="review-box">
                  <p class="review-stars">
                      {!! str_repeat('★', $review->rating) !!} 
                      <strong>by {{ $review->user->name ?? 'Anonymous' }}</strong>
                  </p>
                  <p>{{ $review->comment }}</p>
              </div>
          @empty
              <p>No reviews yet.</p>
          @endforelse
          <div style="margin-top: 50px; display: flex; flex-direction: column; align-items: center; width: 100%; font-family: sans-serif; background-color: #000; padding: 20px;">
              <div style="margin-bottom: 15px; display: flex; gap: 15px; align-items: center; font-size: 20px;">
                  @if ($reviews->onFirstPage())
                      <span style="color: #555; cursor: not-allowed;">« Previous</span>
                  @else
                      <a href="{{ $reviews->previousPageUrl() }}" style="color: #1e90ff; text-decoration: none;">« Previous</a>
                  @endif

                  @if ($reviews->hasMorePages())
                      <a href="{{ $reviews->nextPageUrl() }}" style="color: #1e90ff; text-decoration: none; font-weight: 500;">Next »</a>
                  @else
                      <span style="color: #555; cursor: not-allowed;">Next »</span>
                  @endif
              </div>

              <div style="color: #ffffff; font-size: 32px; font-weight: 500;">
                  Showing <span style="font-weight: 800;">{{ $reviews->firstItem() }}</span> to 
                  <span style="font-weight: 800;">{{ $reviews->lastItem() }}</span> of 
                  <span style="font-weight: 800;">{{ $reviews->total() }}</span> results
              </div>
          </div>
          @auth
          <form class="review-form" method="POST" action="{{ url('/review/store/'.$movie->id) }}">
            @csrf
            <select name="rating">
              <option value="5">★★★★★</option>
              <option value="4">★★★★☆</option>
              <option value="3">★★★☆☆</option>
              <option value="2">★★☆☆☆</option>
              <option value="1">★☆☆☆☆</option>
            </select>
            <textarea name="comment" placeholder="Write your review..." required></textarea>
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
              <p>{!! str_repeat('★',$topReview->rating) !!} {{ $topReview->comment }}</p>
            </div>
          @endforeach
      </div>

    </div>
  </div>
</section>

@endsection
