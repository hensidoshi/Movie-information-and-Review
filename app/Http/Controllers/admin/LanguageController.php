<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    // Display all languages
    public function index()
    {
        $languages = Language::all();
        return view('admin.languages.index', compact('languages'));
    }

    // Show form to create a new language
    public function create()
    {
        return view('admin.languages.create');
    }

    // Store a new language
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:languages,name',
        ], [
            'name.required' => 'Language name is required.',
            'name.unique'   => 'This language already exists!',
        ]);

        Language::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.languages.index')
            ->with('success', 'Language added successfully.');
    }

    // Show form to edit language
    public function edit(Language $language)
    {
        return view('admin.languages.edit', compact('language'));
    }

    // Update language
    public function update(Request $request, Language $language)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:languages,name,' . $language->id,
        ], [
            'name.required' => 'Language name is required.',
            'name.unique'   => 'This language already exists!',
        ]);

        $language->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.languages.index')
            ->with('success', 'Language updated successfully.');
    }

    // Delete language
    public function destroy(Language $language)
    {
        $language->delete();

        return redirect()->route('admin.languages.index')
            ->with('success', 'Language deleted successfully.');
    }

    // Show a language by ID via query param
    public function showById(Request $request)
    {
        $id = $request->query('id');

        if (!$id) {
            return redirect()->route('admin.languages.index')
                ->with('error', 'Please enter a Language ID.');
        }

        $language = Language::find($id);

        if (!$language) {
            return redirect()->route('admin.languages.index')
                ->with('error', 'Language not found.');
        }

        return redirect()->route('admin.languages.edit', $language->id);
    }

    // Show a language
    public function show(Language $language)
    {
        return view('admin.languages.view', compact('language'));
    }
}