<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReviewController extends Controller
{
    // Display all reviews
    public function index()
    {
        $reviews = Review::with(['user', 'movie'])->get();
        return view('reviews.index', compact('reviews'));
    }

    // Show form to create a new review
    public function create()
    {
        $users  = User::all();
        $movies = Movie::all();

        return view('reviews.create', compact('users', 'movies'));
    }

    // Store a new review
    public function store(Request $request)
    {
        $request->validate([
            'user_id'  => 'required|exists:users,id',
            'movie_id' => 'required|exists:movies,id',
            'rating'   => 'required|integer|min:1|max:5',
            'comment'  => 'nullable|string|max:1000',
        ], [
            'user_id.required'  => 'User is required.',
            'movie_id.required' => 'Movie is required.',
            'rating.required'   => 'Rating is required.',
            'rating.min'        => 'Rating must be at least 1.',
            'rating.max'        => 'Rating must not exceed 5.',
        ]);

        Review::create([
            'user_id'  => $request->user_id,
            'movie_id' => $request->movie_id,
            'rating'   => $request->rating,
            'comment'  => $request->comment,
        ]);

        return redirect()->route('reviews.index')->with('success', 'Review added successfully.');
    }

    // Show form to edit review
    public function edit(Review $review)
    {
        $users  = User::all();
        $movies = Movie::all();

        return view('reviews.edit', compact('review', 'users', 'movies'));
    }

    // Update review
    public function update(Request $request, Review $review)
    {
        $request->validate([
            'user_id'  => 'required|exists:users,id',
            'movie_id' => 'required|exists:movies,id',
            'rating'   => 'required|integer|min:1|max:5',
            'comment'  => 'nullable|string|max:1000',
        ]);

        $review->update([
            'user_id'  => $request->user_id,
            'movie_id' => $request->movie_id,
            'rating'   => $request->rating,
            'comment'  => $request->comment,
        ]);

        return redirect()->route('reviews.index')->with('success', 'Review updated successfully.');
    }

    // Delete review
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully.');
    }

    // Show single review
    public function show(Review $review)
    {
        return view('reviews.view', compact('review'));
    }
}
