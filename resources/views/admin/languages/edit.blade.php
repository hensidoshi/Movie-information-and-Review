@extends('layouts.admin.edit-app')

@section('title', 'Edit Language')

@section('content')
   
@section('name', 'Language')

<form action="{{ route('admin.languages.update', $language->id) }}" method="POST" novalidate>
    @csrf
    @method('PUT')
    <!-- Language Name -->
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text"
               name="name"
               value="{{ old('name', $language->name) }}"
               class="form-control @error('name') is-invalid @enderror"
               placeholder="Enter language name">
        @error('name')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>
    <!-- Buttons -->
    <button type="submit" class="btn btn-outline-primary">Update</button>
    <a href="{{ route('admin.languages.index') }}" class="btn btn-outline-secondary">Back</a>
</form>
@endsection