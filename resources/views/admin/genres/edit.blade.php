@extends('layouts.admin.edit-app')

@section('title', 'Edit Genre')

@section('content')
    
@section('name', 'Genre')

<form action="{{ route('admin.genres.update', $genre->id) }}" method="POST" novalidate>
    @csrf
    @method('PUT')
    <!-- Genre Name -->
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text"
               name="name"
               value="{{ old('name', $genre->name) }}"
               class="form-control @error('name') is-invalid @enderror"
               placeholder="Enter genre name">
        @error('name')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>
    <!-- Buttons -->
    <button type="submit" class="btn btn-outline-primary">Update</button>
    <a href="{{ route('admin.genres.index') }}" class="btn btn-outline-secondary">Back</a>
</form>
@endsection