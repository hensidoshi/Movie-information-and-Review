@extends('layouts.admin.view-app')

@section('title', 'View Movie')

@section('content')

@section('name','Movie')

<div class="details-card">
    <div class="d-flex flex-column flex-md-row gap-4 align-items-start">
        
        <div class="flex-shrink-0">
            @if($movie->image)
                <img src="{{ asset('storage/' . $movie->image) }}" alt="Movie Poster" class="movie-img m-0">
            @else
                <div class="movie-img bg-secondary d-flex align-items-center justify-content-center">
                    <small class="text-white">No Image</small>
                </div>
            @endif
        </div>
        <div class="flex-grow-1">
            <div class="details-item">
                <span class="details-label">ID:</span> {{ $movie->id }}
            </div>
            <div class="details-item">
                <span class="details-label">Name:</span> {{ $movie->name }}
            </div>
            <div class="details-item">
                <span class="details-label">Genre:</span> 
                @if($movie->genres && $movie->genres->count() > 0)
                    {{ $movie->genres->pluck('name')->implode(', ') }}
                @else
                    <span>N/A</span>
                @endif
            </div>
            <div class="details-item">
                <span class="details-label">Director:</span> {{ $movie->director->name ?? 'N/A' }}
            </div>
            <div class="details-item">
                <span class="details-label">Actor:</span> 
                @if($movie->actors && $movie->actors->count() > 0)
                    {{ $movie->actors->pluck('name')->implode(', ') }}
                @else
                    <span>N/A</span>
                @endif
            </div>
            <div class="details-item">
                <span class="details-label">Duration:</span> {{ $movie->duration }}
            </div>
            <div class="details-item">
                <span class="details-label">Language:</span> {{ $movie->language->name ?? 'N/A' }}
            </div>
            <div class="details-item">
                <span class="details-label">Release Year:</span> {{ $movie->release_year }}
            </div>
            <div class="details-item">
                <span class="details-label">Description:</span> {{ $movie->description }}
            </div>
            <div class="details-item">
                <span class="details-label">Trailer Link:</span>
                @if($movie->trailer_link)
                    <a href="{{ $movie->trailer_link }}" target="_blank" class="text-info">{{ $movie->trailer_link }}</a>
                @else
                    N/A
                @endif
            </div>
            <div class="details-item">
                <span class="details-label">Created At:</span> {{ $movie->created_at }}
            </div>
            <div class="details-item">
                <span class="details-label">Updated At:</span> {{ $movie->updated_at }}
            </div>
        </div>
    </div>
</div>
<a href="{{ route('admin.movies.index') }}" class="btn btn-back mt-4">Back</a>
@endsection