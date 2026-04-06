@extends('layouts.admin.create-app')

@section('title', 'Add Language')

@section('content')

@section('name', 'Language')

<form action="{{ route('admin.languages.store') }}" method="POST" novalidate>
    @csrf
    <!-- Language Name -->
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text"
               name="name"
               value="{{ old('name') }}"
               class="form-control @error('name') is-invalid @enderror"
               placeholder="Enter language name">
        @error('name')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>
    <!-- Buttons -->
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-outline-success">Save</button>
        <a href="{{ route('admin.languages.index') }}" class="btn btn-outline-secondary">Back</a>
    </div>
</form>
@endsection