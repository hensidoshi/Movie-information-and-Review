<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie</title>

    <!-- Bootstrap CSS -->
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
        .btn-success {
            color: #28a745;
            border: 1px solid #28a745;
            background-color: transparent;
            border-radius: 6px;
            padding: 8px 20px;
        }
        .btn-success:hover {
            background-color: #28a745;
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

<div class="container mt-5">
    <h2>Add New Movie</h2>

    <!-- Success message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data" novalidate>
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label class="form-label">Movie Name</label>
            <input type="text"
                   name="name"
                   value="{{ old('name') }}"
                   class="form-control @error('name') is-invalid @enderror"
                   placeholder="Enter movie name">
            @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <!-- Genre -->
        <div class="mb-3">
            <label class="form-label">Genre</label>
            <select name="genre_id[]" id="genres" class="form-control" multiple>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
            <small class="text-muted">Hold Ctrl (Windows) or Command (Mac) to select multiple.</small>
            @error('genre_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <!-- Director -->
        <div class="mb-3">
            <label class="form-label">Director</label>
            <select name="director_id" class="form-select @error('director_id') is-invalid @enderror">
                <option value="">Select Director</option>
                @foreach($directors as $director)
                    <option value="{{ $director->id }}" {{ old('director_id') == $director->id ? 'selected' : '' }}>
                        {{ $director->name }}
                    </option>
                @endforeach
            </select>
            @error('director_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <!-- Actor -->
        <div class="mb-3">
            <label class="form-label">Actor</label>
            <select name="actor_id[]" id="actors" class="form-control" multiple>
                @foreach($actors as $actor)
                    <option value="{{ $actor->id }}">{{ $actor->name }}</option>
                @endforeach
            </select>
            <small class="text-muted">Hold Ctrl (Windows) or Command (Mac) to select multiple.</small>
            @error('actor_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <!-- Duration -->
        <div class="mb-3">
            <label class="form-label">Duration</label>
            <input type="text"
                   name="duration"
                   value="{{ old('duration') }}"
                   class="form-control @error('duration') is-invalid @enderror"
                   placeholder="Enter duration (e.g., 2h 30m)">
            @error('duration')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <!-- Language -->
        <div class="mb-3">
            <label class="form-label">Language</label>
            <select name="language_id" class="form-select @error('language_id') is-invalid @enderror">
                <option value="">Select Language</option>
                @foreach($languages as $language)
                    <option value="{{ $language->id }}" {{ old('language_id') == $language->id ? 'selected' : '' }}>
                        {{ $language->name }}
                    </option>
                @endforeach
            </select>
            @error('language_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <!-- Release Year -->
        <div class="mb-3">
            <label class="form-label">Release Year</label>
            <input type="number"
                   name="release_year"
                   value="{{ old('release_year') }}"
                   class="form-control @error('release_year') is-invalid @enderror"
                   placeholder="Enter release year">
            @error('release_year')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Enter description">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <!-- Trailer Link -->
        <div class="mb-3">
            <label class="form-label">Trailer Link</label>
            <input type="url"
                   name="trailer_link"
                   value="{{ old('trailer_link') }}"
                   class="form-control @error('trailer_link') is-invalid @enderror"
                   placeholder="Enter trailer URL">
            @error('trailer_link')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <!-- Image -->
        <div class="mb-3">
            <label class="form-label">Movie Poster</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
            @error('image')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('movies.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
