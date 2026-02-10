<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movie Actor</title>

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
            max-width: 60%;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>Edit Movie Actor</h2>

    <form action="{{ route('movieActors.update', $movieActor->id) }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        <!-- Movie -->
        <div class="mb-3">
            <label class="form-label">Movie</label>
            <select name="movie_id" class="form-select @error('movie_id') is-invalid @enderror">
                <option value="">Select Movie</option>
                @foreach($movies as $movie)
                    <option value="{{ $movie->id }}" {{ old('movie_id', $movieActor->movie_id) == $movie->id ? 'selected' : '' }}>
                        {{ $movie->name }}
                    </option>
                @endforeach
            </select>
            @error('movie_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <!-- Actor -->
        <div class="mb-3">
            <label class="form-label">Actor</label>
            <select name="actor_id" class="form-select @error('actor_id') is-invalid @enderror">
                <option value="">Select Actor</option>
                @foreach($actors as $actor)
                    <option value="{{ $actor->id }}" {{ old('actor_id', $movieActor->actor_id) == $actor->id ? 'selected' : '' }}>
                        {{ $actor->name }}
                    </option>
                @endforeach
            </select>
            @error('actor_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('movieActors.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
