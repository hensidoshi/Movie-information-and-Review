<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use App\Models\User;
use App\Models\Movie;
use App\Models\Review; 
use Illuminate\Http\Request;

class WatchlistController extends Controller
{
    // Display all watchlist entries
    public function index()
    {
        $watchlists = Watchlist::with(['user', 'movie', 'review'])->get();
        return view('watchlists.index', compact('watchlists'));
    }

    // Show form to create a new watchlist entry
    public function create()
    {
        $users   = User::all();
        $movies  = Movie::all();
        $reviews = Review::all(); 

        return view('watchlists.create', compact('users', 'movies', 'reviews'));
    }

    // Store a new watchlist entry
    public function store(Request $request)
    {
        $request->validate([
            'user_id'   => 'required|exists:users,id',
            'movie_id'  => 'required|exists:movies,id',
            'rating_id' => 'nullable|exists:reviews,id',
            'status'    => 'required|string|in:planned,watching,completed,on-hold,dropped',
            'comment'   => 'nullable|string|max:1000',
        ]);

        Watchlist::create([
            'user_id'   => $request->user_id,
            'movie_id'  => $request->movie_id,
            'rating_id' => $request->rating_id,
            'status'    => $request->status,
            'comment'   => $request->comment,
        ]);


        return redirect()->route('watchlists.index')->with('success', 'Watchlist added successfully.');
    }

    // Show form to edit watchlist entry
    public function edit(Watchlist $watchlist)
    {
        $users   = User::all();
        $movies  = Movie::all();
        $reviews = Review::all();

        return view('watchlists.edit', compact('watchlist', 'users', 'movies', 'reviews'));
    }

    // Update watchlist entry
    public function update(Request $request, Watchlist $watchlist)
    {
        $request->validate([
            'user_id'   => 'required|exists:users,id',
            'movie_id'  => 'required|exists:movies,id',
            'rating_id' => 'nullable|exists:reviews,id',
            'status'    => 'required|string|in:planned,watching,completed,on-hold,dropped',
            'comment'   => 'nullable|string|max:1000',
        ]);

        $watchlist->update([
            'user_id'   => $request->user_id,
            'movie_id'  => $request->movie_id,
            'rating_id' => $request->rating_id,
            'status'    => $request->status,
            'comment'   => $request->comment,
        ]);

        return redirect()->route('watchlists.index')->with('success', 'Watchlist updated successfully.');
    }

    // Delete watchlist entry
    public function destroy(Watchlist $watchlist)
    {
        $watchlist->delete();
        return redirect()->route('watchlists.index')->with('success', 'Watchlist deleted successfully.');
    }

    // Show single watchlist entry
    public function show(Watchlist $watchlist)
    {
        return view('watchlists.view', compact('watchlist'));
    }
}
