@extends('layouts.userApp')

@section('title', 'ReelBuzz | Search Results')


@section('content')
<div class="container mt-5">
    {{-- Top Header --}}
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h2 style="font-weight: 700;">Search Results for: <span class="text-info">"{{ $query }}"</span></h2>
    </div>

    @if($movies->isEmpty())
        <div class="alert alert-dark text-center py-5" style="background: #1a1a1a; border: 1px dashed #333;">
            <p class="m-0" style="font-size: 1.2rem; color: #999;">No movies found for "{{ $query }}".</p>
        </div>
    @else
        @foreach($movies as $movie)
        <div class="details-card">
            <div class="row g-4">
                {{-- Movie Image --}}
                <div class="col-md-auto text-center text-md-start">
                    @if($movie->image)
                        <img src="{{ asset('storage/' . $movie->image) }}" alt="Movie Poster" class="movie-img">
                    @else
                        <div class="movie-img bg-secondary d-flex align-items-center justify-content-center mx-auto">
                            <small class="text-white">No Image</small>
                        </div>
                    @endif
                </div>

                {{-- Movie Details --}}
                <div class="col-md mt-md-2">
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
                    <div class="details-item" style="margin-top: 25px;">
                        <a href="{{ url('/userIndex') }}" class="btn btn-back">Back</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div style="margin-top: 50px; display: flex; flex-direction: column; align-items: center; width: 100%; font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">
            <div style="margin-bottom: 8px; display: flex; gap: 12px; align-items: center;">
                @if ($movies->onFirstPage())
                    <span style="color: #555; cursor: not-allowed; font-size: 16px; font-weight: 500;">« Previous</span>
                @else
                    <a href="{{ $movies->appends(['q' => $query])->previousPageUrl() }}" style="color: #1e90ff; text-decoration: none; font-size: 16px; font-weight: 600;">« Previous</a>
                @endif

                @if ($movies->hasMorePages())
                    <a href="{{ $movies->appends(['q' => $query])->nextPageUrl() }}" style="color: #1e90ff; text-decoration: none; font-size: 16px; font-weight: 600;">Next »</a>
                @else
                    <span style="color: #555; cursor: not-allowed; font-size: 16px; font-weight: 500;">Next »</span>
                @endif
            </div>

            <div style="color: #ffffff; font-size: 24px; font-weight: 400; letter-spacing: 0.5px;">
                Showing <span style="font-weight: 700;">{{ $movies->firstItem() }}</span> to 
                <span style="font-weight: 700;">{{ $movies->lastItem() }}</span> of 
                <span style="font-weight: 700;">{{ $movies->total() }}</span> results
            </div>
        </div>
    @endif
</div>
@endsection