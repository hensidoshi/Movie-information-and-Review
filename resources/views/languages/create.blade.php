<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Language</title>

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
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>Add New Language</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ route('languages.store') }}" method="POST" novalidate>
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
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('languages.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
