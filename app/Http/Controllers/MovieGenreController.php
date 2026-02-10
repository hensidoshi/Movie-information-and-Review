<?php

namespace App\Http\Controllers;

use App\Models\MovieGenre;
use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;

class MovieGenreController extends Controller
{
    // Display all movie genres
    public function index()
    {
        $movieGenres = MovieGenre::with(['movie', 'genre'])->get();
        return view('movieGenres.index', compact('movieGenres'));
    }

    // Show form to create a new movie genre
    public function create()
    {
        $movies = Movie::all();
        $genres = Genre::all();

        return view('movieGenres.create', compact('movies', 'genres'));
    }

    // Store a new movie genre
    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'genre_id' => 'required|exists:genres,id',
        ], [
            'movie_id.required' => 'Movie is required.',
            'genre_id.required' => 'Genre is required.',
        ]);

        MovieGenre::create([
            'movie_id' => $request->movie_id,
            'genre_id' => $request->genre_id,
        ]);

        return redirect()->route('movieGenres.index')->with('success', 'Movie genre added successfully.');
    }

    // Show form to edit movie genre
    public function edit(MovieGenre $movieGenre)
    {
        $movies = Movie::all();
        $genres = Genre::all();

        return view('movieGenres.edit', compact('movieGenre', 'movies', 'genres'));
    }

    // Update movie genre
    public function update(Request $request, MovieGenre $movieGenre)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'genre_id' => 'required|exists:genres,id',
        ]);

        $movieGenre->update([
            'movie_id' => $request->movie_id,
            'genre_id' => $request->genre_id,
        ]);

        return redirect()->route('movieGenres.index')->with('success', 'Movie genre updated successfully.');
    }

    // Delete movie genre
    public function destroy(MovieGenre $movieGenre)
    {
        $movieGenre->delete();
        return redirect()->route('movieGenres.index')->with('success', 'Movie genre deleted successfully.');
    }

    // Show single movie genre
    public function show(MovieGenre $movieGenre)
    {
        return view('movieGenres.view', compact('movieGenre'));
    }
}
