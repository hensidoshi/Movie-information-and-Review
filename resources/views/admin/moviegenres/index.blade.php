@extends('layouts.admin.index-app')

@section('title', 'Movie Genres List')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-white h3 mb-0">Movie Genres List</h2>
    <a href="{{ route('admin.movieGenres.create') }}" class="btn btn-add">
        <i class="bi bi-plus-lg"></i> Add New Movie Genre
    </a>
</div>

<div class="table-card shadow">
    <div class="table-responsive">
        <table id="movieGenresTable" class="table align-middle text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Movie</th>
                    <th>Genre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($movieGenres as $movieGenre)
                <tr>
                    <td>{{ $movieGenre->id }}</td>
                    <td>{{ $movieGenre->movie->name ?? '-' }}</td>
                    <td>{{ $movieGenre->genre->name ?? '-' }}</td>
                    <td class="actions-cell">
                        <a href="{{ route('admin.movieGenres.show', $movieGenre->id) }}" class="btn btn-sm btn-outline-info me-1">
                            <i class="bi bi-eye"></i> View
                        </a>
                        <a href="{{ route('admin.movieGenres.edit', $movieGenre->id) }}" class="btn btn-sm btn-edit me-1">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('admin.movieGenres.destroy', $movieGenre->id) }}" 
                            method="POST" 
                            class="d-inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-delete delete-btn">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-5 text-muted">No movie genres found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection