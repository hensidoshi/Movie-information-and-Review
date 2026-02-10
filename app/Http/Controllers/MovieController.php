<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use App\Models\Director;
use App\Models\Actor;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MovieController extends Controller
{
    // Display all movies
    public function index()
    {
        $movies = Movie::with(['genres', 'director', 'actors', 'language'])->get();
        return view('movies.index', compact('movies'));
    }

    // Show form to create a new movie
    public function create()
    {
        $genres = Genre::all();
        $directors = Director::all();
        $actors = Actor::all();
        $languages = Language::all();

        return view('movies.create', compact('genres', 'directors', 'actors', 'languages'));
    }

    // Store a new movie
    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255|unique:movies,name',
            'genre_id'     => 'required|exists:genres,id',
            'director_id'  => 'required|exists:directors,id',
            'actor_id'     => 'required|exists:actors,id',
            'duration'     => 'required|string|max:50',
            'language_id'  => 'required|exists:languages,id',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
            'description'  => 'nullable|string',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'trailer_link' => 'nullable|url',
        ], [
            'name.required'        => 'Movie name is required.',
            'name.unique'          => 'Movie name already exists.',
            'genre_id.required'    => 'Genre is required.',
            'director_id.required' => 'Director is required.',
            'actor_id.required'    => 'Actor is required.',
            'duration.required'    => 'Duration is required.',
            'language_id.required' => 'Language is required.',
            'release_year.required'=> 'Release year is required.',
            'image.image'          => 'The file must be an image.',
            'trailer_link.url'     => 'Trailer link must be a valid URL.',
        ]);

        $imagePath = $request->hasFile('image') ? $request->file('image')->store('movies', 'public') : null;

        $movie = Movie::create([
            'name'         => $request->name,
            // 'genre_id'     => $request->genre_id,
            'director_id'  => $request->director_id,
            // 'actor_id'     => $request->actor_id,
            'duration'     => $request->duration,
            'language_id'  => $request->language_id,
            'release_year' => $request->release_year,
            'description'  => $request->description,
            'image'        => $imagePath,
            'trailer_link' => $request->trailer_link,
        ]);
        $movie->genres()->attach($request->genre_id);
        $movie->actors()->attach($request->actor_id);

        return redirect()->route('movies.index')->with('success', 'Movie added successfully.');
    }

    // Show form to edit movie
    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        $directors = Director::all();
        $actors = Actor::all();
        $languages = Language::all();

        return view('movies.edit', compact('movie', 'genres', 'directors', 'actors', 'languages'));
    }

    // Update movie
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('movies')->ignore($movie->id),
            ],
            'genre_id'     => 'required|exists:genres,id',
            'director_id'  => 'required|exists:directors,id',
            'actor_id'     => 'required|exists:actors,id',
            'duration'     => 'required|string|max:50',
            'language_id'  => 'required|exists:languages,id',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
            'description'  => 'nullable|string',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'trailer_link' => 'nullable|url',
        ], [
            'name.required'        => 'Movie name is required.',
            'name.unique'          => 'Movie name already exists.',
            'genre_id.required'    => 'Genre is required.',
            'director_id.required' => 'Director is required.',
            'actor_id.required'    => 'Actor is required.',
            'duration.required'    => 'Duration is required.',
            'language_id.required' => 'Language is required.',
            'release_year.required'=> 'Release year is required.',
            'image.image'          => 'The file must be an image.',
            'trailer_link.url'     => 'Trailer link must be a valid URL.',
        ]);

        $imagePath = $movie->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('movies', 'public');
        }

        $movie->update([
            'name'         => $request->name,
            // 'genre_id'     => $request->genre_id,
            'director_id'  => $request->director_id,
            // 'actor_id'     => $request->actor_id,
            'duration'     => $request->duration,
            'language_id'  => $request->language_id,
            'release_year' => $request->release_year,
            'description'  => $request->description,
            'image'        => $imagePath,
            'trailer_link' => $request->trailer_link,
        ]);
        $movie->genres()->sync($request->genre_id);
        $movie->actors()->sync($request->actor_id);

        return redirect()->route('movies.index')->with('success', 'Movie updated successfully.');
    }

    // Delete movie
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully.');
    }

    // Show movie details
    public function show(Movie $movie)
    {
        return view('movies.view', compact('movie'));
    }

    // Optional: Show movie by query param id
    public function showById(Request $request)
    {
        $id = $request->query('id');

        if (!$id) {
            return redirect()->route('movies.index')->with('error', 'Please enter a Movie ID.');
        }

        $movie = Movie::find($id);

        if (!$movie) {
            return redirect()->route('movies.index')->with('error', 'Movie not found.');
        }

        return redirect()->route('movies.edit', $movie->id);
    }
}
