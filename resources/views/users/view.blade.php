<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User</title>
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
    <h2>View User</h2>

    <div class="details-card">
        <div class="details-item">
            <span class="details-label">ID:</span> {{ $user->id }}
        </div>
        <div class="details-item">
            <span class="details-label">Name:</span> {{ $user->name }}
        </div>
        <div class="details-item">
            <span class="details-label">Email:</span> {{ $user->email }}
        </div>
        <div class="details-item">
            <span class="details-label">Role:</span> {{ $user->role ? $user->role->name : '-' }}
        </div>
        <div class="details-item">
            <span class="details-label">Email Verified At:</span> {{ $user->email_verified_at ?? 'Not Verified' }}
        </div>
        <div class="details-item">
            <span class="details-label">Created At:</span> {{ $user->created_at }}
        </div>
        <div class="details-item">
            <span class="details-label">Updated At:</span> {{ $user->updated_at }}
        </div>
    </div>

    <a href="{{ route('users.index') }}" class="btn btn-back mt-4">Back</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
