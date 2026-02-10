@extends('layouts.app')

@section('title', 'Actors List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-white h3 mb-0">Actors List</h2>
    <a href="{{ route('actors.create') }}" class="btn btn-add">
        <i class="bi bi-plus-lg"></i> Add Actor
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
        <table id="actorsTable" class="table align-middle text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Bio</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($actors as $actor)
                <tr>
                    <td>{{ $actor->id }}</td>
                    <td>
                        @if($actor->image)
                            <img src="{{ asset('storage/' . $actor->image) }}" class="actor-img">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>{{ $actor->name }}</td>
                    <td>{{ $actor->gender }}</td>
                    <td>{{ $actor->DOB }}</td>
                    <td>{{ $actor->bio }}</td>
                    <td class="actions-cell">
                        <a href="{{ route('actors.show', $actor->id) }}" class="btn btn-sm btn-outline-info me-1">
                            <i class="bi bi-eye"></i> View
                        </a>
                        <a href="{{ route('actors.edit', $actor->id) }}" class="btn btn-sm btn-edit me-1">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('actors.destroy', $actor->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-delete" onclick="return confirm('Are you sure?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection