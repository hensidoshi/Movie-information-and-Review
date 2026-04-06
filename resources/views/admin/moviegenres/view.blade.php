@extends('layouts.admin.view-app')

@section('title', 'View Movie Genre')

@section('content')

@section('name', 'Movie Genres')

<div class="details-card">
    <div class="details-item">
        <span class="details-label">ID:</span> {{ $movieGenre->id }}
    </div>
    <div class="details-item">
        <span class="details-label">Movie:</span> {{ $movieGenre->movie->name ?? 'N/A' }}
    </div>
    <div class="details-item">
        <span class="details-label">Genre:</span> {{ $movieGenre->genre->name ?? 'N/A' }}
    </div>
    <div class="details-item">
        <span class="details-label">Created At:</span> {{ $movieGenre->created_at }}
    </div>
    <div class="details-item">
        <span class="details-label">Updated At:</span> {{ $movieGenre->updated_at }}
    </div>
</div>
<a href="{{ route('admin.movieGenres.index') }}" class="btn btn-back mt-4">Back</a>
@endsection