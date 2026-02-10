<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.mainhead')
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
    </style>
</head>
<body>
    @include('partials.switcher')

    <div class="loader" id="pageLoader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>

    <div class="app-container">
        @include('partials.sidebar')
        <div class="main-content">
            @include('partials.header')

            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    @include('partials.commonjs')
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
                    language: { search: "_INPUT_", searchPlaceholder: "Search..." }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        setTimeout(function () {
            let alert = document.querySelector('.alert-success');
            if (alert) {
                let bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 3000);
    </script>
</body>
</html>
