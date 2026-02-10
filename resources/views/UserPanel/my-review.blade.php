@extends('layouts.userApp')

@section('title', 'ReelBuzz | Review')

@section('content')

<div class="container">
    <div class="page-header">
        <h2>My Reviews</h2>
        <select class="sort-dropdown">
            <option>Sorted by : Most Recent</option>
        </select>
    </div>
    @if(session('success'))
        <div class="custom-alert-success" id="successMessage">
            {{ session('success') }}
        </div>
    @endif

    @forelse($reviews as $review)

    <div class="review-card">
        <div class="card-top">
            <div class="movie-poster">
                <img src="{{ asset('storage/'.$review->movie->image) }}" style="width:100%;border-radius:8px;">
            </div>

            <div class="movie-info">
                <div class="info-header">
                    <div>
                        <h3>{{ $review->movie->name }}</h3>
                        <p class="genre-year">
                            @if($review->movie->genres->count() > 0)
                                @foreach($review->movie->genres as $genre)
                                    {{ $genre->name }}@if(!$loop->last), @endif
                                @endforeach
                            @else
                                Genre
                            @endif
                            | {{ $review->movie->release_year ?? 'Year' }}
                        </p>
                    </div>

                    <div class="date-meta">
                        <span>{{ $review->created_at->format('d M Y') }}</span>
                    </div>
                </div>

                <hr class="divider">

                <div class="card-actions">
                    <p>
                        Reviewed by :
                        <span class="stars">
                            {{ str_repeat('★',$review->rating) }}{{ str_repeat('☆',5-$review->rating) }}
                        </span>
                    </p>

                    <div class="btn-group">
                        <a href="{{ route('review.edit',$review->id) }}"><button class="btn" style="background-color:#007bff; color:white; border:none;">Edit</button></a>

                        <form action="{{ route('review.delete',$review->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <p class="lorem-text">{{ $review->comment }}</p>
    </div>

    @empty
        <p style="color:#aaa;">You have not reviewed any movies yet.</p>
    @endforelse

</div>

@endsection
