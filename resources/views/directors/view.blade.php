<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Director</title>
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
        img.director-img {
            width: 120px;
            height: 120px;
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
    <h2>View Director</h2>

    <div class="details-card">
        <div class="d-flex flex-column flex-md-row gap-4 align-items-start">
            
            <div class="flex-shrink-0">
                @if($director->image)
                    <img src="{{ asset('storage/' . $director->image) }}" alt="Director Image" class="director-img m-0">
                @else
                    <div class="director-img bg-secondary d-flex align-items-center justify-content-center">
                        <small class="text-white">No Image</small>
                    </div>
                @endif
            </div>

            <div class="flex-grow-1">
                <div class="details-item">
                    <span class="details-label">ID:</span> {{ $director->id }}
                </div>
                <div class="details-item">
                    <span class="details-label">Name:</span> {{ $director->name }}
                </div>
                <div class="details-item">
                    <span class="details-label">Gender:</span> {{ $director->gender }}
                </div>
                <div class="details-item">
                    <span class="details-label">Date of Birth:</span> {{ $director->DOB }}
                </div>
                <div class="details-item">
                    <span class="details-label">Bio:</span> {{ $director->bio }}
                </div>
                <div class="details-item">
                    <span class="details-label">Created At:</span> {{ $director->created_at }}
                </div>
                <div class="details-item">
                    <span class="details-label">Updated At:</span> {{ $director->updated_at }}
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('directors.index') }}" class="btn btn-back mt-4">Back</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
