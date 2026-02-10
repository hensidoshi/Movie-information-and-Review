<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        // For carousel: all movies
        $allMovies = Movie::with('genres', 'reviews')->get();

        // For Latest Movies section: only 6 latest movies
        $latestMovies = Movie::with('genres', 'reviews')
                            ->latest() 
                            ->take(6)
                            ->get();

        return view('UserPanel.index', compact('allMovies', 'latestMovies'));
    }

    public function movies()
    {
        $movies = Movie::with('genres', 'reviews')->paginate(6);
        return view('UserPanel.movies', compact('movies'));
    }

    public function movieDetails($id)
    {
        $movie = Movie::with('genres','reviews', 'actors', 'director')->findOrFail($id);
        $reviews = Review::with('user')->where('movie_id', $id)->latest()->paginate(3);
        return view('UserPanel.movie-details', compact('movie','reviews'));
    }

    public function reviews()
    {
        $movies = Movie::with(['genres', 'reviews'])->paginate(6);
        return view('UserPanel.reviews', compact('movies'));
    }
    
    public function storeReview(Request $request, $movie)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'movie_id' => $movie,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $movies = Movie::where('name', 'LIKE', "%{$query}%")
                        ->orWhere('description', 'LIKE', "%{$query}%")
                        ->paginate(1);

        return view('UserPanel.search-results', compact('movies', 'query'));
    }
}