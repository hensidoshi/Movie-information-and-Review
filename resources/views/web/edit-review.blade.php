@extends('layouts.web.app')

@section('title', 'ReelBuzz | Edit Review')

@section('content')
<section class="edit-review-wrapper">
    <div class="container">
        <div class="row-flex">
            
            <div class="movie-sidebar">
                <img src="{{ asset('storage/' . $review->movie->image) }}" 
                     class="movie-poster" 
                     alt="{{ $review->movie->name }}">
                
                <h2 class="movie-title">{{ $review->movie->name }}</h2>
                <p class="movie-genre">{{ $review->movie->genre->name ?? 'Genre' }}</p>
                <p class="movie-desc">{{ $review->movie->description ?? 'No description available.' }}</p>
                
                <hr class="divider">
                <p class="release-info"><strong>Release Date:</strong> {{ $review->movie->release_year ?? 'Year' }}</p>
            </div>

            <div class="edit-form-section">
                <h3 class="form-heading">Edit Review</h3>

                <form action="{{ route('review.update', $review->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label class="input-label">User Name</label>
                        <input type="text" value="{{ Auth::user()->name }}" class="input-field readonly" readonly>
                    </div>

                    <div class="form-group">
                        <label class="input-label">Rating</label>
                        <div class="star-rating">
                            @for($i = 5; $i >= 1; $i--)
                                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" 
                                    {{ $review->rating == $i ? 'checked' : '' }} required />
                                <label for="star{{ $i }}" class="bi bi-star-fill" title="{{ $i }} Stars"></label>
                            @endfor
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="input-label">Your Comment</label>
                        <textarea name="comment" rows="6" class="input-field textarea-field">{{ $review->comment }}</textarea>
                    </div>

                    <div class="btn-group">
                        <button type="submit" class="btn-update">Update Review</button>
                        <a href="{{ route('myReviews') }}" class="btn-cancel">Cancel</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
@endsection