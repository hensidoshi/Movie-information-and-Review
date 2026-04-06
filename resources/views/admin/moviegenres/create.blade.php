@extends('layouts.admin.create-app')

@section('title', 'Add Movie Genre')

@section('content')

@section('name', 'Movie Genres')

<form action="{{ route('admin.movieGenres.store') }}" method="POST" novalidate>
    @csrf
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
    <!-- Genre -->
    <div class="mb-3">
        <label class="form-label">Genre</label>
        <select name="genre_id" class="form-select @error('genre_id') is-invalid @enderror">
            <option value="">Select Genre</option>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                    {{ $genre->name }}
                </option>
            @endforeach
        </select>
        @error('genre_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Buttons -->
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-outline-success">Save</button>
        <a href="{{ route('admin.movieGenres.index') }}" class="btn btn-outline-secondary">Back</a>
    </div>
</form>
@endsection