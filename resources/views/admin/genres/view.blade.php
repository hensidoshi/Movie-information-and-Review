@extends('layouts.admin.view-app')

@section('title', 'View Genre')

@section('content')

@section('name','Genre')

<div class="details-card">
    <div class="details-item">
        <span class="details-label">ID:</span> {{ $genre->id }}
    </div>
    <div class="details-item">
        <span class="details-label">Name:</span> {{ $genre->name }}
    </div>
    <div class="details-item">
        <span class="details-label">Created At:</span> {{ $genre->created_at }}
    </div>
    <div class="details-item">
        <span class="details-label">Updated At:</span> {{ $genre->updated_at }}
    </div>
</div>
<a href="{{ route('admin.genres.index') }}" class="btn btn-back mt-4">Back</a>
</div>
@endsection