<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Watchlist;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function index()
    {
        $watchlistItems = Watchlist::with('movie.reviews')
                                    ->where('user_id', Auth::id())
                                    ->latest()
                                    ->get();

        return view('web.watchlist', compact('watchlistItems'));
    }

    public function move($id)
    {
        // Find the item
    $watchlistItem = Watchlist::where('id', $id)
        ->where('user_id', auth()->id())
        ->firstOrFail();

    // Update status to 'watched'
    $watchlistItem->status = 'watched';
    $watchlistItem->save();

    return redirect()->back()->with('success', 'Movie marked as watched!');
    }

    public function destroy($id)
    {
        Watchlist::where('id', $id)->where('user_id', Auth::id())->delete();
        return redirect()->route('watchlist.index')->with('success', 'Movie removed from watchlist');
    }

    public function store(Movie $movie)
    {
        // Avoid duplicates
        Watchlist::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'movie_id' => $movie->id,
            ],
            [
                'status' => 'pending',
                'rating_id' => null,   
                'comment' => null      
            ]
        );

        return redirect()->back()->with('success', 'Movie added to watchlist!');
    }

    public function remove($slug)
    {
        $movie = Movie::where('slug', $slug)->firstOrFail();
        
        Watchlist::where('user_id', auth()->id())->where('movie_id', $movie->id)->delete();
        return back()->with('success', 'Removed from watchlist!');
    }
}
