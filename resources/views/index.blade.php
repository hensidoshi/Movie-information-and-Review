@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="d-flex align-items-center justify-content-between my-4 page-header-breadcrumb flex-wrap gap-2">
        <div>
            <p class="fw-semibold fs-20 mb-0">Welcome Back, {{ Auth::user()->name }}</p>
            <p class="fs-13 text-white-50 mb-0">Let's dive in and get things done.</p>
        </div>
    </div>
    
    <div class="row g-3">
        
        <div class="col-xl-3 col-lg-6">
            <div class="card custom-card main-card-item primary">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-3 flex-wrap">
                        <div>
                            <span class="d-block mb-3 fw-medium">Total Movies</span>
                            <h3 class="fw-semibold lh-1 mb-0">{{ number_format($totalMovies) }}</h3>
                        </div>
                        <div class="text-end">
                            <span class="avatar avatar-md bg-primary svg-white avatar-rounded">
                                <i class="bi bi-film fs-4"></i>
                            </span>
                        </div>
                    </div>
                    <a href="{{ route('movies.index') }}" class="text-white-50 text-decoration-underline fw-medium fs-13">View all movies</a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6">
            <div class="card custom-card main-card-item info">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-3 flex-wrap">
                        <div>
                            <span class="d-block mb-3 fw-medium">Total Users</span>
                            <h3 class="fw-semibold lh-1 mb-0">{{ number_format($totalUsers) }}</h3>
                        </div>
                        <div class="text-end">
                            <span class="avatar avatar-md bg-info svg-white avatar-rounded">
                                <i class="bi bi-people fs-4"></i>
                            </span>
                        </div>
                    </div>
                    <a href="{{ route('users.index') }}" class="text-white-50 text-decoration-underline fw-medium fs-13">View all users</a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6">
            <div class="card custom-card main-card-item success">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-3 flex-wrap">
                        <div>
                            <span class="d-block mb-3 fw-medium">Total Reviews</span>
                            <h3 class="fw-semibold lh-1 mb-0">{{ number_format($totalReviews) }}</h3>
                        </div>
                        <div class="text-end">
                            <span class="avatar avatar-md bg-success svg-white avatar-rounded">
                                <i class="bi bi-star fs-4"></i>
                            </span>
                        </div>
                    </div>
                    <a href="{{ route('reviews.index') }}" class="text-white-50 text-decoration-underline fw-medium fs-13">View all reviews</a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6">
            <div class="card custom-card main-card-item warning">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-3 flex-wrap">
                        <div>
                            <span class="d-block mb-3 fw-medium">Total Watchlist</span>
                            <h3 class="fw-semibold lh-1 mb-0">{{ number_format($totalWatchlist) }}</h3>
                        </div>
                        <div class="text-end">
                            <span class="avatar avatar-md bg-warning svg-white avatar-rounded">
                                <i class="bi bi-bookmark fs-4"></i>
                            </span>
                        </div>
                    </div>
                    <a href="{{ route('watchlists.index') }}" class="text-white-50 text-decoration-underline fw-medium fs-13">View all watchlist</a>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card custom-card mb-3"> 
                <div class="card-header"><div class="card-title">Movies per Genre</div></div>
                <div class="card-body"><div id="movies-genre-chart"></div></div>
            </div>

            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Latest Movies Added</div>
                    <a href="{{ route('movies.index') }}" class="text-white-50 text-decoration-underline fw-medium fs-13">View All</a>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @foreach($latestMovies as $movie)
                        <li class="list-group-item bg-transparent border-white-01 p-3">
                            <div class="d-flex align-items-start">
                                <div class="me-3">
                                    <img src="{{ asset('storage/' . $movie->image) }}" alt="img" class="rounded" style="width: 55px; height: 75px; object-fit: cover;">
                                </div>
                                <div class="flex-fill">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="fw-semibold fs-14 text-white text-truncate" style="max-width: 150px;">{{ $movie->name }}</div>
                                        <div class="text-white-50 fs-11">{{ $movie->created_at->format('M d, Y') }}</div>
                                    </div>
                                    <div class="mt-1">
                                        <span class="badge bg-secondary-transparent fs-10 fw-normal">{{ $movie->genre->name ?? 'Action' }}</span>
                                    </div>
                                    <div class="mt-2 d-flex align-items-center">
                                        <span class="fs-13 fw-bold text-white">{{ number_format($movie->reviews_avg_rating ?? 0, 1) }}</span>
                                        <span class="text-white-50 fs-11 ms-1">/5</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div> 

        <div class="col-xl-4">
            <div class="card custom-card mb-3"> 
                <div class="card-header"><div class="card-title">Reviews per Movie</div></div>
                <div class="card-body"><div id="reviews-per-movie-chart"></div></div>
            </div>

            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Latest Reviews</div>
                    <a href="{{ route('reviews.index') }}" class="text-white-50 text-decoration-underline fw-medium fs-11">View All</a>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @foreach($latestReviews as $review)
                        <li class="list-group-item bg-transparent border-white-01 p-3">
                            <div class="d-flex align-items-start">
                                <div class="me-2">
                                    <span class="avatar avatar-sm avatar-rounded bg-primary-transparent text-primary fw-bold">
                                        {{ substr($review->user->name ?? 'U', 0, 1) }}
                                    </span>
                                </div>
                                <div class="flex-fill">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <span class="fw-semibold fs-13 text-white">{{ $review->user->name ?? 'User' }}</span>
                                        <span class="text-white-50 fs-10">{{ $review->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="text-white-50 fs-11 mt-1">
                                        Reviewed: <span class="text-primary fw-medium">{{ $review->movie->name ?? 'Movie' }}</span>
                                    </div>
                                    <p class="text-white-50 fs-11 mb-0 mt-1 text-truncate" style="max-width: 180px;">"{{ $review->comment }}"</p>
                                </div>
                                <div class="ms-2 text-warning fs-10 fw-bold">
                                    <i class="ri-star-fill me-1"></i>{{ number_format($review->rating, 1) }}
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card custom-card mb-3"> 
                <div class="card-header"><div class="card-title">User Registration Trend</div></div>
                <div class="card-body"><div id="user-registration-trend-chart"></div></div>
            </div>

            <div class="card custom-card mb-3"> 
                <div class="card-header"><div class="card-title">Rating Distribution</div></div>
                <div class="card-body"><div id="rating-distribution-chart"></div></div>
            </div>

            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Recently Registered Users</div>
                    <a href="{{ route('users.index') }}" class="text-white-50 text-decoration-underline fw-medium fs-11">View All</a>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @foreach($recentUsers as $user)
                        <li class="list-group-item bg-transparent border-white-01 p-3">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <span class="avatar avatar-md avatar-rounded bg-primary-transparent">
                                        <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('assets/images/faces/1.jpg') }}" alt="img">
                                    </span>
                                </div>
                                <div class="flex-fill">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="fw-semibold fs-14 text-white">{{ $user->name }}</div>
                                            <div class="text-white-50 fs-11">{{ $user->email }}</div>
                                        </div>
                                        <div class="text-white-50 fs-10">{{ $user->created_at->format('M d, Y') }}</div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div> @endsection

<!-- Movies by genre pie chart -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    var seriesData = @json($moviesByGenre->pluck('movies_count'));
    var labelsData = @json($moviesByGenre->pluck('name'));

    console.log(seriesData); 
    console.log(labelsData);  

    var totalMovies = seriesData.reduce((a, b) => a + b, 0);

    var options = {
        chart: {
            type: 'pie',
            height: 350,
            background: 'transparent',
        },
        series: seriesData,
        labels: labelsData,
        colors: ['#1f77b4','#2ca02c','#ff7f0e','#d62728','#9467bd','#8c564b','#e377c2'],
        legend: {
            position: 'right',
            labels: {
                colors: '#fff',
                useSeriesColors: true
            },
            formatter: function(seriesName, opts) {
                var val = opts.w.globals.series[opts.seriesIndex];
                var percent = ((val / totalMovies) * 100).toFixed(0);
                return seriesName + ' - ' + percent + '%';
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function(val, opts){
                var percent = ((opts.w.globals.series[opts.seriesIndex] / totalMovies) * 100).toFixed(0);
                return percent + '%';
            },
            style: { colors: ['#fff'], fontSize: '12px' }
        },
        tooltip: {
            y: {
                formatter: function(val) { return val + " Movies"; }
            }
        },
        responsive: [{
            breakpoint: 600,
            options: { chart: { width: '100%' }, legend: { position: 'bottom' } }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#movies-genre-chart"), options);
    chart.render();

});
</script>

<!-- Reviews per movie bar chart -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    var movieNames = @json($movieTitles);
    var reviewCounts = @json($reviewCounts);

    var options = {
        series: [{
            name: 'Reviews',
            data: reviewCounts
        }],
        chart: {
            type: 'bar',
            height: 400, 
            fontFamily: 'Inter, sans-serif',
            foreColor: '#8c90a4',
            toolbar: { show: false }
        },
        plotOptions: {
            bar: {
                borderRadius: 3,
                horizontal: true,
                barHeight: '45%', 
                distributed: true,
            }
        },
        colors: ['#5c67f7', '#f34343', '#26bf94', '#ffb61b', '#17adbb', '#a55eea'],
        dataLabels: {
            enabled: true,
            position: 'top', 
            style: {
                fontSize: '12px',
                colors: ['#8c90a4'] 
            },
            offsetX: 30, 
            formatter: function (val) {
                return val; 
            }
        },
        xaxis: {
            categories: movieNames,
            labels: {
                show: true,
                style: { colors: '#8c90a4' }
            }
        },
        yaxis: {
            labels: {
                show: true,
                style: {
                    fontSize: '12px',
                    colors: ['#8c90a4']
                },
                maxWidth: 200, 
            }
        },
        legend: {
            show: false 
        },
        grid: {
            borderColor: 'rgba(255, 255, 255, 0.05)',
            xaxis: { lines: { show: true } }
        },
        tooltip: {
            theme: 'dark'
        }
    };

    var chart = new ApexCharts(document.querySelector("#reviews-per-movie-chart"), options);
    chart.render();
});
</script>

<!-- User registration trend line chart -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    var registrationDates = @json($registrationDates); 
    var registrationCounts = @json($registrationCounts); 

    var options = {
        chart: {
            type: 'line',
            height: 200,
            zoom: { enabled: false },
            toolbar: { show: true },
        },
        series: [{
            name: "Users",
            data: registrationCounts
        }],
        xaxis: {
            categories: registrationDates,
            title: { text: "Date", style: { color: '#888' } },
            labels: { rotate: -45, style: { colors: '#888', fontSize: '12px' } }
        },
        yaxis: {
            title: { text: "New Users", style: { color: '#888' } },
            labels: { style: { colors: '#888', fontSize: '12px' } }
        },
        stroke: { curve: 'smooth', width: 3 },
        markers: { size: 5 },
        tooltip: { 
            y: { formatter: function(val) { return val + " Users"; } }
        },
        colors: ['#5c67f7'],
        grid: { borderColor: '#eee' },
        dataLabels: { enabled: false }
    };

    var chart = new ApexCharts(document.querySelector("#user-registration-trend-chart"), options);
    chart.render();

});
</script>

<!-- Rating distribution bar chart -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    var ratingDistributionChart = new ApexCharts(
        document.querySelector("#rating-distribution-chart"), 
        {
            series: @json($ratingsCounts),
            labels: @json($ratingsLabels),
            chart: { 
                type: 'pie', 
                height: 180,
                fontFamily: 'Inter, sans-serif',
                toolbar: { show: false }
            },
            colors: ['#26bf94', '#5c67f7', '#ffb61b', '#f34343', '#fe7c02'],
            dataLabels: {
                enabled: true,
                style: {
                    fontSize: '10px', 
                },
                dropShadow: { enabled: false }
            },
            stroke: {
                width: 1,
                colors: ['#232323'] 
            },
            legend: { 
                position: 'bottom',
                fontSize: '11px', 
                labels: { colors: '#8c90a4' },
                markers: { width: 8, height: 8 },
                itemMargin: { horizontal: 5, vertical: 0 }
            },
            tooltip: {
                theme: 'dark',
                y: { formatter: function(val) { return val + " Reviews"; } }
            }
        }
    );

    ratingDistributionChart.render();
});
</script>