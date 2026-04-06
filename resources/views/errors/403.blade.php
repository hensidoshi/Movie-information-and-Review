<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>403 - Access Denied</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #000000, #0f172a);
            color: #ffffff;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .error-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .error-box {
            max-width: 600px;
        }

        .error-code {
            font-size: 100px;
            font-weight: 700;
            color: #ff3c3c;
        }

        .error-title {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .error-text {
            color: #b3b3b3;
            margin-bottom: 25px;
        }

        .btn-home {
            padding: 10px 25px;
            border-radius: 30px;
        }
    </style>
</head>
<body>

<div class="error-container">
    <div class="error-box">
        <div class="error-code">403</div>
        <div class="error-title">Access Denied 🚫</div>
        <div class="error-text">
            Sorry, you don’t have permission to access this page.
        </div>

        <a href="{{ url('/') }}" class="btn btn-danger btn-home">
            Go Back Home
        </a>
    </div>
</div>

</body>
</html>