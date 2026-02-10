@extends('layouts.app')

@section('title', 'Reviews List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-white h3 mb-0">Reviews List</h2>
    <a href="{{ route('reviews.create') }}" class="btn btn-add">
        <i class="bi bi-plus-lg"></i> Add New Review
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
        <table id="reviewsTable" class="table align-middle text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Movie</th>
                    <th>Rating</th>
                    <th>Comment</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reviews as $review)
                <tr>
                    <td>{{ $review->id }}</td>
                    <td>{{ $review->user->name ?? '-' }}</td>
                    <td>{{ $review->movie->name ?? '-' }}</td>
                    <td>
                        @for($i = 1; $i <= $review->rating; $i++)
                            <span style="color: #ffc107;">&#9733;</span>
                        @endfor
                        @for($i = $review->rating + 1; $i <= 5; $i++)
                            <span style="color: #444;">&#9733;</span> 
                        @endfor
                    </td>
                    <td>{{ $review->comment }}</td>
                    <td class="actions-cell">
                        <a href="{{ route('reviews.show', $review->id) }}" class="btn btn-sm btn-outline-info me-1">
                            <i class="bi bi-eye"></i> View
                        </a>
                        <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-sm btn-edit me-1">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="d-inline">
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
                    <td colspan="6" class="py-5 text-muted">No reviews found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection