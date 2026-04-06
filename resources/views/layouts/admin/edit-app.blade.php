<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.admin.mainhead')
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
        .form-label {
            color: #f8f9fa;
        }
        .form-control {
            background-color: #2c2c2c;
            color: #f8f9fa;
            border: 1px solid #444;
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
        .btn-outline-secondary,
        .btn-outline-secondary:focus,
        .btn-outline-secondary:active {
            background-color: transparent !important;
            color: #6c757d !important;
            border-color: #6c757d !important;
            box-shadow: none !important;
        }
        .btn-outline-secondary:hover {
            background-color: #6c757d !important;
            color: #fff !important;
        }
        h2 {
            margin-bottom: 30px;
        }
        .container {
            max-width: 100%;
            padding-left: 10%;
            padding-right: 10%;
        }
        img.preview-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 6px;
            margin-top: 10px;
        }
        .rating i {
            font-size: 1.5rem;
            color: #ffc107;
        }
        .star-rating {
            display: flex;
            flex-direction: row-reverse; 
            justify-content: flex-end;
        }
        .star-rating input {
            display: none; 
        }
        .star-rating label {
            font-size: 1.8rem;
            color: #444; 
            cursor: pointer;
            padding: 0 2px;
        }
        .star-rating input:checked ~ label,
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #ffc107; 
        }
        .password-container {
            position: relative; 
            display: flex;
            align-items: center;
        }
        .password-container .form-control {
            padding-right: 40px; 
        }
        .password-container .toggle-password {
            position: absolute;
            right: 12px; 
            cursor: pointer;
            color: #6c757d; 
            z-index: 10; 
        }
        .password-container .toggle-password:hover {
            color: #f8f9fa; 
        }
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
                    <h2 class="mb-4">Edit @yield('name')</h2>
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
