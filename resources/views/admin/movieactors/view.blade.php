@extends('layouts.admin.view-app')

@section('title', 'View Movie Actor')

@section('content')

@section('name', 'Movie Actor')
    
<div class="details-card">
    <div class="details-item">
        <span class="details-label">ID:</span> {{ $movieActor->id }}
    </div>
    <div class="details-item">
        <span class="details-label">Movie:</span> {{ $movieActor->movie->name ?? 'N/A' }}
    </div>
    <div class="details-item">
        <span class="details-label">Actor:</span> {{ $movieActor->actor->name ?? 'N/A' }}
    </div>
    <div class="details-item">
        <span class="details-label">Created At:</span> {{ $movieActor->created_at }}
    </div>
    <div class="details-item">
        <span class="details-label">Updated At:</span> {{ $movieActor->updated_at }}
    </div>
</div>
<a href="{{ route('admin.movieActors.index') }}" class="btn btn-back mt-4">Back</a>
@endsection