@extends('layouts.admin.edit-app')

@section('title', 'Edit Actor')

@section('content')
    
@section('name', 'Actor')

<form action="{{ route('admin.actors.update', $actor->id) }}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    @method('PUT')
    <!-- Name -->
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text"
               name="name"
               value="{{ old('name', $actor->name) }}"
               class="form-control @error('name') is-invalid @enderror"
               placeholder="Enter actor name">
        @error('name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Gender -->
    <div class="mb-3">
        <label class="form-label">Gender</label>
        <select name="gender" class="form-select @error('gender') is-invalid @enderror">
            <option value="">Select Gender</option>
            <option value="Male" {{ old('gender', $actor->gender)=='Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('gender', $actor->gender)=='Female' ? 'selected' : '' }}>Female</option>
            <option value="Other" {{ old('gender', $actor->gender)=='Other' ? 'selected' : '' }}>Other</option>
        </select>
        @error('gender')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Date of Birth -->
    <div class="mb-3">
        <label class="form-label">Date of Birth</label>
        <input type="date"
               name="DOB"
               value="{{ old('DOB', $actor->DOB) }}"
               class="form-control @error('DOB') is-invalid @enderror">
        @error('DOB')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Bio -->
    <div class="mb-3">
        <label class="form-label">Bio</label>
        <textarea name="bio" rows="4" class="form-control @error('bio') is-invalid @enderror" placeholder="Enter bio">{{ old('bio', $actor->bio) }}</textarea>
        @error('bio')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Image -->
    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
        @error('image')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
        @if($actor->image)
            <img src="{{ asset('storage/' . $actor->image) }}" alt="Actor Image" class="preview-img">
        @endif
    </div>
    <!-- Buttons -->
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-outline-primary">Update</button>
        <a href="{{ route('admin.actors.index') }}" class="btn btn-outline-secondary">Back</a>
    </div>
</form>
@endsection