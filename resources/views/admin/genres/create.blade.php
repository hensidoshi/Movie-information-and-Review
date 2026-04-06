@extends('layouts.admin.create-app')

@section('title', 'Add Genre')

@section('content')

@section('name', 'Genre')

<form action="{{ route('admin.genres.store') }}" method="POST" novalidate>
    @csrf
    <!-- Genre Name -->
    <div class="mb-3">
        <label class="form-label">Genre Name</label>
        <input type="text"
               name="name"
               value="{{ old('name') }}"
               class="form-control @error('name') is-invalid @enderror"
               placeholder="Enter genre name">
        @error('name')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>
    <!-- Buttons -->
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-outline-success">Save</button>
        <a href="{{ route('admin.genres.index') }}" class="btn btn-outline-secondary">Back</a>
    </div>
</form>
@endsection