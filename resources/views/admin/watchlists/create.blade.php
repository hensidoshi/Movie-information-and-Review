@extends('layouts.admin.create-app')

@section('title', 'Add Watchlist')

@section('content')

@section('name', 'Watchlist')

<form action="{{ route('admin.watchlists.store') }}" method="POST" novalidate>
    @csrf
    <!-- User -->
    <div class="mb-3">
        <label class="form-label">User</label>
        <select name="user_id" class="form-select @error('user_id') is-invalid @enderror">
            <option value="">Select User</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
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
                <option value="{{ $movie->id }}" {{ old('movie_id') == $movie->id ? 'selected' : '' }}>
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
                <input type="radio" id="watch_star{{ $i }}" name="rating_id" value="{{ $i }}" 
                    {{ old('rating_id', $watchlist->rating_id ?? '') == $i ? 'checked' : '' }}>
                <label for="watch_star{{ $i }}">
                    <i class="bi bi-star-fill"></i>
                </label>
            @endfor
        </div>
        @error('rating_id')
            <div class="text-danger small mt-2 d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Status -->
    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select @error('status') is-invalid @enderror">
            <option value="">Select Status</option>
            @php
                $statuses = ['planned', 'watching', 'completed', 'on-hold', 'dropped'];
            @endphp
            @foreach($statuses as $status)
                <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select>
        @error('status')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Comment -->
    <div class="mb-3">
        <label class="form-label">Comment</label>
        <textarea name="comment"
                  rows="4"
                  class="form-control @error('comment') is-invalid @enderror"
                  placeholder="Add your notes or comments...">{{ old('comment') }}</textarea>
        @error('comment')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Buttons -->
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-outline-success">Save</button>
        <a href="{{ route('admin.watchlists.index') }}" class="btn btn-outline-secondary">Back</a>
    </div>
</form>
@endsection