@extends('layouts.admin.view-app')

@section('title', 'View Actor')

@section('content')

@section('name','Actor')

<div class="details-card">
    <div class="d-flex flex-column flex-md-row gap-4 align-items-start">
        
        <div class="flex-shrink-0">
            @if($actor->image)
                <img src="{{ asset('storage/' . $actor->image) }}" alt="Actor Image" class="actor-img m-0">
            @else
                <div class="actor-img bg-secondary d-flex align-items-center justify-content-center">
                    <small class="text-white">No Image</small>
                </div>
            @endif
        </div>
        <div class="flex-grow-1">
            <div class="details-item">
                <span class="details-label">ID:</span> {{ $actor->id }}
            </div>
            <div class="details-item">
                <span class="details-label">Name:</span> {{ $actor->name }}
            </div>
            <div class="details-item">
                <span class="details-label">Gender:</span> {{ $actor->gender }}
            </div>
            <div class="details-item">
                <span class="details-label">Date of Birth:</span> {{ $actor->DOB }}
            </div>
            <div class="details-item">
                <span class="details-label">Bio:</span> {{ $actor->bio }}
            </div>
            <div class="details-item">
                <span class="details-label">Created At:</span> {{ $actor->created_at }}
            </div>
            <div class="details-item">
                <span class="details-label">Updated At:</span> {{ $actor->updated_at }}
            </div>
        </div>
    </div>
</div>
<a href="{{ route('admin.actors.index') }}" class="btn btn-back mt-4">Back</a>
</div>
@endsection