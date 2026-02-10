<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Watchlist Entry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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
        .status-badge {
            text-transform: capitalize;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 0.9rem;
        }
        .status-planned { background-color: #6c757d; color: #fff; }
        .status-watching { background-color: #0d6efd; color: #fff; }
        .status-completed { background-color: #28a745; color: #fff; }
        .status-on-hold { background-color: #ffc107; color: #000; }
        .status-dropped { background-color: #dc3545; color: #fff; }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>View Watchlist Entry</h2>

    <div class="details-card">
        <div class="details-item">
            <span class="details-label">ID:</span> {{ $watchlist->id }}
        </div>
        <div class="details-item">
            <span class="details-label">Movie:</span> {{ $watchlist->movie->name ?? 'N/A' }}
        </div>
        <div class="details-item">
            <span class="details-label">User:</span> {{ $watchlist->user->name ?? 'N/A' }}
        </div>
        <div class="details-item">
            <span class="details-label">Rating:</span> 
            @if($watchlist->rating)
                {{ $watchlist->rating->name }}
            @else
                N/A
            @endif
        </div>
        <div class="details-item">
            <span class="details-label">Status:</span>
            <span class="status-badge status-{{ $watchlist->status }}">{{ ucfirst($watchlist->status) }}</span>
        </div>
        <div class="details-item">
            <span class="details-label">Comment:</span> {{ $watchlist->comment ?? '-' }}
        </div>
        <div class="details-item">
            <span class="details-label">Created At:</span> {{ $watchlist->created_at }}
        </div>
        <div class="details-item">
            <span class="details-label">Updated At:</span> {{ $watchlist->updated_at }}
        </div>
    </div>

    <a href="{{ route('watchlists.index') }}" class="btn btn-back mt-4">Back</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
