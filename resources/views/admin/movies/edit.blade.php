@extends('layouts.admin.edit-app')

@section('title', 'Edit Movie')

@section('content')

@section('name', 'Movie')

<form action="{{ route('admin.movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    @method('PUT')
    <!-- Name -->
    <div class="mb-3">
        <label class="form-label">Movie Name</label>
        <input type="text"
               name="name"
               value="{{ old('name', $movie->name) }}"
               class="form-control @error('name') is-invalid @enderror"
               placeholder="Enter movie name">
        @error('name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Genre -->
    <div class="mb-3">
        <label class="form-label">Genre</label>
        <select name="genre_id[]" class="form-select @error('genre_id') is-invalid @enderror" multiple>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}" 
                    {{ (collect(old('genre_id', isset($movie) ? $movie->genres->pluck('id') : []))->contains($genre->id)) ? 'selected' : '' }}>
                    {{ $genre->name }}
                </option>
            @endforeach
        </select>
        @error('genre_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Director -->
    <div class="mb-3">
        <label class="form-label">Director</label>
        <select name="director_id" class="form-select @error('director_id') is-invalid @enderror">
            <option value="">Select Director</option>
            @foreach($directors as $director)
                <option value="{{ $director->id }}" {{ old('director_id', $movie->director_id) == $director->id ? 'selected' : '' }}>
                    {{ $director->name }}
                </option>
            @endforeach
        </select>
        @error('director_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Actors -->
    <div class="mb-3">
        <label class="form-label">Actors</label>
        <select name="actor_id[]" class="form-select @error('actor_id') is-invalid @enderror" multiple>
            @foreach($actors as $actor)
                <option value="{{ $actor->id }}" 
                    {{ (collect(old('actor_id', isset($movie) ? $movie->actors->pluck('id') : []))->contains($actor->id)) ? 'selected' : '' }}>
                    {{ $actor->name }}
                </option>
            @endforeach
        </select>
        @error('actor_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Duration -->
    <div class="mb-3">
        <label class="form-label">Duration</label>
        <input type="text"
               name="duration"
               value="{{ old('duration', $movie->duration) }}"
               class="form-control @error('duration') is-invalid @enderror"
               placeholder="Enter duration (e.g., 2h 30m)">
        @error('duration')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Language -->
    <div class="mb-3">
        <label class="form-label">Language</label>
        <select name="language_id" class="form-select @error('language_id') is-invalid @enderror">
            <option value="">Select Language</option>
            @foreach($languages as $language)
                <option value="{{ $language->id }}" {{ old('language_id', $movie->language_id) == $language->id ? 'selected' : '' }}>
                    {{ $language->name }}
                </option>
            @endforeach
        </select>
        @error('language_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Release Year -->
    <div class="mb-3">
        <label class="form-label">Release Year</label>
        <input type="number"
               name="release_year"
               value="{{ old('release_year', $movie->release_year) }}"
               class="form-control @error('release_year') is-invalid @enderror"
               placeholder="Enter release year">
        @error('release_year')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Description -->
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Enter description">{{ old('description', $movie->description) }}</textarea>
        @error('description')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Trailer Link -->
    <div class="mb-3">
        <label class="form-label">Trailer Link</label>
        <input type="url"
               name="trailer_link"
               value="{{ old('trailer_link', $movie->trailer_link) }}"
               class="form-control @error('trailer_link') is-invalid @enderror"
               placeholder="Enter trailer URL">
        @error('trailer_link')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Image -->
    <div class="mb-3">
        <label class="form-label">Movie Poster</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
        @error('image')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
        @if($movie->image)
            <img src="{{ asset('storage/' . $movie->image) }}" alt="Movie Poster" class="preview-img">
        @endif
    </div>
    <!-- Buttons -->
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-outline-primary">Update</button>
        <a href="{{ route('admin.movies.index') }}" class="btn btn-outline-secondary">Back</a>
    </div>
</form>
@endsection