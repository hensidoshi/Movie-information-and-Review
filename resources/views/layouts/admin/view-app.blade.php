<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.admin.mainhead')
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .app-container { 
            display: flex; 
            min-height: 100vh; 
        }
        .main-content { 
            flex-grow: 1; 
            margin-left: 240px; 
            display: flex; 
            flex-direction: column; 
            min-width: 0; 
        }
        .content-wrapper { 
            padding: 20px; 
            margin-top: 75px; 
        }
        @media (max-width: 991px) { 
            .main-content { margin-left: 0; } 
            .content-wrapper { margin-top: 65px; } 
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
        img.actor-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
            display: block;
            margin-left: auto;
            margin-right: auto;
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
    @include('partials.admin.switcher')

    <div class="loader" id="pageLoader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>

    <div class="app-container">
        @include('partials.admin.sidebar')
        <div class="main-content">
            @include('partials.admin.header')
            <div class="content-wrapper">
                <h2>View @yield('name')</h2>
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @include('partials.admin.commonjs')
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script>
        $(window).on('load', function() {
            $('#pageLoader').fadeOut('slow', function() { $(this).remove(); });
        });
    </script>
    @stack('scripts')
</body>
</html>
