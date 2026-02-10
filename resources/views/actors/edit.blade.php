<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Actor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #121212;
            color: #f8f9fa;
        }
        .form-label {
            color: #f8f9fa;
        }
        .form-control, .form-select {
            background-color: #2c2c2c;
            color: #f8f9fa;
            border: 1px solid #444;
        }
        .form-control:focus, .form-select:focus {
            border-color: #0d6efd;
            box-shadow: none;
            background-color: #2c2c2c;
            color: #f8f9fa;
        }
        .invalid-feedback {
            font-size: 0.9rem;
        }
        .btn-primary {
            color: #0d6efd;
            border: 1px solid #0d6efd;
            background-color: transparent;
            border-radius: 6px;
            padding: 8px 20px;
        }
        .btn-primary:hover {
            background-color: #0d6efd;
            color: #fff;
        }
        .btn-secondary {
            color: #6c757d;
            border: 1px solid #6c757d;
            background-color: transparent;
            border-radius: 6px;
            padding: 8px 20px;
        }
        .btn-secondary:hover {
            background-color: #6c757d;
            color: #fff;
        }
        h2 {
            margin-bottom: 30px;
        }
        .container {
            max-width: 100%;
            padding-left: 10%;
            padding-right: 10%;
        }
        img.preview-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 6px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-4">Edit Actor</h2>

    <form action="{{ route('actors.update', $actor->id) }}" method="POST" enctype="multipart/form-data" novalidate>
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
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('actors.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
