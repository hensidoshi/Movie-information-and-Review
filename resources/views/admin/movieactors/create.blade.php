@extends('layouts.admin.create-app')

@section('title', 'Add Movie Actor')

@section('content')

@section('name', 'Movie Actor')

<form action="{{ route('admin.movieActors.store') }}" method="POST" novalidate>
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
    <!-- Actor -->
    <div class="mb-3">
        <label class="form-label">Actor</label>
        <select name="actor_id" class="form-select @error('actor_id') is-invalid @enderror">
            <option value="">Select Actor</option>
            @foreach($actors as $actor)
                <option value="{{ $actor->id }}" {{ old('actor_id') == $actor->id ? 'selected' : '' }}>
                    {{ $actor->name }}
                </option>
            @endforeach
        </select>
        @error('actor_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Buttons -->
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-outline-success">Save</button>
        <a href="{{ route('admin.movieActors.index') }}" class="btn btn-outline-secondary">Back</a>
    </div>
</form>
@endsection