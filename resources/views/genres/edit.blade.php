<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Genre</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #121212;
            color: #f8f9fa;
        }
        .form-label {
            color: #f8f9fa;
        }
        .form-control {
            background-color: #2c2c2c;
            color: #f8f9fa;
            border: 1px solid #444;
        }
        .form-control:focus {
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
    </style>
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-4">Edit Genre</h2>

    <form action="{{ route('genres.update', $genre->id) }}" method="POST" novalidate>
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
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('genres.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>

</body>
</html>