@extends('layouts.admin.view-app')

@section('title', 'View Director')

@section('content')

@section('name','Director')

<div class="details-card">
    <div class="d-flex flex-column flex-md-row gap-4 align-items-start">
        
        <div class="flex-shrink-0">
            @if($director->image)
                <img src="{{ asset('storage/' . $director->image) }}" alt="Director Image" class="director-img m-0">
            @else
                <div class="director-img bg-secondary d-flex align-items-center justify-content-center">
                    <small class="text-white">No Image</small>
                </div>
            @endif
        </div>
        <div class="flex-grow-1">
            <div class="details-item">
                <span class="details-label">ID:</span> {{ $director->id }}
            </div>
            <div class="details-item">
                <span class="details-label">Name:</span> {{ $director->name }}
            </div>
            <div class="details-item">
                <span class="details-label">Gender:</span> {{ $director->gender }}
            </div>
            <div class="details-item">
                <span class="details-label">Date of Birth:</span> {{ $director->DOB }}
            </div>
            <div class="details-item">
                <span class="details-label">Bio:</span> {{ $director->bio }}
            </div>
            <div class="details-item">
                <span class="details-label">Created At:</span> {{ $director->created_at }}
            </div>
            <div class="details-item">
                <span class="details-label">Updated At:</span> {{ $director->updated_at }}
            </div>
        </div>
    </div>
</div>
<a href="{{ route('admin.directors.index') }}" class="btn btn-back mt-4">Back</a>
@endsection