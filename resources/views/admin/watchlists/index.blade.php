@extends('layouts.admin.index-app')

@section('title', 'Watchlist')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-white h3 mb-0">Watchlists List</h2>
    <a href="{{ route('admin.watchlists.create') }}" class="btn btn-add">
        <i class="bi bi-plus-lg"></i> Add New Watchlist
    </a>
</div>

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
                @forelse($watchlists as $watchlist)
                <tr>
                    <td>{{ $watchlist->id }}</td>
                    <td>{{ $watchlist->user->name ?? '-' }}</td>
                    <td>{{ $watchlist->movie->name ?? '-' }}</td>
                    <td>
                        @if($watchlist->rating_id)
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $watchlist->rating_id)
                                    <i class="bi bi-star-fill text-warning"></i>
                                @else
                                    <i class="bi bi-star text-warning"></i>
                                @endif
                            @endfor
                        @else
                            <span class="text-white-50">Not Rated</span>
                        @endif
                    </td>
                    <td>
                        @php
                            $status = $watchlist->status;
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
                        @if($watchlist->comment)
                            {{ $watchlist->comment }}
                        @else
                            <span class="text-white-50">No Comment</span>
                        @endif
                    </td>
                    <td class="actions-cell">
                        <a href="{{ route('admin.watchlists.show', $watchlist->id) }}" class="btn btn-sm btn-outline-info me-1">
                            <i class="bi bi-eye"></i> View
                        </a>
                        <a href="{{ route('admin.watchlists.edit', $watchlist->id) }}" class="btn btn-sm btn-edit me-1">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('admin.watchlists.destroy', $watchlist->id) }}" 
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
                    <td colspan="7" class="py-5 text-muted">No watchlist entries found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection