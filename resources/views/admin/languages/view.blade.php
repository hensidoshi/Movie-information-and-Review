@extends('layouts.admin.view-app')

@section('title', 'View Language')

@section('content')

@section('name', 'Language')

<div class="details-card">
    <div class="details-item">
        <span class="details-label">ID:</span> {{ $language->id }}
    </div>
    <div class="details-item">
        <span class="details-label">Name:</span> {{ $language->name }}
    </div>
    <div class="details-item">
        <span class="details-label">Created At:</span> {{ $language->created_at }}
    </div>
    <div class="details-item">
        <span class="details-label">Updated At:</span> {{ $language->updated_at }}
    </div>
</div>
<a href="{{ route('admin.languages.index') }}" class="btn btn-back mt-4">Back</a>
@endsection