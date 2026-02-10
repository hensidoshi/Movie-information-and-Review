@extends('layouts.app')

@section('title', 'Movies List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-white h3 mb-0">Movies List</h2>
    <a href="{{ route('movies.create') }}" class="btn btn-add">
        <i class="bi bi-plus-lg"></i> Add New Movie
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="table-card shadow">
    <div class="table-responsive">
        <table id="moviesTable" class="table align-middle text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Genre</th>
                    <th>Director</th>
                    <th>Actor</th>
                    <th>Duration</th>
                    <th>Language</th>
                    <th>Release Year</th>
                    <th>Description</th>
                    <th>Trailer</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($movies as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>
                    <td>
                        @if($movie->image)
                            <img src="{{ asset('storage/' . $movie->image) }}" alt="{{ $movie->name }}">
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $movie->name }}</td>
                    <td>
                        @forelse($movie->genres as $genre)
                            {{ $genre->name }}@if(!$loop->last), @endif
                        @empty
                            -
                        @endforelse
                    </td>
                    <td>{{ $movie->director->name ?? '-' }}</td>
                    <td>
                        @forelse($movie->actors->unique('id') as $actor)
                            {{ $actor->name }}@if(!$loop->last), @endif
                        @empty
                            -
                        @endforelse
                    </td>
                    <td>{{ $movie->duration }}</td>
                    <td>{{ $movie->language->name ?? '-' }}</td>
                    <td>{{ $movie->release_year }}</td>
                    <td>{{ Str::limit($movie->description, 50) }}</td>
                    <td>
                        @if($movie->trailer_link)
                            <a href="{{ $movie->trailer_link }}" target="_blank" class="text-info">
                                <i class="bi bi-play-circle"></i>
                            </a>
                        @else
                            <span class="text-muted">N/A</span>
                        @endif
                    </td>
                    <td class="actions-cell">
                        <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-sm btn-outline-info me-1">
                            <i class="bi bi-eye"></i> View
                        </a>
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-sm btn-edit me-1">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="d-inline">
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
                    <td colspan="12" class="py-5 text-muted">No movies found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection