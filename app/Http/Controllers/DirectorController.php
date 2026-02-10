<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DirectorController extends Controller
{
    // Display all directors
    public function index()
    {
        $directors = Director::all();
        return view('directors.index', compact('directors'));
    }

    // Show form to create a new director
    public function create()
    {
        return view('directors.create');
    }

    // Store a new director
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255|unique:directors,name',
            'gender' => 'required|string|max:50',
            'DOB'    => 'required|date',
            'bio'    => 'nullable|string',
            'image'  => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ], [
            'name.required'   => 'Director name is required.',
            'name.unique'     => 'Director name already exists.',
            'gender.required' => 'Gender is required.',
            'DOB.required'    => 'Date of birth is required.',
            'image.image'     => 'The file must be an image.',
        ]);

        $imagePath = $request->hasFile('image') ? $request->file('image')->store('directors', 'public') : null;

        Director::create([
            'name'   => $request->name,
            'gender' => $request->gender,
            'DOB'    => $request->DOB,
            'bio'    => $request->bio,
            'image'  => $imagePath,
        ]);

        return redirect()->route('directors.index')
            ->with('success', 'Director added successfully.');
    }

    // Show form to edit director
    public function edit(Director $director)
    {
        return view('directors.edit', compact('director'));
    }

    // Update director
    public function update(Request $request, Director $director)
    {
        $request->validate([
            'name'   => [
                'required',
                'string',
                'max:255',
                Rule::unique('directors')->ignore($director->id),
            ],
            'gender' => 'required|string|max:50',
            'DOB'    => 'required|date',
            'bio'    => 'nullable|string',
            'image'  => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ], [
            'name.required'   => 'Director name is required.',
            'name.unique'     => 'Director name already exists.',
            'gender.required' => 'Gender is required.',
            'DOB.required'    => 'Date of birth is required.',
            'image.image'     => 'The file must be an image.',
        ]);

        $imagePath = $director->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('directors', 'public');
        }

        $director->update([
            'name'   => $request->name,
            'gender' => $request->gender,
            'DOB'    => $request->DOB,
            'bio'    => $request->bio,
            'image'  => $imagePath,
        ]);

        return redirect()->route('directors.index')
            ->with('success', 'Director updated successfully.');
    }

    // Delete director
    public function destroy(Director $director)
    {
        $director->delete();

        return redirect()->route('directors.index')
            ->with('success', 'Director deleted successfully.');
    }

    // Show a director by ID via query param
    public function showById(Request $request)
    {
        $id = $request->query('id');

        if (!$id) {
            return redirect()->route('directors.index')
                ->with('error', 'Please enter a Director ID.');
        }

        $director = Director::find($id);

        if (!$director) {
            return redirect()->route('directors.index')
                ->with('error', 'Director not found.');
        }

        return redirect()->route('directors.edit', $director->id);
    }

    // Show director details
    public function show(Director $director)
    {
        return view('directors.view', compact('director'));
    }
}
