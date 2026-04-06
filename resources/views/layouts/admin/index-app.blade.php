<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.admin.mainhead')
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <title>@yield('title')</title>

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
        .table-card { 
            background-color: #2c2c2c; 
            border-radius: 8px; 
            padding: 5px; 
            overflow: hidden; 
            border: 1px solid #3d3d3d; }
        .table { 
            background-color: #2c2c2c !important; 
            color: #f8f9fa !important; 
            margin-bottom: 0; border-collapse: 
            separate; border-spacing: 0; 
        }
        .table thead th { 
            background-color: #2c2c2c; 
            color: #f8f9fa; 
            border-bottom: 1px solid #3d3d3d; 
            font-weight: 600; 
            padding: 15px; 
        }
        .table tbody td { 
            background-color: #2c2c2c !important; 
            color: #f8f9fa !important; 
            border-bottom: 1px solid #3d3d3d; 
            padding: 12px; 
        }
        .table tbody tr:hover td { 
            background-color: #383838 !important; 
        }
        .table img { 
            width: 50px; 
            height: auto; 
            border-radius: 4px; 
        }
        .btn-add { 
            color: #28a745; 
            border: 1px solid #28a745; 
            background-color: transparent; 
            padding: 8px 16px; 
            border-radius: 6px; 
            font-size: 14px; 
        }
        .btn-add:hover { 
            background-color: #28a745; 
            color: #fff; 
        }
        .btn-outline-info { 
            color: #17a2b8; 
            border: 1px solid #17a2b8; 
        }
        .btn-outline-info:hover { 
            background-color: #17a2b8; 
            color: #fff; 
        }
        .btn-edit { 
            color: #0d6efd; 
            border: 1px solid #0d6efd; 
            background-color: transparent; 
        }
        .btn-edit:hover { 
            background-color: #0d6efd; 
            color: #fff; 
        }
        .btn-delete { 
            color: #dc3545; 
            border: 1px solid #dc3545; 
            background-color: transparent; 
        }
        .btn-delete:hover { 
            background-color: #dc3545; 
            color: #fff; 
        }
        .actions-cell { 
            white-space: nowrap; 
        }
        .btn-trailer { 
            color: #ffc107; 
            border: 1px solid #ffc107; 
            background-color: transparent; 
            padding: 4px 8px; 
            border-radius: 4px; 
            font-size: 12px; 
        }
        .btn-trailer:hover { 
            background-color: #ffc107; 
            color: #000; 
        }
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_paginate { 
            color: #f8f9fa !important; 
            margin-bottom: 10px; 
        }
        .dataTables_wrapper .dataTables_filter input,
        .dataTables_wrapper .dataTables_length select { 
            background-color: #3d3d3d !important; 
            color: #fff !important; 
            border: 1px solid #555 !important; 
        }
        .dataTables_wrapper .dataTables_filter input::placeholder { 
            color: #fff !important; 
        }
        /* =========================
        DataTable Pagination UI
        ========================= */
        .dataTables_wrapper .dataTables_paginate {
            margin-top: 15px;
        }
        .dataTables_wrapper .dataTables_paginate .pagination {
            justify-content: center;
        }
        .dataTables_wrapper .page-item .page-link {
            background-color: #2c2c2c;
            color: #f8f9fa;
            border: 1px solid #3d3d3d;
            margin: 0 4px;
            border-radius: 6px;
            transition: all 0.2s ease-in-out;
        }
        .dataTables_wrapper .page-item .page-link:hover {
            background-color: #0d6efd;
            color: #fff;
            border-color: #0d6efd;
        }
        .dataTables_wrapper .page-item.active .page-link {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: #fff;
            font-weight: 600;
        }
        .dataTables_wrapper .page-item.disabled .page-link {
            background-color: #1a1a1a;
            color: #777;
            border-color: #333;
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
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    @include('partials.admin.commonjs')
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script>
        $(window).on('load', function() {
            $('#pageLoader').fadeOut('slow', function() { $(this).remove(); });
        });

        $(document).ready(function() {
            $('table').each(function() {
                const tableId = '#' + ($(this).attr('id') || 'dataTable');
                if ($.fn.DataTable.isDataTable(tableId)) $(tableId).DataTable().destroy();
                $(tableId).DataTable({
                    paging: true, searching: true, ordering: true, responsive: true, pageLength: 10,
                    language: { 
                        search: "_INPUT_", 
                        searchPlaceholder: "Search..." ,
                        paginate: {
                                previous: "<i class='bi bi-chevron-left'></i>",
                                next: "<i class='bi bi-chevron-right'></i>"
                        }
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

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
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#6c757d",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });

                });
            });

        });
    </script>
</body>
</html>
