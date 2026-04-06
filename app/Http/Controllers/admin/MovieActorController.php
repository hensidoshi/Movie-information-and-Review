<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MovieActor;
use App\Models\Movie;
use App\Models\Actor;
use Illuminate\Http\Request;

class MovieActorController extends Controller
{
    // Display all movie actors
    public function index()
    {
        $movieActors = MovieActor::with(['movie', 'actor'])->get();
        return view('admin.movieActors.index', compact('movieActors'));
    }

    // Show form to create a new movie actor
    public function create()
    {
        $movies = Movie::all();
        $actors = Actor::all();

        return view('admin.movieActors.create', compact('movies', 'actors'));
    }

    // Store a new movie actor
    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'actor_id' => 'required|exists:actors,id',
        ], [
            'movie_id.required' => 'Movie is required.',
            'actor_id.required' => 'Actor is required.',
        ]);

        MovieActor::create([
            'movie_id' => $request->movie_id,
            'actor_id' => $request->actor_id,
        ]);

        return redirect()->route('admin.movieActors.index')
            ->with('success', 'Movie actor added successfully.');
    }

    // Show form to edit movie actor
    public function edit(MovieActor $movieActor)
    {
        $movies = Movie::all();
        $actors = Actor::all();

        return view('admin.movieActors.edit', compact('movieActor', 'movies', 'actors'));
    }

    // Update movie actor
    public function update(Request $request, MovieActor $movieActor)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'actor_id' => 'required|exists:actors,id',
        ]);

        $movieActor->update([
            'movie_id' => $request->movie_id,
            'actor_id' => $request->actor_id,
        ]);

        return redirect()->route('admin.movieActors.index')
            ->with('success', 'Movie actor updated successfully.');
    }

    // Delete movie actor
    public function destroy(MovieActor $movieActor)
    {
        $movieActor->delete();

        return redirect()->route('admin.movieActors.index')
            ->with('success', 'Movie actor deleted successfully.');
    }

    // Show single movie actor
    public function show(MovieActor $movieActor)
    {
        return view('admin.movieActors.view', compact('movieActor'));
    }
}
