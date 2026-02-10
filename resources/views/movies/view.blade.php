<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Movie</title>
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
        img.movie-img {
            width: 180px;
            height: 250px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>View Movie</h2>

    <div class="details-card">
        <div class="d-flex flex-column flex-md-row gap-4 align-items-start">
            
            <div class="flex-shrink-0">
                @if($movie->image)
                    <img src="{{ asset('storage/' . $movie->image) }}" alt="Movie Poster" class="movie-img m-0">
                @else
                    <div class="movie-img bg-secondary d-flex align-items-center justify-content-center">
                        <small class="text-white">No Image</small>
                    </div>
                @endif
            </div>

            <div class="flex-grow-1">
                <div class="details-item">
                    <span class="details-label">ID:</span> {{ $movie->id }}
                </div>
                <div class="details-item">
                    <span class="details-label">Name:</span> {{ $movie->name }}
                </div>
                <div class="details-item">
                    <span class="details-label">Genre:</span> 
                    @if($movie->genres && $movie->genres->count() > 0)
                        {{ $movie->genres->pluck('name')->implode(', ') }}
                    @else
                        <span>N/A</span>
                    @endif
                </div>
                <div class="details-item">
                    <span class="details-label">Director:</span> {{ $movie->director->name ?? 'N/A' }}
                </div>
                <div class="details-item">
                    <span class="details-label">Actor:</span> 
                    @if($movie->actors && $movie->actors->count() > 0)
                        {{ $movie->actors->pluck('name')->implode(', ') }}
                    @else
                        <span>N/A</span>
                    @endif
                </div>
                <div class="details-item">
                    <span class="details-label">Duration:</span> {{ $movie->duration }}
                </div>
                <div class="details-item">
                    <span class="details-label">Language:</span> {{ $movie->language->name ?? 'N/A' }}
                </div>
                <div class="details-item">
                    <span class="details-label">Release Year:</span> {{ $movie->release_year }}
                </div>
                <div class="details-item">
                    <span class="details-label">Description:</span> {{ $movie->description }}
                </div>
                <div class="details-item">
                    <span class="details-label">Trailer Link:</span>
                    @if($movie->trailer_link)
                        <a href="{{ $movie->trailer_link }}" target="_blank" class="text-info">{{ $movie->trailer_link }}</a>
                    @else
                        N/A
                    @endif
                </div>
                <div class="details-item">
                    <span class="details-label">Created At:</span> {{ $movie->created_at }}
                </div>
                <div class="details-item">
                    <span class="details-label">Updated At:</span> {{ $movie->updated_at }}
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('movies.index') }}" class="btn btn-back mt-4">Back</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
