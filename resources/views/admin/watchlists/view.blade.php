@extends('layouts.admin.view-app')

@section('title', 'View Watchlist')

@section('content')

@section('name','Watchlist')

<div class="details-card">
    <div class="details-item">
        <span class="details-label">ID:</span> {{ $watchlist->id }}
    </div>
    <div class="details-item">
        <span class="details-label">Movie:</span> {{ $watchlist->movie->name ?? 'N/A' }}
    </div>
    <div class="details-item">
        <span class="details-label">User:</span> {{ $watchlist->user->name ?? 'N/A' }}
    </div>
<div class="details-item">
    <span class="details-label">Rating:</span> 
    @if($watchlist->rating_id)
        @php
            // Database mathi direct rating_id lo
            $stars = (int) $watchlist->rating_id;
        @endphp
        <span class="star-rating">
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $stars)
                    <i class="bi bi-star-fill text-warning"></i>
                @else
                    <i class="bi bi-star text-warning"></i>
                @endif
            @endfor
        </span>
    @else
        <span class="text-muted">N/A</span>
    @endif
</div>
    <div class="details-item">
        <span class="details-label">Status:</span>
        <span class="status-badge status-{{ $watchlist->status }}">{{ ucfirst($watchlist->status) }}</span>
    </div>
    <div class="details-item">
        <span class="details-label">Comment:</span> {{ $watchlist->comment ?? '-' }}
    </div>
    <div class="details-item">
        <span class="details-label">Created At:</span> {{ $watchlist->created_at }}
    </div>
    <div class="details-item">
        <span class="details-label">Updated At:</span> {{ $watchlist->updated_at }}
    </div>
</div>
<a href="{{ route('admin.watchlists.index') }}" class="btn btn-back mt-4">Back</a>
@endsection