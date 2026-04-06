<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    // Display all genres
    public function index()
    {
        $genres = Genre::all();
        return view('admin.genres.index', compact('genres'));
    }

    // Show form to create a new genre
    public function create()
    {
        return view('admin.genres.create');
    }

    // Store a new genre
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:genres,name',
        ], [
            'name.required' => 'Genre name is required.',
            'name.unique'   => 'This genre already exists!',
        ]);

        Genre::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.genres.index')
            ->with('success', 'Genre added successfully.');
    }

    // Show form to edit genre
    public function edit(Genre $genre)
    {
        return view('admin.genres.edit', compact('genre'));
    }

    // Update genre
    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:genres,name,' . $genre->id,
        ], [
            'name.required' => 'Genre name is required.',
            'name.unique'   => 'This genre already exists!',
        ]);

        $genre->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.genres.index')
            ->with('success', 'Genre updated successfully.');
    }

    // Delete genre
    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect()->route('admin.genres.index')
            ->with('success', 'Genre deleted successfully.');
    }

    // Show a genre by ID via query param
    public function showById(Request $request)
    {
        $id = $request->query('id');

        if (!$id) {
            return redirect()->route('admin.genres.index')
                ->with('error', 'Please enter a Genre ID.');
        }

        $genre = Genre::find($id);

        if (!$genre) {
            return redirect()->route('admin.genres.index')
                ->with('error', 'Genre not found.');
        }

        return redirect()->route('admin.genres.edit', $genre->id);
    }

    // Show genre details
    public function show(Genre $genre)
    {
        return view('admin.genres.view', compact('genre'));
    }
}
