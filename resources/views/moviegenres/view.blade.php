<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Movie Genre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #f8f9fa;
        }
        .btn-back {
            color: #6c757d;
            border: 1px solid #6c757d;
            background-color: transparent;
            border-radius: 6px;
            padding: 8px 20px;
        }
        .btn-back:hover {
            background-color: #6c757d;
            color: #fff;
        }
        .details-card {
            border: 1px solid #2c2c2c;
            border-radius: 8px;
            padding: 20px;
            background-color: #1e1e1e;
        }
        h2 {
            margin-bottom: 20px;
        }
        .details-item {
            margin-bottom: 10px;
        }
        .details-label {
            font-weight: bold;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>View Movie Genre</h2>

    <div class="details-card">
        <div class="details-item">
            <span class="details-label">ID:</span> {{ $movieGenre->id }}
        </div>
        <div class="details-item">
            <span class="details-label">Movie:</span> {{ $movieGenre->movie->name ?? 'N/A' }}
        </div>
        <div class="details-item">
            <span class="details-label">Genre:</span> {{ $movieGenre->genre->name ?? 'N/A' }}
        </div>
        <div class="details-item">
            <span class="details-label">Created At:</span> {{ $movieGenre->created_at }}
        </div>
        <div class="details-item">
            <span class="details-label">Updated At:</span> {{ $movieGenre->updated_at }}
        </div>
    </div>

    <a href="{{ route('movieGenres.index') }}" class="btn btn-back mt-4">Back</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
