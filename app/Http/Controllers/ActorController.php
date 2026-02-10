<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ActorController extends Controller
{
    // Display all actors
    public function index()
    {
        $actors = Actor::all();
        return view('actors.index', compact('actors'));
    }

    // Show form to create a new actor
    public function create()
    {
        return view('actors.create');
    }

    // Store a new actor
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255|unique:actors,name',
            'gender' => 'required|string|max:50',
            'DOB'    => 'required|date',
            'bio'    => 'nullable|string',
            'image'  => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ], [
            'name.required'   => 'Actor name is required.',
            'name.unique'     => 'Actor name already exists.',
            'gender.required' => 'Gender is required.',
            'DOB.required'    => 'Date of birth is required.',
            'image.image'     => 'The file must be an image.',
        ]);

        $imagePath = $request->hasFile('image') ? $request->file('image')->store('actors', 'public') : null;

        Actor::create([
            'name'   => $request->name,
            'gender' => $request->gender,
            'DOB'    => $request->DOB,
            'bio'    => $request->bio,
            'image'  => $imagePath,
        ]);

        return redirect()->route('actors.index')
            ->with('success', 'Actor added successfully.');
    }

    // Show form to edit actor
    public function edit(Actor $actor)
    {
        return view('actors.edit', compact('actor'));
    }

    // Update actor
    public function update(Request $request, Actor $actor)
    {
        $request->validate([
            'name'   => [
                'required',
                'string',
                'max:255',
                Rule::unique('actors')->ignore($actor->id),
            ],
            'gender' => 'required|string|max:50',
            'DOB'    => 'required|date',
            'bio'    => 'nullable|string',
            'image'  => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ], [
            'name.required'   => 'Actor name is required.',
            'name.unique'     => 'Actor name already exists.',
            'gender.required' => 'Gender is required.',
            'DOB.required'    => 'Date of birth is required.',
            'image.image'     => 'The file must be an image.',
        ]);

        $imagePath = $actor->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('actors', 'public');
        }

        $actor->update([
            'name'   => $request->name,
            'gender' => $request->gender,
            'DOB'    => $request->DOB,
            'bio'    => $request->bio,
            'image'  => $imagePath,
        ]);

        return redirect()->route('actors.index')
            ->with('success', 'Actor updated successfully.');
    }

    // Delete actor
    public function destroy(Actor $actor)
    {
        $actor->delete();

        return redirect()->route('actors.index')
            ->with('success', 'Actor deleted successfully.');
    }

    // Show an actor by ID via query param
    public function showById(Request $request)
    {
        $id = $request->query('id');

        if (!$id) {
            return redirect()->route('actors.index')
                ->with('error', 'Please enter an Actor ID.');
        }

        $actor = Actor::find($id);

        if (!$actor) {
            return redirect()->route('actors.index')
                ->with('error', 'Actor not found.');
        }

        return redirect()->route('actors.edit', $actor->id);
    }

    // Show actor details
    public function show(Actor $actor)
    {
        return view('actors.view', compact('actor'));
    }
}
