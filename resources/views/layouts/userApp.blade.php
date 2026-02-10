<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ReelBuzz')</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/user-style.css') }}">
</head>
<body>

    @include('partials.userNavbar')

    <main>
        @yield('content')
    </main>

    @include('partials.userFooter')

    <!-- JS -->
    <script src="{{ asset('assets/js/user-script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
     <script>
        setTimeout(function () {
            const msg = document.getElementById('successMessage');
            if (msg) {
                msg.style.transition = "opacity 0.6s ease";
                msg.style.opacity = "0";
                setTimeout(() => msg.remove(), 600); 
            }
        }, 3000);
    </script>
</body>
</html>
