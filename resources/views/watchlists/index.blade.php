@extends('layouts.app')

@section('title', 'Watchlist')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-white h3 mb-0">Watchlist</h2>
    <a href="{{ route('watchlists.create') }}" class="btn btn-add">
        <i class="bi bi-plus-lg"></i> Add New Watchlist
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
        <table id="watchlistsTable" class="table align-middle text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Movie</th>
                    <th>Rating</th>
                    <th>Status</th>
                    <th>Comment</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($watchlists as $entry)
                <tr>
                    <td>{{ $entry->id }}</td>
                    <td>{{ $entry->user->name ?? '-' }}</td>
                    <td>{{ $entry->movie->name ?? '-' }}</td>
                    <td>
                        @if($entry->review && $entry->review->rating)
                            @for($i = 1; $i <= $entry->review->rating; $i++)
                                <span style="color: #ffc107;">&#9733;</span>
                            @endfor
                            @for($i = $entry->review->rating + 1; $i <= 5; $i++)
                                <span style="color: #444;">&#9733;</span>
                            @endfor
                        @else
                            <span class="text-white-50">Not Rated</span>
                        @endif
                    </td>
                    <td>
                        @php
                            $status = $entry->status;
                            $badgeClass = match($status) {
                                'planned' => 'bg-secondary',
                                'watching' => 'bg-primary',
                                'completed' => 'bg-success',
                                'on-hold' => 'bg-warning text-dark',
                                'dropped' => 'bg-danger',
                                default => 'bg-dark'
                            };
                        @endphp
                        <span class="badge {{ $badgeClass }}">{{ ucfirst($status) }}</span>
                    </td>
                    <td>
                        @if($entry->comment)
                            {{ $entry->comment }}
                        @else
                            <span class="text-white-50">No Comment</span>
                        @endif
                    </td>
                    <td class="actions-cell">
                        <a href="{{ route('watchlists.show', $entry->id) }}" class="btn btn-sm btn-outline-info me-1">
                            <i class="bi bi-eye"></i> View
                        </a>
                        <a href="{{ route('watchlists.edit', $entry->id) }}" class="btn btn-sm btn-edit me-1">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('watchlists.destroy', $entry->id) }}" method="POST" class="d-inline">
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
                    <td colspan="7" class="py-5 text-muted">No watchlist entries found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
