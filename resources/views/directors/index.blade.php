@extends('layouts.app')

@section('title', 'Directors List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-white h3 mb-0">Directors List</h2>
    <a href="{{ route('directors.create') }}" class="btn btn-add">
        <i class="bi bi-plus-lg"></i> Add director
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
        <table id="directorsTable" class="table align-middle text-center">
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
                @foreach($directors as $director)
                <tr>
                    <td>{{ $director->id }}</td>
                    <td>
                        @if($director->image)
                            <img src="{{ asset('storage/' . $director->image) }}" class="director-img">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>{{ $director->name }}</td>
                    <td>{{ $director->gender }}</td>
                    <td>{{ $director->DOB }}</td>
                    <td>{{ $director->bio }}</td>
                    <td class="actions-cell">
                        <a href="{{ route('directors.show', $director->id) }}" class="btn btn-sm btn-outline-info me-1">
                            <i class="bi bi-eye"></i> View
                        </a>
                        <a href="{{ route('directors.edit', $director->id) }}" class="btn btn-sm btn-edit me-1">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('directors.destroy', $director->id) }}" method="POST" class="d-inline">
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
