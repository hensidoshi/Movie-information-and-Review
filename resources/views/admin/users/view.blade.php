@extends('layouts.admin.view-app')

@section('title', 'View User')

@section('content')

@section('name', 'User')

<div class="details-card">
    <div class="details-item">
        <span class="details-label">ID:</span> {{ $user->id }}
    </div>
    <div class="details-item">
        <span class="details-label">Name:</span> {{ $user->name }}
    </div>
    <div class="details-item">
        <span class="details-label">Email:</span> {{ $user->email }}
    </div>
    <div class="details-item">
        <span class="details-label">Role:</span> {{ $user->role ? $user->role->name : '-' }}
    </div>
    <div class="details-item">
        <span class="details-label">Email Verified At:</span> {{ $user->email_verified_at ?? 'Not Verified' }}
    </div>
    <div class="details-item">
        <span class="details-label">Created At:</span> {{ $user->created_at }}
    </div>
    <div class="details-item">
        <span class="details-label">Updated At:</span> {{ $user->updated_at }}
    </div>
</div>
<a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary mt-4">Back</a>
@endsection