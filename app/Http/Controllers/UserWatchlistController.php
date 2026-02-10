<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Watchlist;
use Illuminate\Support\Facades\Auth;

class UserWatchlistController extends Controller
{
    public function index()
    {
        $watchlistItems = Watchlist::with('movie.reviews')
                                    ->where('user_id', Auth::id())
                                    ->latest()
                                    ->get();

        return view('UserPanel.watchlist', compact('watchlistItems'));
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

    public function store($movieId)
    {
        // Avoid duplicates
        Watchlist::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'movie_id' => $movieId,
            ],
            [
                'status' => 'pending',
                'rating_id' => null,   // nullable safe
                'comment' => null      // nullable safe
            ]
        );

        return redirect()->back()->with('success', 'Movie added to watchlist!');
    }

}
