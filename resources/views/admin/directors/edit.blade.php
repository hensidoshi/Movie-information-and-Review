@extends('layouts.admin.edit-app')

@section('title', 'Edit Director')

@section('content')

@section('name', 'Director')

<form action="{{ route('admin.directors.update', $director->id) }}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    @method('PUT')
    <!-- Name -->
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text"
               name="name"
               value="{{ old('name', $director->name) }}"
               class="form-control @error('name') is-invalid @enderror"
               placeholder="Enter director name">
        @error('name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Gender -->
    <div class="mb-3">
        <label class="form-label">Gender</label>
        <select name="gender" class="form-select @error('gender') is-invalid @enderror">
            <option value="">Select Gender</option>
            <option value="Male" {{ old('gender', $director->gender)=='Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('gender', $director->gender)=='Female' ? 'selected' : '' }}>Female</option>
            <option value="Other" {{ old('gender', $director->gender)=='Other' ? 'selected' : '' }}>Other</option>
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
               value="{{ old('DOB', $director->DOB) }}"
               class="form-control @error('DOB') is-invalid @enderror">
        @error('DOB')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <!-- Bio -->
    <div class="mb-3">
        <label class="form-label">Bio</label>
        <textarea name="bio" rows="4" class="form-control @error('bio') is-invalid @enderror" placeholder="Enter bio">{{ old('bio', $director->bio) }}</textarea>
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
        @if($director->image)
            <img src="{{ asset('storage/' . $director->image) }}" alt="Director Image" class="preview-img">
        @endif
    </div>
    <!-- Buttons -->
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-outline-primary">Update</button>
        <a href="{{ route('admin.directors.index') }}" class="btn btn-outline-secondary">Back</a>
    </div>
</form>
@endsection