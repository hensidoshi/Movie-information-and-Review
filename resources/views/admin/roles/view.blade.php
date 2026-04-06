@extends('layouts.admin.view-app')

@section('title', 'View Role')

@section('content')

@section('name', 'Role')

<div class="details-card">
    <div class="details-item">
        <span class="details-label">ID:</span> {{ $role->id }}
    </div>
    <div class="details-item">
        <span class="details-label">Name:</span> {{ $role->name }}
    </div>
    <div class="details-item">
        <span class="details-label">Created At:</span> {{ $role->created_at }}
    </div>
    <div class="details-item">
        <span class="details-label">Updated At:</span> {{ $role->updated_at }}
    </div>
</div>
<a href="{{ route('admin.roles.index') }}" class="btn btn-back mt-4">Back</a>
@endsection