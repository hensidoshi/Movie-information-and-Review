<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Watchlist</title>

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
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>Add New Watchlist</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ route('watchlists.store') }}" method="POST" novalidate>
        @csrf

        <!-- User -->
        <div class="mb-3">
            <label class="form-label">User</label>
            <select name="user_id" class="form-select @error('user_id') is-invalid @enderror">
                <option value="">Select User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('user_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <!-- Movie -->
        <div class="mb-3">
            <label class="form-label">Movie</label>
            <select name="movie_id" class="form-select @error('movie_id') is-invalid @enderror">
                <option value="">Select Movie</option>
                @foreach($movies as $movie)
                    <option value="{{ $movie->id }}" {{ old('movie_id') == $movie->id ? 'selected' : '' }}>
                        {{ $movie->name }}
                    </option>
                @endforeach
            </select>
            @error('movie_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <!-- Rating -->
        <div class="mb-3">
            <label class="form-label">Rating</label>
            <select name="rating_id" class="form-select rating-select @error('rating_id') is-invalid @enderror">
                <option value="">Select Rating</option>
                @foreach($reviews->pluck('rating')->unique() as $rating)
                    <option value="{{ $rating }}" {{ old('rating_id', $watchlist->rating_id ?? '') == $rating ? 'selected' : '' }}>
                        {{ $rating }} Star{{ $rating > 1 ? 's' : '' }}
                    </option>
                @endforeach
            </select>
            @error('rating_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select @error('status') is-invalid @enderror">
                <option value="">Select Status</option>
                @php
                    $statuses = ['planned', 'watching', 'completed', 'on-hold', 'dropped'];
                @endphp
                @foreach($statuses as $status)
                    <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
            @error('status')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <!-- Comment -->
        <div class="mb-3">
            <label class="form-label">Comment</label>
            <textarea name="comment"
                      rows="4"
                      class="form-control @error('comment') is-invalid @enderror"
                      placeholder="Add your notes or comments...">{{ old('comment') }}</textarea>
            @error('comment')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('watchlists.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
