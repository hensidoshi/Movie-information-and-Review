@extends('layouts.admin.edit-app')

@section('title', 'Edit Review')

@section('content')

@section('name', 'Review')
<form action="{{ route('admin.reviews.update', $review->id) }}" method="POST" novalidate>
    @csrf
    @method('PUT')
    <!-- User -->
    <div class="mb-3">
        <label class="form-label">User</label>
        <select name="user_id" class="form-select @error('user_id') is-invalid @enderror">
            <option value="">Select User</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}"
                    {{ old('user_id', $review->user_id) == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        @error('user_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Movie -->
    <div class="mb-3">
        <label class="form-label">Movie</label>
        <select name="movie_id" class="form-select @error('movie_id') is-invalid @enderror">
            <option value="">Select Movie</option>
            @foreach($movies as $movie)
                <option value="{{ $movie->id }}"
                    {{ old('movie_id', $review->movie_id) == $movie->id ? 'selected' : '' }}>
                    {{ $movie->name }}
                </option>
            @endforeach
        </select>
        @error('movie_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Rating -->
    <div class="mb-3">
        <label class="form-label text-white">Rating</label>
        <div class="star-rating">
            @for($i = 5; $i >= 1; $i--)
                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" 
                    {{ old('rating', $review->rating) == $i ? 'checked' : '' }}>
                <label for="star{{ $i }}">
                    <i class="bi bi-star-fill"></i>
                </label>
            @endfor
        </div>
        @error('rating')
            <div class="text-danger small mt-2 d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Comment -->
    <div class="mb-3">
        <label class="form-label">Comment</label>
        <textarea name="comment"
                  rows="4"
                  class="form-control @error('comment') is-invalid @enderror"
                  placeholder="Write your review...">{{ old('comment', $review->comment) }}</textarea>
        @error('comment')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Buttons -->
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-outline-primary">Update</button>
        <a href="{{ route('admin.reviews.index') }}" class="btn btn-outline-secondary">Back</a>
    </div>
</form>
@endsection