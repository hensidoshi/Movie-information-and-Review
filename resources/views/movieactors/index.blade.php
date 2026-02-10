@extends('layouts.app')

@section('title', 'Movie Actors List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-white h3 mb-0">Movie Actors List</h2>
    <a href="{{ route('movieActors.create') }}" class="btn btn-add">
        <i class="bi bi-plus-lg"></i> Add New Movie Actor
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

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
                        <a href="{{ route('movieActors.show', $movieActor->id) }}" class="btn btn-sm btn-outline-info me-1">
                            <i class="bi bi-eye"></i> View
                        </a>
                        <a href="{{ route('movieActors.edit', $movieActor->id) }}" class="btn btn-sm btn-edit me-1">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('movieActors.destroy', $movieActor->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-delete" onclick="return confirm('Are you sure?')">
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
