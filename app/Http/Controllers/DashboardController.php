<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\User;
use App\Models\Genre;
use App\Models\Review;
use App\Models\Watchlist;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMovies = Movie::count();
        $totalUsers = User::count();
        $totalReviews = Review::count();
        $totalWatchlist = Watchlist::count(); 

        $moviesByGenre = Genre::withCount('movies')
                        ->get()
                        ->filter(function($genre) {
                            return $genre->movies_count > 0;
                        });

        $reviewsPerMovie = Movie::withCount('reviews')
                        ->has('reviews') 
                        ->get()
                        ->sortByDesc('reviews_count');
        $movieTitles = $reviewsPerMovie->pluck('name')->toArray(); 
        $reviewCounts = $reviewsPerMovie->pluck('reviews_count')->toArray();

        $registrations = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
                        ->groupBy('date')
                        ->orderBy('date')
                        ->get();
        $registrationDates = $registrations->pluck('date')->toArray();
        $registrationCounts = $registrations->pluck('count')->toArray();

        $ratings = Review::selectRaw('rating, COUNT(*) as count')
                        ->groupBy('rating')
                        ->orderBy('rating')
                        ->get();
        $ratingsLabels = $ratings->pluck('rating')->map(fn($r) => $r . "⭐")->toArray();
        $ratingsCounts = $ratings->pluck('count')->toArray();

        $latestMovies = Movie::with(['genres', 'reviews']) 
                            ->withAvg('reviews', 'rating')
                            ->latest()
                            ->take(6)
                            ->get();

        $latestReviews = Review::with(['user', 'movie'])
                            ->latest()
                            ->take(4)
                            ->get();

        $recentUsers = User::latest()
                        ->take(3)
                        ->get(); 

        return view('index', compact(
            'totalMovies',
            'totalUsers',
            'totalReviews',
            'totalWatchlist',
            'moviesByGenre',
            'movieTitles',
            'reviewCounts',
            'registrationDates',
            'registrationCounts',
            'ratingsLabels',
            'ratingsCounts',
            'latestMovies',
            'latestReviews',
            'recentUsers'
        ));
    }
}
