@extends('layouts.admin.view-app')

@section('title', 'View Review')

@section('content')

@section('name','Review')

<div class="details-card">
    <div class="details-item">
        <span class="details-label">ID:</span> {{ $review->id }}
    </div>
    <div class="details-item">
        <span class="details-label">Movie:</span> {{ $review->movie->name ?? 'N/A' }}
    </div>
    <div class="details-item">
        <span class="details-label">User:</span> {{ $review->user->name ?? 'N/A' }}
    </div>
    <div class="details-item">
        <span class="details-label">Rating:</span>
        @for ($i = 1; $i <= 5; $i++)
            @if($i <= $review->rating)
                <i class="bi bi-star-fill text-warning"></i>
            @else
                <i class="bi bi-star text-warning"></i>
            @endif
        @endfor
    </div>
    <div class="details-item">
        <span class="details-label">Comment:</span> {{ $review->comment }}
    </div>
    <div class="details-item">
        <span class="details-label">Created At:</span> {{ $review->created_at }}
    </div>
    <div class="details-item">
        <span class="details-label">Updated At:</span> {{ $review->updated_at }}
    </div>
</div>
<a href="{{ route('admin.reviews.index') }}" class="btn btn-back mt-4">Back</a>
@endsection