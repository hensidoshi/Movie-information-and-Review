@extends('layouts.admin.index-app')

@section('title', 'Movie Actors List')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-white h3 mb-0">Movie Actors List</h2>
    <a href="{{ route('admin.movieActors.create') }}" class="btn btn-add">
        <i class="bi bi-plus-lg"></i> Add New Movie Actor
    </a>
</div>

<div class="table-card shadow">
    <div class="table-responsive">
        <table id="movieActorsTable" class="table align-middle text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Movie</th>
                    <th>Actor</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($movieActors as $movieActor)
                <tr>
                    <td>{{ $movieActor->id }}</td>
                    <td>{{ $movieActor->movie->name ?? '-' }}</td>
                    <td>{{ $movieActor->actor->name ?? '-' }}</td>
                    <td class="actions-cell">
                        <a href="{{ route('admin.movieActors.show', $movieActor->id) }}" class="btn btn-sm btn-outline-info me-1">
                            <i class="bi bi-eye"></i> View
                        </a>
                        <a href="{{ route('admin.movieActors.edit', $movieActor->id) }}" class="btn btn-sm btn-edit me-1">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('admin.movieActors.destroy', $movieActor->id) }}" 
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
                    <td colspan="4" class="py-5 text-muted">No movie actors found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection