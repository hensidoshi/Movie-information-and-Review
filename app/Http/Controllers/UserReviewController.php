<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;

class UserReviewController extends Controller
{
    public function myReviews()
    {
        $reviews = Review::with('movie.genres')
                    ->where('user_id', Auth::id())
                    ->latest()
                    ->get();

        return view('UserPanel.my-review', compact('reviews'));
    }

    public function destroy($id)
    {
        Review::where('id',$id)->where('user_id',Auth::id())->delete();
        return back()->with('success','Review deleted successfully');
    }

    public function edit($id)
    {
        $review = Review::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();

        $movies = Movie::all();

        return view('UserPanel.edit-review', compact('review', 'movies'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        $review = Review::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        
        $review->update([
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('UserPanel.myReviews')->with('success', 'Review updated successfully!');
    }
}
