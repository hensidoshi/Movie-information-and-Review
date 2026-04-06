<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/brand-logos/favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/brand-logos/favicon.png') }}" type="image/png">
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ReelBuzz')</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/user-style.css') }}">

</head>
<body>

    @include('partials.web.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.web.footer')

    <!-- JS -->
    <script src="{{ asset('assets/js/user-script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 for modern toast notifications -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .modern-toast {
            background: #1e1e2d !important;
            color: #ffffff !important;
            border-radius: 10px !important;
            padding: 15px 20px !important;
            box-shadow: 0 4px 15px rgba(0,0,0,0.5) !important;
        }
        .swal2-icon {
            display: none !important;
        }
        .modern-toast-title {
            font-size: 15px !important;
            font-weight: 500 !important;
            display: flex !important;
            align-items: center !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        .modern-toast-title::before {
            content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='22' height='22' viewBox='0 0 24 24' fill='none' stroke='%232ecc71' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='20 6 9 17 4 12'%3E%3C/polyline%3E%3C/svg%3E");
            display: inline-block;
            margin-right: 15px; 
            vertical-align: middle;
        }
    </style>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            customClass: {
                popup: 'modern-toast',
                title: 'modern-toast-title'
            },
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

    {{-- Success --}}
    @if(session('success'))
        Toast.fire({
            icon: 'success',
            title: "{{ session('success') }}"
        });
    @endif

    {{-- Error --}}
    @if(session('error'))
        Toast.fire({
            icon: 'error',
            title: "{{ session('error') }}"
        });
    @endif
</script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            document.querySelectorAll(".delete-btn").forEach(button => {
                button.addEventListener("click", function () {

                    let form = this.closest(".delete-form");

                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        background: "#1c1f26",
                        confirmButtonColor: "#7367f0",
                        cancelButtonColor: "#4b4b4b",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });

                });
            });
            function confirmCancel() {
                Swal.fire({
                    title: "Discard changes?",
                    text: "All unsaved changes will be lost.",
                    icon: "warning",
                    showCancelButton: true,
                    background: "#1c1f26",
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#6c757d",
                    confirmButtonText: "Yes, discard"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.history.back();
                    }
                });
            }
        });
    </script>
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
